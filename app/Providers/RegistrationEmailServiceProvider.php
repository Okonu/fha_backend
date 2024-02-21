<?php

namespace App\Providers;

use App\Services\RegistrationEmailService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Mail\MailManager;

class RegistrationEmailServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(RegistrationEmailService::class, function ($app) {
            $mailManager = $app->make(MailManager::class);
            return new RegistrationEmailService($mailManager);
        });
    }

    public function boot(): void
    {
        //
    }
}
