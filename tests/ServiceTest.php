<?php

use PHPUnit\Framework\TestCase;

define('ROOT_PATH', dirname(dirname(__FILE__)));

class ServiceTest extends TestCase
{
    public function setUp()
    {
        require __DIR__.'/../bootstrap/autoload.php';
    }
    
    public function testDBInstance()
    {
        $this->assertTrue(is_object(\App\Services\DB::getInstance()));
    }

    public function testRedisInstance()
    {
        $this->assertTrue(is_object(\App\Services\Redis::getInstance()));
    }
    
}