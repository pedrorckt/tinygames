<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\TwitchApiService;

class TwitchApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(TwitchApiService::class, function ($app) {
            // Configure and instantiate the TwitchApiService
            $baseUrl = config('services.twitch.base_url');
            $clientId = config('services.twitch.client_id');
            $token = config('services.twitch.token');
            // Return the instance
            return new TwitchApiService($baseUrl, $clientId, $token);
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
