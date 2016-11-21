<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Mazharul\Lastfm\Lastfm;
use Config;

class LastfmServiceProvider extends ServiceProvider
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
        $this->app->singleton(Lastfm::class, function ($app) {
            return new Lastfm(Config::get('lastfm.api_key'));
        });
    }
}
