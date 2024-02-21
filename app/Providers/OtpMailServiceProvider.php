<?php

namespace App\Providers;

use App\Services\OtpMailService;
use Illuminate\Support\ServiceProvider;

class OtpMailServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(OtpMailService::class, function ($app) {
            return new OtpMailService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
