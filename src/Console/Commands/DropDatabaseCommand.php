<?php

namespace Thtg88\DbScaffold\Console\Commands;

use Illuminate\Console\Command;
use Thtg88\DbScaffold\Connections\MySql;
use Thtg88\DbScaffold\Exceptions\NotConfiguredException;
use Thtg88\DbScaffold\Exceptions\NotExistException;
use Thtg88\DbScaffold\Exceptions\NotSupportedException;
use Thtg88\DbScaffold\Utils;

class DropDatabaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:drop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Drop selected database.';

    /**
     * Execute the console command.
     *
     * @throws \Thtg88\DbScaffold\Exceptions\NotSupportedException  If database connection not mysql nor pgsql.
     * @throws \Thtg88\DbScaffold\Exceptions\NotConfiguredException If database name not configured (null).
     *
     * @return void
     */
    public function handle(): void
    {
        if (!$this->confirm('This is going to delete all your information. ARE YOU SURE?')) {
            $this->info('Exiting.');

            return;
        }

        // Get default database connection from config
        $default_connection = config('database.default');
        if (
            !is_string($default_connection) ||
            !array_key_exists($default_connection, Utils::SUPPORTED)
        ) {
            throw new NotSupportedException($default_connection);
        }

        // Get database name from default database connection
        $db_name = config('database.connections.'.$default_connection.'.database');
        if ($db_name === null) {
            throw new NotConfiguredException($default_connection);
        }

        $connection_classname = Utils::SUPPORTED[$default_connection];

        $connection = new $connection_classname();

        $this->line('Dropping '.$connection::NAME.' database '.$db_name.' ...');

        try {
            $connection->dropDatabase($db_name);
        } catch (NotExistException $e) {
            $this->error($e->getMessage());

            return;
        }

        $this->info($connection::NAME.' database '.$db_name.' dropped!');
    }
}
