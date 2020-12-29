<?php

namespace Thtg88\DbScaffold\Exceptions;

use InvalidArgumentException;

class NotExistException extends InvalidArgumentException
{
    /**
     * Create a new exception instance.
     *
     * @param string $db_name
     * @return void
     */
    public function __construct(string $db_name)
    {
        parent::__construct('Database does not exist: '.$db_name);
    }
}
