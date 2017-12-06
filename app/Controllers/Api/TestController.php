<?php

namespace App\Controllers;

use App\Services\DB;
use Slim\Http\Request;
use App\Services\Redis;
use App\Services\Logger;

class TestController extends Controller
{
	public function test(Request $request)
	{
		$db = DB::getInstance();
		$arrUser = $db->select('users', ['username']);

		$redis = Redis::getInstance();
		$redis->setex('redis_key', 3600, json_encode($arrUser));
		
		Logger::add('name', [$request->getUri(), $request->getMethod()]);
		
		echo '<h1 style="text-align: center; margin-top: 200px">';
        echo 'Micro Framework';
        echo '</h1>';
	} 
}