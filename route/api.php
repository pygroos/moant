<?php

$app->any('/', '\App\Controllers\DemoController:test');
$app->post('/users', '\App\Controllers\RegisterController:action');



