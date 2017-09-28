<?php

use App\Controllers\TestController;

$app->any('/', TestController::class . ':test');
