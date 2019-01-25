<?php

// remove the first member in $argv. It's file name.
array_shift($argv);
if (is_array($argv) && count($argv) > 1) {
    // include class file
    require_once(dirname(__FILE__) . '/app/Command/' . ucwords($argv[0]) . 'Command.php');
    $class = ucwords($argv[0]) . 'Command';

    $object = new $class;
    $method = $argv[1];
    $count = count($argv);

    if (2 == $count) {
        call_user_func([$object, $method]);
    } else {
        unset($argv[0]);
        unset($argv[1]);
        call_user_func_array([$object, $method], $argv);
    }
} else {
    echo 'Missing necessary parameters!' . PHP_EOL;
}


