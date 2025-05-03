<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
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
        //
        Paginator::useBootstrap();
        // Check if the current request is from ngrok by looking for "ngrok.io" in the host
        if (str_contains(request()->getHost(), 'ngrok.io')) {
            config(['app.url' => request()->getSchemeAndHttpHost()]);
        }
    }
}
