<?php 

require_once 'vendor/autoload.php';

use \Enlog\Logger;
use \Enlog\Handler\MemoryHandler;

$logger = new Logger();
$handler = new MemoryHandler();

$logger->registerHandler('memory',$handler);

$logger->log("Yay,I wrote first simple library using TDD!");

var_dump($handler->getEntries());

 ?>