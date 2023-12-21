<?php

namespace App\Commerce\Gateways;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use YiddisheKop\LaravelCommerce\Contracts\Gateway;
use YiddisheKop\LaravelCommerce\Contracts\Order;

class YookassaGateway implements Gateway
{
    public static function name(): string
    {
        return 'Yookassa';
    }

    public function purchase(Order $order, Request $request)
    {
        try {
            $idempotenceKey = uniqid('', true);
            $response       = app('yookassa')->createPayment(
                [
                    'amount'       => [
                        'value'    => $order->grand_total,
                        'currency' => 'RUB',
                    ],
                    'metadata'     => [
                        'orderId' => $order->id
                    ],
                    'confirmation' => [
                        'type'       => 'redirect',
                        'return_url' => route('orders').'?completed-order='.$order->id.'#order-'.$order->id,
                    ],
                    'capture'      => true,
                    'description'  => 'Заказ №'.$order->id,
                ],
                $idempotenceKey
            );

            $payment        = new Payment();
            $payment->token = $response['_id'];
            $payment->save();
            return redirect()->to($response['confirmation']['confirmation_url']);
        } catch (\Exception $e) {
            $response = $e;
            session()->flash('alert', $e->getMessage());
            return redirect()->back();
        }
    }

    public function webhook(Request $request)
    {
        // Log::info($request);
        switch ($request->input('event')) {
            case 'payment.succeeded':
                $payment         = Payment::where('token', '=', $request['object']['id'])->first();
                $payment->status = Payment::STATUS_ACTIVE;
                $payment->save();

                $orderId = $request->input('object')['metadata']['orderId'];
                $order   = \YiddisheKop\LaravelCommerce\Models\Order::find($orderId);
                if (!is_null($order)) {
                    $this->complete($order, $request);
                }
                break;
            case 'payment.canceled':
                $payment         = Payment::where('token', '=', $request['object']['id'])->first();
                $payment->status = Payment::STATUS_INACTIVE;
                $payment->save();
                break;
            default:
                throw new \Exception('Unexpected value');
        }
    }

    public function complete(Order $order, Request $request)
    {
        $order->status  = \YiddisheKop\LaravelCommerce\Models\Order::STATUS_COMPLETED;
        $order->paid_at = now();
        $order->save();
    }
}
