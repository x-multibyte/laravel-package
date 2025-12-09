<?php

namespace XMultibyte\Package;

use Illuminate\Support\ServiceProvider;
use XMultibyte\Package\Commands\PublishCommand;

class PackageServiceProvider extends ServiceProvider
{
    /**
     * The package name.
     */
    public const string PACKAGE_NAME = 'package';
    
    /**
     * The package version.
     */
    public const string VERSION = '1.0.0';
    
    /**
     * Register the package services.
     *
     * @return void
     */
    public function register(): void
    {
        # Merge the package configuration.
        $this->mergeConfigFrom(__DIR__ . '/../config/package.php', self::PACKAGE_NAME);
        
        # Register the application instance.
        $this->app->singleton(Package::class, fn(): Package => new Package());
        # Register the package alias.
        $this->app->alias(Package::class, self::PACKAGE_NAME);
    }
    
    /**
     * Boot the package services.
     *
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            # Register the package publishes.
            $this->registerPublishes();
            # Register the package commands.
            $this->commands([ PublishCommand::class ]);
        }
        # Load the package migrations.
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        # Load the package views.
        $this->loadViewsFrom(__DIR__ . '/../resources/views', self::PACKAGE_NAME);
        # Load the package translations.
        $this->loadTranslationsFrom(__DIR__ . '/../lang', self::PACKAGE_NAME);
    }
    
    /**
     * Register the package publishes.
     *
     * @return void
     */
    private function registerPublishes(): void
    {
        $this->publishes([
            __DIR__ . '/../config/package.php' => config_path('package.php'),
        ], 'config');
        
        $this->publishes([
            __DIR__ . '/../resources/assets' => public_path('vendor/package'),
        ], 'assets');
        
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/package'),
        ], 'views');
        
        $this->publishes([
            __DIR__ . '/../database/migrations' => database_path('migrations'),
        ], 'migrations');
        
        $this->publishes([
            __DIR__ . '/../lang/en' => lang_path('en'),
        ], 'translations');
    }
    
}
