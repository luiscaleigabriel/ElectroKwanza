<?php

namespace App\Providers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $view->with([
                'cartItems' => Cart::content(),
                'cartCount' => Cart::content()->count(),
                'cartTotal' => Cart::content()->sum(function ($item) {
                    return $item->price * $item->qty;
                }),
            ]);
        });
    }
}
