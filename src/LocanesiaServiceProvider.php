<?php

namespace rezzakurniawan\Locanesia;

use Illuminate\Support\ServiceProvider;

class LocanesiaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap The Application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/locanesia.php' => config_path('locanesia.php'),
        ]);

        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/locanesia.php', 'locanesia'
        );

        $this->app->singleton(Locanesia::class, function() {
            return new Locanesia();
        });

        $this->app->alias(Locanesia::class, 'locanesia');
    }
}