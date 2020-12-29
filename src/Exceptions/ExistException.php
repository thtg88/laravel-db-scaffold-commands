<?php

namespace Thtg88\DbScaffold\Exceptions;

use InvalidArgumentException;

class ExistException extends InvalidArgumentException
{
    /**
     * Create a new exception instance.
     *
     * @param string $db_name
     * @return void
     */
    public function __construct(string $db_name)
    {
        parent::__construct('Database '.$db_name.' already exist!');
    }
}
