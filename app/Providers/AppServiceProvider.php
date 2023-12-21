<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use YooKassa\Client;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('yookassa', function () {
            $client = new Client();
            $client->setAuth('983860', 'test__0SQMhUqYGZlh5rK5jgHD_aW5JspnNeLS-UGc0X0TKU');
            return $client;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
