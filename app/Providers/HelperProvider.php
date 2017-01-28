<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\GlobalHelpers;

class HelperProvider extends ServiceProvider
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
        $this->app->singleton('HelpFD',function ($app) {
            return new GlobalHelpers();
        });
    }
}
