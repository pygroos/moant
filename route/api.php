<?php

use App\Controllers\DemoController;

$app->any('/', DemoController::class . ':test');
