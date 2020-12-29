<?php

namespace Thtg88\DbScaffold;

use Illuminate\Support\ServiceProvider;
use Thtg88\DbScaffold\Console\Commands\CreateDatabaseCommand;
use Thtg88\DbScaffold\Console\Commands\DropDatabaseCommand;

class DbScaffoldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        // Config
        // $this->publishes([
        //     __DIR__.'/../config/db-scaffold.php' => Container::getInstance()->configPath('db-scaffold.php'),
        // ], 'db-scaffold-config');

        // Commands
        $this->commands([
            CreateDatabaseCommand::class,
            DropDatabaseCommand::class,
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {
        // $this->mergeConfigFrom(__DIR__.'/../config/db-scaffold.php', 'db-scaffold');
    }
}
