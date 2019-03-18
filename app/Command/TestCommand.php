<?php

use App\Services\Logger;

require_once dirname(__FILE__) . '/../../public/index.php';

class TestCommand
{
    //
    // php task.php test run
    //
    public function run()
    {
        echo "Hello World" . PHP_EOL;
        Logger::add('command', ['a', 'b']);
    }

    //
    // php task.php test foo a b c
    //
    public function foo($a, $b, $c)
    {
        echo "The input parameters are: $a, $b, $c" . PHP_EOL;;
    }
}