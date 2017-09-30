<?php

namespace App\Controllers;

use App\Services\DB;
use App\Services\Logger;

class TestController
{
	public function test()
	{
		$db = DB::getInstance();
		$users = $db->select('users', ['username']);

		Logger::add('name', $users);
		
		echo '<h1 style="text-align: center; margin-top: 200px">';
        echo 'Micro Framework';
        echo '</h1>';
	} 
}