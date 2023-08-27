<?php

namespace App\Providers;

use App\Services\OpenWeatherMap\OneCallApiV3\ApiKey;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        $this->app->bind(\App\Services\OpenWeatherMap\OneCallApiV3\Request::class, function () {
            $apiKey = new ApiKey(config('openweathermap.api.one_call_3.api_key'));
            return new \App\Services\OpenWeatherMap\OneCallApiV3\Request($apiKey);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
