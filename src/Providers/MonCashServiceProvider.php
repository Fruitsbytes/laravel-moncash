<?php

namespace FruitsBytes\Laravel\MonCash\Providers;

use FruitsBytes\Laravel\MonCash\Services\HTTPService;
use FruitsBytes\Laravel\MonCash\Services\OrderIdService;
use FruitsBytes\Laravel\MonCash\Services\OrderIdUUIDService;
use FruitsBytes\Laravel\MonCash\Services\APIService;
use FruitsBytes\Laravel\MonCash\Services\AuthCachedService;
use FruitsBytes\Laravel\MonCash\Services\AuthService;
use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class MonCashServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(HTTPService::class, function () {
            return new HTTPService();
        });

        $this->app->singleton(APIService::class, function () {
            return new APIService();
        });

        $this->app->singleton(AuthService::class, function () {
            return new AuthCachedService();
        });

        $this->app->bind(OrderIdService::class, function () {
            return new OrderIdUUIDService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        // Config file
        $this->mergeConfigFrom(
            __DIR__.'/../config/mon-cash.php',
            'moncash'
        );

        // Route
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        // Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        // Translations
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'mon-cash');


        //Views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'mon-cash');

        // Publishable

        $this->publishes([
            __DIR__.'/../lang' => $this->app->langPath('vendor/mon-cash')
        ], 'mon-cash-lang');

        $this->publishes([
            __DIR__.'/../config/mon-cash.php' => config_path('mon-cash.php'),
        ], 'mon-cash-config');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/mon-cash'),

        ], "mon-cash-views");

        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/mon-cash'),
        ], 'public');

        Blade::componentNamespace('FruitsBytes\\Laravel\\MonCash\\View\\Components', 'mon-cash');

        AboutCommand::add('MonCash API', fn() => ['Version' => '1.0.0']);
    }
}
