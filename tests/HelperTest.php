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

    public function testisInnerIp()
    {
        // Type A：10.0.0.0 - 10.255.255.255
        // Type B：172.16.0.0 - 172.31.255.255
        // Type C：192.168.0.0 - 192.168.255.255

        $aTypeStart = ip2long('10.0.0.0');
        $aTypeEnd = ip2long('10.255.255.255');

        $bTypeStart = ip2long('172.16.0.0');
        $bTypeEnd = ip2long('172.31.255.255');

        $cTypeStart = ip2long('192.168.0.0');
        $cTypeEnd = ip2long('192.168.255.255');

        for ($i = $aTypeStart; $i <= $aTypeEnd; ++$i)
        {
            $this->assertTrue(isInnerIp(long2ip($i)));
        }

        for ($i = $bTypeStart; $i <= $bTypeEnd; ++$i)
        {
            $this->assertTrue(isInnerIp(long2ip($i)));
        }

        for ( $i = $cTypeStart; $i <= $cTypeEnd; ++$i )
        {
            $this->assertTrue( isInnerIp( long2ip( $i ) ) );
        }
    }
}