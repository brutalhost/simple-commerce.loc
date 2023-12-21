<?php

namespace App\Http\Controllers\Commerce;

use App\Commerce\Gateways\YookassaGateway;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use YiddisheKop\LaravelCommerce\Facades\Cart;
use YiddisheKop\LaravelCommerce\Models\Order;

class WebhookController extends Controller
{
    public function __invoke(Request $request)
    {
        $ip = $request->header('X-Forwarded-For') ?: $request->ip();

        $validated = Validator::make(['ip' => $ip], [
            'ip' => 'in_network:'.implode(',', config('commerce.yookassaIps'))
        ])->validate();

        $gateway = new YookassaGateway();
        $gateway->webhook($request);
    }
}
