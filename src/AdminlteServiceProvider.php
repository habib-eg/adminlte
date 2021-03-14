<?php

namespace Habib\Adminlte;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AdminlteServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'habib');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'habib');
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
        $this->mergeConfigFrom(__DIR__.'/../config/adminlte.php', 'adminlte');

        // Register the service the package provides.
        $this->app->singleton('adminlte', function ($app) {
            return new Adminlte;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['adminlte'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $path =dirname(__DIR__);
        $this->publishes([
            $path.'config/adminlte.php' => config_path('adminlte.php'),
        ], 'adminlte.config');

        // Publishing the views.
        $this->publishes([
            $path.'resources/views' => base_path('resources/views/vendor/habib'),
        ], 'adminlte.views');

        // Publishing assets.
        /*$this->publishes([
            $path.'resources/assets' => public_path('vendor/habib'),
        ], 'adminlte.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            $path.'resources/lang' => resource_path('lang/vendor/habib'),
        ], 'adminlte.views');*/

        // Registering package commands.
        // $this->commands([]);
        Blade::componentNamespace('\Habib\Adminlte\View\Components','adminlte');

    }
}
