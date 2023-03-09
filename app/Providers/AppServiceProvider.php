<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
        View::composer(['components.app-layout.sidebar', 'office.layouts.components.sidebar'], 'App\Http\Composers\MenuComposer');
        View::composer(['components.app-layout.footer', 'partials._footer'], 'App\Http\Composers\FrontendFooterComposer');
        View::composer(['components.app-layout.menu', 'office.layouts.components.navigation'], 'App\Http\Composers\NotificationComposer');
        View::composer(['layouts.guest', 'frontend.layouts.frontend'], 'App\Http\Composers\FrontendFooterComposer');
        View::composer(['components.app-layout.menu', 'office.layouts.components.navigation'], 'App\Http\Composers\FrontendFooterComposer');

        View::share('data', []);
    }
}
