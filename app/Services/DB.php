<?php

namespace App\Services;

use Medoo\Medoo;

class DB
{
    private static $instance = null;

    final private function __construct(){}
    final private function __clone(){}

    public static function getInstance()
    {
        if (null == self::$instance)
        {
            self::$instance = new Medoo(
                [
                    'database_type' => env('DB_TYPE', 'mysql'),
                    'database_name' => env('DB_NAME'),
                    'server'        => env('DB_HOST'),
                    'username'      => env('DB_USERNAME'),
                    'password'      => env('DB_PASSWORD'),
                    'charset'       => env('DB_CHARSET', 'utf8'),
                    'port'          => env('DB_PORT', 3306),
                    'prefix'        => env('DB_PREFIX', ''),
                ]
            );
        }

        return self::$instance;
    }
}