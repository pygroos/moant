<?php

/**
 * Get `.env` configure file's value by key
 */
if (! function_exists('env')) {
    function env($key, $default = null)
    {
        $value = getenv($key);

        if (false === $value) {
            return $default;
        }

        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;
            case 'false':
            case '(false)':
                return false;
            case 'empty':
            case '(empty)':
                return '';
            case 'null':
            case '(null)':
                return;
        }

        if (strlen($value) > 1 && startsWith($value, '"') && endsWith($value, '"')) {
            return substr($value, 1, -1);
        }

        return $value;
    }
}

/**
 * Determine if a given string starts with a given substring
 */
if (! function_exists('startsWith')) {
    function startsWith($haystack, $needles)
    {
        $ret = false;

        foreach ((array) $needles as $needle)
        {
            if ($needle != '' && mb_strpos($haystack, $needle) === 0) {
                $ret = true;
            }
        }

        return $ret;
    }
}

/**
 * Determine if a given string ends with a given substring
 */
if (! function_exists('endsWith')) {
    function endsWith($haystack, $needles)
    {
        $ret = false;

        foreach ((array) $needles as $needle) {
            if ((string) $needle === mb_substr($haystack, -mb_strlen($needle), NULL, 'UTF-8')) {
                $ret = true;
            }
        }

        return $ret;
    }
}

/**
 * Determine the IP address is internal
 */
if (! function_exists('isInnerIp')) {
    function isInnerIp($str)
    {
        if (0 == strlen($str) || filter_var($str, FILTER_VALIDATE_IP)) {
            return false;
        }

        $ret = false;

        $innerIp = filter_var(
            $str,
            FILTER_VALIDATE_IP,
            FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE
        );

        if (false === $innerIp) {
            $ret = true;
        }

        return $ret;
    }

/**
 * Generate random string
 */
if (! function_exists('randomString')) {
    function randomString($length = 6, $numeric = false)
    {
        $ret = '';

        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        if (true == $numeric) {
            $chars = '0123456789';
        }

        $charLen = strlen( $chars );
        for ( $i = 0; $i < $length; $i ++ )
        {
            $ret .= $chars[ rand( 0, $charLen - 1 ) ];
        }
        return $ret;
    }
}

}
