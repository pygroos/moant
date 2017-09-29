<?php

define('SERVICE_START', microtime(true));

define('ROOT_PATH', dirname(dirname(__FILE__)));

require '../bootstrap/autoload.php';

$app->run();
