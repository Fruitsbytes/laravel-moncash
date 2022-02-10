<?php

namespace Fruitsbytes\LaravelMoncash;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Fruitsbytes\LaravelMoncash\Commands\LaravelMoncashCommand;

class LaravelMoncashServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-moncash')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-moncash_table')
            ->hasCommand(LaravelMoncashCommand::class);
    }
}
