<?php

// 目前使用命名空间只支持调用静态方法
use App\Services\Mail;

require_once dirname(__FILE__) . '/../../public/index.php';

class TestCommand
{
    //
    // php task.php test run
    //
    public function run()
    {
        echo "Hello World" . PHP_EOL;
        Mail::send('postmaster@moaik.com', 'xxx', 'xxx');
    }

    //
    // php task.php test foo a b c
    //
    public function foo($a, $b, $c)
    {
        echo "The input parameters are: $a, $b, $c" . PHP_EOL;;
    }
}