<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, DELETE, UPDATE');

define('SERVICE_START', microtime(true));

define('ROOT_PATH', dirname(dirname(__FILE__)));

define('HTTP_HEADER_VERSION_ACCEPT', 'application/moext+json+version:1.0');

require '../bootstrap/autoload.php';

$app->run();
