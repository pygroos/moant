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
                'scheme' => env('redis_scheme', 'tcp:'),
                'host'   => env('redis_host', '127.0.0.1'),
                'port'   => env('redis_port', 6379),
            ]);
        }

        return self::$instance;
    }
}