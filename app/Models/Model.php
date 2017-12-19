<?php

namespace App\Models;

use App\Services\DB;
use App\Services\Redis;

class Model
{
    protected $db;
    protected $redis;
    protected $modelVersion;
    protected static $arrInstance = [];

    public function __construct()
    {
        $this->modelVersion = '1.0';

        $this->db = DB::getInstance();
        $this->redis = Redis::getInstance();
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