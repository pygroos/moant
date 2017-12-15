<?php

namespace App\Controllers;

use App\Services\DB;
use App\Services\Redis;
use App\Services\Logger;
use Slim\Http\Request;

class TestController extends Controller
{
    public function test(Request $request)
	{
	    // DB Service Example

		// $db = DB::getInstance();
		// $arrUser = $db->select('users', ['username']);

        // Redis Service Example

		// $redis = Redis::getInstance();
		// $redis->setex('redis_key', 3600, json_encode($arrUser));

        // Logger Service Example

		// Logger::add('name', [$request->getUri(), $request->getMethod()]);
		
		return $this->outPut(200, 'success', ['project' => 'slim-framework']);
	} 
}