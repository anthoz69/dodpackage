<?php

namespace anthoz69\dodpackage;

use Illuminate\Support\ServiceProvider;

class dodpackageServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'anthoz69');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'anthoz69');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/dodpackage.php', 'dodpackage');

        // Register the service the package provides.
        $this->app->singleton('dodpackage', function ($app) {
            return new dodpackage;
        });
        $this->app->singleton('dodstorage', function ($app) {
            return new dodStorage;
        });
        $this->app->singleton('dodslug', function ($app) {
            return new dodSlug;
        });

        $this->loadHelper();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'dodpackage',
            'dodStorage',
            'dodSlug',
        ];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__ . '/../config/dodpackage.php' => config_path('dodpackage.php'),
        ], 'dodpackage.config');

        // Publishing the views.
        /*$this->publishes([
        __DIR__.'/../resources/views' => base_path('resources/views/vendor/anthoz69'),
        ], 'dodpackage.views');*/

        // Publishing assets.
        /*$this->publishes([
        __DIR__.'/../resources/assets' => public_path('vendor/anthoz69'),
        ], 'dodpackage.views');*/

        // Publishing the translation files.
        /*$this->publishes([
        __DIR__.'/../resources/lang' => resource_path('lang/vendor/anthoz69'),
        ], 'dodpackage.views');*/

        // Registering package commands.
        // $this->commands([]);
    }

    protected function loadHelper()
    {
        require_once 'Helpers/currency.php';
        require_once 'Helpers/routes.php';
        require_once 'Helpers/social.php';
        require_once 'Helpers/time.php';
    }
}
