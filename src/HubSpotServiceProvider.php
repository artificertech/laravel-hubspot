<?php

namespace Artificertech\HubSpot;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class HubSpotServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-hubspot')
            ->hasConfigFile();
    }

    public function packageRegistered()
    {
        $this->app->singleton(\Artificertech\HubSpot\HubSpotManager::class);
    }
}
