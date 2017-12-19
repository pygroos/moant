<?php

use App\Controllers\DemoController;
use App\Controllers\RegisterController;

$app->any('/', DemoController::class . ':test');

$app->post('/users', RegisterController::class . ':action');



