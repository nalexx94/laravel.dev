<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MenuService;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('SiteMenu',function ($app) {
            return new MenuService();
        });
    }
}
