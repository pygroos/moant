<?php

namespace App\Api;

use App\Services\DB;
use App\Services\Redis;
use App\Services\Logger;

class DemoApi extends BaseApi
{
    public function test()
	{
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