<?php

namespace Thtg88\DbScaffold\Connections;

use Illuminate\Support\Facades\DB;
use PDO;

class MySql implements Connection
{
    public const NAME = 'MySQL';

    public function createDatabase(string $database): bool
    {
        $this->getPDOConnection(
            config('database.connections.mysql.host'),
            config('database.connections.mysql.port'),
            config('database.connections.mysql.username'),
            config('database.connections.mysql.password')
        )->exec(
            'CREATE DATABASE IF NOT EXISTS '.$database.
            ' CHARACTER SET '.config('database.connections.mysql.charset').
            ' COLLATE '.config('database.connections.mysql.collation').';'
        );

        return true;
    }

    public function dropDatabase(string $database): void
    {
        DB::statement('DROP DATABASE '.$database.';');
    }

    public function getDatabases(): array
    {
        return array_map(static function ($database): string {
            return $database->Database;
        }, DB::select('SHOW DATABASES;'));
    }

    /**
     * Return a new MySQL PDO connection from a given host, port, username,
     * and password.
     *
     * @param string $host
     * @param int    $port
     * @param string $username
     * @param string $password
     *
     * @return PDO
     */
    private function getPdoConnection(
        string $host,
        int $port,
        string $username,
        string $password
    ): PDO {
        return new PDO(
            'mysql:host='.$host.';port='.$port.';',
            $username,
            $password
        );
    }
}
