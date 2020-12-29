<?php

namespace Thtg88\DbScaffold\Connections;

interface Connection
{
    /**
     * Create a database from the given name.
     *
     * @param string $database
     * @return bool
     */
    public function createDatabase(string $database): bool;

    /**
     * Drop a database from a given name.
     *
     * @param string $database
     * @return void
     */
    public function dropDatabase(string $database): void;

    /**
     * Return a list of the available databases.
     *
     * @return array
     */
    public function getDatabases(): array;
}
