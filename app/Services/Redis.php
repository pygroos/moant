<?php

namespace App\Services;

use Predis\Client;

class Redis
{
    private static $instance = null;

    final private function __construct(){}
    final private function __clone(){}

    public static function getInstance()
    {
        if (null === self::$instance)
        {
            self::$instance = new Client([
                'scheme' => env('REDIS_SCHEME', 'tcp:'),
                'host'   => env('REDIS_HOST', '127.0.0.1'),
                'port'   => env('REDIS_PORT', 6379),
            ]);
        }

        return self::$instance;
    }
}