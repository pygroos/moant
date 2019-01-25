## Introduction
**Moant is a php micro framework powered by slim.Used for easy and quick development api.**  
**Moant have the following characteristics:**
* **restful api route**
* **flexible api version control**
* **customize package**
* **php cli command**
* ......

## Installation
```
composer create-project pygroos/moant your-app '1.0.*' --prefer-dist -vvv
```

## Example
* **Route**  
```
$app->get('/', '\App\Api\DemoApi:test');
```
* **Config**
```
APP_DEBUG=true
TIMEZONE=Asia/Shanghai

# Database config
# [required]
DB_TYPE=mysql
DB_NAME=test
DB_HOST=127.0.0.1
DB_USERNAME=root
DB_PASSWORD=
# [optional]
DB_PORT=
DB_CHARSET=
DB_PREFIX=

# Redis config
REDIS_SCHEME=tcp
REDIS_HOST=127.0.0.1
REDIS_PORT=6379
```
* **Api demo**
```
<?php

namespace App\Api;

use App\Services\DB;
use App\Services\Redis;
use App\Services\Logger;

class DemoApi extends BaseApi
{
    public function test()
	{
	    // Get Param Example
	    $param = $this->request->getParam('param', 0);
	
	    // DB Service Example
		$db = DB::getInstance();
		$arrUser = $db->select('users', ['username']);

        // Redis Service Example
		$redis = Redis::getInstance();
		$redis->setex('redis_key', 3600, json_encode($arrUser));

        // Logger Service Example
		Logger::add(
		    'name',
            [
                $this->request->getUri(),
                $this->request->getMethod()
            ]
        );
		
		return $this->outPut(
		    200,
            'success',
            ['project' => 'Moant Framework'],
            $this->version
        );
	} 
}
```

## In use package
* [Medoo](https://medoo.in/)
* [Predis](https://github.com/nrk/predis/wiki) 
* [Monolog](https://seldaek.github.io/monolog/) 
* [Phpdotenv](https://github.com/vlucas/phpdotenv/blob/master/README.md) 
* [Guzzle](http://docs.guzzlephp.org/en/stable/overview.html)

## Video tutorial
http://study.163.com/course/introduction/1004712047.htm



