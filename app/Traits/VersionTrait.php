<?php

namespace App\Traits;

trait VersionTrait
{
    public function getVersionForHeader()
    {
        $ret = '';

        if (is_array($_SERVER) &&
            isset($_SERVER['HTTP_ACCEPT']) &&
            strcmp($_SERVER['HTTP_ACCEPT'], HTTP_HEADER_VERSION_ACCEPT) == 0)
        {
            $accept = $_SERVER['HTTP_ACCEPT'];
            $needle = '+version:';
            $pos = strpos($accept, $needle);
            if (false !== $pos && is_numeric($pos) && $pos > 0)
            {
                $version = substr($accept, $pos + strlen($needle));
                if (strlen($version) > 0)
                {
                    $ret = trim($version, '\r\n\t');
                }
            }
        }

        return $ret;
    }
}