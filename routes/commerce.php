<?php

use App\Http\Controllers\Commerce\CartController;
use App\Http\Controllers\Commerce\WebhookController;
use Illuminate\Support\Facades\Route;

Route::post('clean-cart', [CartController::class, 'cleanCart'])->name('cleanCart');

Route::prefix('product')->group(function () {
    Route::post('add-to-cart/{product}', [CartController::class, 'addProduct'])->name('product.addToCart');

    Route::post('remove-from-cart/{product}', [CartController::class, 'removeProduct'])->name('product.remove');
});

// Webhook
Route::withoutMiddleware([
    \App\Http\Middleware\EncryptCookies::class,
    \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
    \Illuminate\Session\Middleware\StartSession::class,
    \Illuminate\View\Middleware\ShareErrorsFromSession::class,
    \App\Http\Middleware\VerifyCsrfToken::class,
])
    ->name('order.webhook')
    ->group(function () {
        Route::get('webhook', WebhookController::class);
        Route::post('webhook', WebhookController::class); // some gateways use POST
    });
