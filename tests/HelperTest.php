<?php

use PHPUnit\Framework\TestCase;

class HelperTest extends TestCase
{
    public function setUp()
    {
        require __DIR__.'/../support/helper.php';
    }

    public function testRandomString()
    {
        $this->assertEquals(6, strlen(randomString()));

        $numStr = randomString(8, true);

        $this->assertEquals(8, strlen($numStr));
        $this->assertTrue(is_numeric($numStr));
    }
}