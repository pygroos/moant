<?php

namespace App\Models;

class Model
{
    protected $modelVersion;
    protected static $arrInstance = [];

    public function __construct()
    {
        $this->modelVersion = '1.0';
    }

    final public static function getInstance()
    {
        $ret = null;
        $className = get_called_class();
        if (false !== $className && is_string($className))
        {
            if (! in_array($className, self::$arrInstance))
            {
                $ret = self::$arrInstance[$className] = new $className();
            }
            else
            {
                $ret = self::$arrInstance[$className];
            }
        }
        return $ret;
    }

    final public function getModelVersion()
    {
        return $this->modelVersion;
    }

    final public function setModelVersion($version)
    {
        $this->modelVersion = $version;
    }

    final private function __clone() {}
}