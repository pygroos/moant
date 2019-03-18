<?php

//  Register the auto loader
require dirname(__FILE__) . '/../vendor/autoload.php';

//  Load `.env` configuration file and keys but not $_SERVER
$previousKeys = array_keys($_ENV);
$env = new Dotenv\Dotenv(ROOT_PATH);
$env->load();
$currentKeys = array_keys($_ENV);
$newKeys = array_diff($currentKeys, $previousKeys);
array_map(function($key) {
    unset($_SERVER[$key]);
}, $newKeys);

//  Set timezone
@ date_default_timezone_set(env('TIMEZONE', 'UTC'));

if ('cli-server' == SAPI_TYPE) {
    //  Create app
    $app = new \Slim\App(
        [
            'settings' => [
                'displayErrorDetails' => env('APP_DEBUG', true)
            ]
        ]
    );
//  Get container
    $container = $app->getContainer();

    //  Require api route file
    require dirname(__FILE__) . '/../route/api.php';
}
