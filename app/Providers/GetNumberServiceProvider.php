<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class GetNumberServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('getNumber', 'App\Services\GetRandomNumber');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
