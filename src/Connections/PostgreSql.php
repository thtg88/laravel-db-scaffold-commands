<?php

namespace Thtg88\DbScaffold\Connections;

use Illuminate\Support\Facades\DB;
use Thtg88\DbScaffold\Exceptions\NotExistException;

class PostgreSql implements Connection
{
    const NAME = 'PostgreSQL';

    /**
     * Create a database from the given name.
     *
     * @param string $database
     * @return bool
     * @throws \Thtg88\DbScaffold\Exceptions\NotExistException If the database does not exist.
     */
    public function createDatabase(string $database): bool
    {
        // We reset default database name to "postgres"
        // as we can not create the database we can not connect to yet :\
        config(['database.connections.pgsql.database' => 'postgres']);

        if (array_search($database, $this->getDatabases()) === false) {
            throw new NotExistException($database);
        }

        DB::statement('CREATE DATABASE '.$database.';');

        return true;
    }

    /**
     * Drop a database from the given name.
     *
     * @param string $database
     * @return void
     * @throws \Thtg88\DbScaffold\Exceptions\NotExistException If the database does not exist.
     */
    public function dropDatabase(string $database): void
    {
        // We reset default database name to "postgres"
        // as we can not delete the database we are connected to
        config(['database.connections.pgsql.database' => 'postgres']);

        if (array_search($database, $this->getDatabases()) === false) {
            throw new NotExistException($database);
        }

        DB::statement('DROP DATABASE '.$database.';');
    }

    public function getDatabases(): array
    {
        return array_map(static function ($database): string {
            return $database->datname;
        }, DB::select('SELECT datname FROM pg_database'));
    }
}
