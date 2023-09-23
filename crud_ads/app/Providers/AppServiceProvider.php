<?php

namespace App\Providers;

use Illuminate\Auth\TokenGuard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

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
       Auth::extend('token', function ($app, $name, array $config) {
        return new TokenGuard(Auth::createUserProvider($config['provider']), $app->request);
        });
        }
    }

