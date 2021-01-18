<?php

namespace Thtg88\DbScaffold\Exceptions;

use RuntimeException;

class NotConfiguredException extends RuntimeException
{
    /**
     * Create a new exception instance.
     *
     * @param mixed $connection
     *
     * @return void
     */
    public function __construct($connection)
    {
        parent::__construct(
            'Database not configured for: '.json_encode($connection)
        );
    }
}
