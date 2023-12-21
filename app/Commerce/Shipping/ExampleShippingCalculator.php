<?php

namespace App\Commerce\Shipping;

use YiddisheKop\LaravelCommerce\Contracts\Order;

class ExampleShippingCalculator
{
    public static function calculate(Order $order)
    {
        return 0;
    }
}
