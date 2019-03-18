<?php
define('SERVICE_START', microtime(true));
define('SAPI_TYPE', php_sapi_name());
define('ROOT_PATH', dirname(dirname(__FILE__)));
define('HTTP_HEADER_VERSION_ACCEPT', 'application/moant+json+version:1.0');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, DELETE, UPDATE');

require dirname(__FILE__) . '/../bootstrap/autoload.php';

if ('cli-server' == SAPI_TYPE) {
    $app->run();
}
