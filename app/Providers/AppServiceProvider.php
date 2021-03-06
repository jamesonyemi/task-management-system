<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use  Illuminate\Support\Facades\Schema;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        
        if (\App::environment() === 'production') {
            $url->forceScheme('https');
        }

        Schema::defaultStringLength(191);
        View::share('key', 'value'); 
        

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // if(env('REDIRECT_HTTPS')) {
        //     $this->app['request']->server->set('HTTPS', true);
        // }
        // else{
        //     $this->app['request']->server->set('HTTPS', false);
        // }
    }

}
