<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use YiddisheKop\LaravelCommerce\Facades\Cart;
use YiddisheKop\LaravelCommerce\Models\Order;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $products = Product::all();
    return view('pages.index', compact('products'));
})->name('home');

Route::get('/cart', function () {
    /* @var YiddisheKop\LaravelCommerce\Cart */
    $cart = Cart::get();
    $items = $cart->items;
    return view('pages.cart', compact('cart', 'items'));
})->name('cart');

Route::get('/orders', function () {
    $orders = Order::all();
    return view('pages.order.list', compact('orders'));
})->name('orders');

Route::get('/product/{product}', function (Product $product) {
    return view('pages.product', compact('product'));
})->name('product');
