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
                    'database_type' => env('db_type', 'mysql'),
                    'database_name' => env('db_name'),
                    'server'        => env('db_server'),
                    'username'      => env('db_username'),
                    'password'      => env('db_password'),
                    'charset'       => env('db_charset', 'utf8'),
                    'port'          => env('db_port', 3306),
                    'prefix'        => env('db_prefix', ''),
                ]
            );
        }

        return self::$instance;
    }
}