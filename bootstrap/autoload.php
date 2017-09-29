<?php

//  Register the auto loader
require '../vendor/autoload.php';

//  Load `.env` configuration file
$env = new Dotenv\Dotenv(ROOT_PATH);
$env->load();

//  Set timezone
@ date_default_timezone_set(env('timezone', 'UTC'));

//  Create app
$app = new \Slim\App(
    [
        'settings' => [
            'displayErrorDetails' => env('app_debug')
        ]
    ]
);

//  Get container
$container = $app->getContainer();

//  Require api route file
require '../route/api.php';