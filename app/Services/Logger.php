<?php

namespace App\Services;

use Monolog\Logger as Log;
use Monolog\Handler\StreamHandler;

class Logger
{
    public static function add($name, $data, $level = Log::INFO)
    {
        $path = ROOT_PATH . '/storage/';

        $log = new Log($name);
        $log->pushHandler(new StreamHandler($path . $name .'.'. date('Y-m-d') . '.log', $level));

        $log->info($name, $data);
    }
}
