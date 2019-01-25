<?php

$app->any('/', '\App\Api\DemoApi:test');
$app->post('/users', '\App\Api\RegisterApi:action');



