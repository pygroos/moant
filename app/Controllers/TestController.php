<?php

namespace App\Controllers;

use App\Services\DB;

class TestController
{
	public function test()
	{
		var_dump(DB::getInstance());

		echo '<h1 style="text-align: center; margin-top: 200px">';
        echo 'Micro Framework';
        echo '</h1>';
	} 
}