<?php

namespace App\Http\Controllers\Commerce;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use YiddisheKop\LaravelCommerce\Facades\Cart;

class CartController extends Controller
{
    public function addProduct(Request $request, Product $product)
    {
        $product->addToCart();
        $request->session()->flash('alert', $product->title.' добавлен в корзину');
        return redirect()->back();
    }

    public function removeProduct(Request $request, Product $product)
    {
        $product->removeFromCart();
        $request->session()->flash('alert', $product->title.' удалён из корзины');
        return redirect()->back();
    }

    public function cleanCart(Request $request, Cart $cart)
    {
        $cart::empty();
        return redirect()->back();
    }
}
