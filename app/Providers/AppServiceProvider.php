<?php

namespace App\Providers;

use Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;

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
        Paginator::useBootstrap();
        Schema::defaultStringLength(191);
        View::composer('*', function ($view) {
            $view->with('currentUser', Auth::user());
        });



    }
}
