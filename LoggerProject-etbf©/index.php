<?php

use Enlog\Handler\MemoryHandler;
use Enlog\Logger;

require_once '../vendor/autoload.php';

$logger = new Logger();
$handler = new MemoryHandler();

$logger->registerHandler('memmory', $handler);

$logger->log('Yay, I wrote first simple library using TDD');

print_r($handler->getEntries());