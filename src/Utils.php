<?php

namespace Thtg88\DbScaffold;

use Thtg88\DbScaffold\Connections\MySql;
use Thtg88\DbScaffold\Connections\PostgreSql;

final class Utils
{
    public const SUPPORTED = [
        'mysql' => MySql::class,
        'pgsql' => PostgreSql::class,
    ];
}
