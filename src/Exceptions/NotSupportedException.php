<?php

namespace Thtg88\DbScaffold\Exceptions;

use RuntimeException;
use Thtg88\DbScaffold\Utils;

class NotSupportedException extends RuntimeException
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
            'Database connection type not supported: '.
            json_encode($connection).', '.
            'please select one of the supported connection types: '.
            implode(', ', Utils::SUPPORTED)
        );
    }
}
