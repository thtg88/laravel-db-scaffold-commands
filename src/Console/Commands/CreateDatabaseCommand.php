<?php

namespace Thtg88\DbScaffold\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Thtg88\DbScaffold\Exceptions\NotExistException;
use Thtg88\DbScaffold\Exceptions\NotSupportedException;
use Thtg88\DbScaffold\Utils;

class CreateDatabaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the database if it does not exists.';

    /**
     * Execute the console command.
     *
     * @return void
     * @throws \Thtg88\DbScaffold\Exceptions\NotSupportedException If database connection not "mysql" nor "pgsql".
     */
    public function handle(): void
    {
        // Get default database connection from config
        $default_connection = config('database.default');
        if (
            ! is_string($default_connection) ||
            ! array_key_exists($default_connection, Utils::SUPPORTED)
        ) {
            throw new NotSupportedException($default_connection);
        }

        // Get database name from arguments
        $db_name = $this->argument('name');

        $connection_classname = Utils::SUPPORTED[$default_connection];

        $connection = new $connection_classname();

        $this->line('Creating '.$connection::NAME.' database '.$db_name.' ...');

        try {
            $connection->createDatabase($db_name);
        } catch (NotExistException $e) {
            $this->error($e->getMessage());
            return;
        }

        $this->info($connection::NAME.' database "'.$db_name.'" created!');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments(): array
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the database'],
        ];
    }
}
