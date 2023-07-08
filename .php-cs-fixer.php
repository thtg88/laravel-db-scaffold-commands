<?php

use PhpCsFixer\Finder;
use PhpCsFixer\Config;

$finder = Finder::create()->in(__DIR__);

return (new Config())->setFinder($finder);
