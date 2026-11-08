<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */


    public function boot(): void
    {
        View::composer('*', function ($view) {
            $cartCount = 0;
            if (Auth::check()) {
                $cartCount = \App\Models\Cart::where('user_id', Auth::id())
                    ->latest()
                    ->first()
                    ?->items()
                    ->sum('quantity') ?? 0;
            }
            $view->with('cartCount', $cartCount);
        });
    }
}
