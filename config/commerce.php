<?php

use App\Commerce\Gateways\YookassaGateway;

return [

    // default currency
    'currency' => 'RUB',

    // default tax rate
    'tax'      => [
        'rate'               => 0.0,
        'included_in_prices' => false,
    ],

    // Coupon settings
    'coupon'   => [
        // 'include_tax'      => true, // if to apply the coupon after taxes
        // 'include_shipping' => true, // if to apply the coupon after shipping
    ],

    /*
    |--------------------------------------------------------------------------
    | Shipping
    |--------------------------------------------------------------------------
    |
    | You can set a fixed shipping amount. If you need to calculate the cost
    | according to each order, just pass a class that implements a
    | `calculate(Order $order)` method.
    */
    'shipping' => [
        //        'calculator' => ExampleShippingCalculator::class,
        'cost' => 0, // if calculator is null, this will be used
    ],

    /*
    |--------------------------------------------------------------------------
    | Offers Calculator
    |--------------------------------------------------------------------------
    |
    | You can apply discounts to order_items by creating a class that implements
    | an `apply(Order $order)` method. This method will get the `Order`
    | passed to it as a parameter. You should apply offers by setting
    | the `discount` on order_items.
    */
    'offers'   => [
        'calculator' => null, //ExampleOffersCalculator::class,
    ],

    'models'   => [
        // the order model - you can replace this with your own Order model that extends this class & implements the Order contract
        'order'     => YiddisheKop\LaravelCommerce\Models\Order::class,
        'orderItem' => YiddisheKop\LaravelCommerce\Models\OrderItem::class,
        // your user model - replace this with your user model
        'user'      => 'App\\Models\\User',
    ],

    /*
  |--------------------------------------------------------------------------
  | Payment Gateways
  |--------------------------------------------------------------------------
  |
  | You can setup multiple payment gateways for your store.
  | Here's where you can configure the gateways in use.
  */
    'gateways' => [
        YookassaGateway::class => [], // demo gateway
    ],

    'prefix'     => 'commerce', // routes prefix
    'middleware' => ['web'], // you probably want to include 'web' here

    'yookassaIps' => [
        '185.71.76.0/27',
        '185.71.77.0/27',
        '77.75.153.0/25',
        '77.75.156.11/32',
        '77.75.156.35/32',
        '77.75.154.128/25',
        '2a02:5180::/32',
    ]
];
