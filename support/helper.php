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
        $bRet = false;

        foreach ((array) $needles as $needle)
        {
            if ($needle != '' && mb_strpos($haystack, $needle) === 0) {
                $bRet = true;
            }
        }

        return $bRet;
    }
}

/**
 * Determine if a given string ends with a given substring
 */
if (! function_exists('endsWith')) {
    function endsWith($haystack, $needles)
    {
        $bRet = false;

        foreach ((array) $needles as $needle) {
            if ((string) $needle === mb_substr($haystack, -mb_strlen($needle), NULL, 'UTF-8')) {
                $bRet = true;
            }
        }

        return $bRet;
    }
}
