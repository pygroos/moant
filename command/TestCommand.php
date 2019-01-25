<?php

class TestCommand
{
    //
    // php task.php test run
    //
    public function run()
    {
        echo "Hello World" . PHP_EOL;
    }

    //
    // php task.php test foo a b c
    //
    public function foo($a, $b, $c)
    {
        echo "The input parameters are: $a, $b, $c" . PHP_EOL;;
    }
}