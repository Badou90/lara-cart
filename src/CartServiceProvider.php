<?php

namespace Badou\Cart;

use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Cart::class, function() {
            return new Cart();
        });

        $this->app->alias(Cart::class, 'cart');
    }
}
