<?php

use Controller\Controller;
use Model\Elevator;

require_once __DIR__ . '/../vendor' . '/autoload.php';

class Runner
{
    public static function run()
    {
        $controller = new Controller(Elevator::getInstance());
        $controller->processUser();
    }
}

Runner::run();