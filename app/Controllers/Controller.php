<?php

namespace App\Controllers;

use Slim\Http\Response;
use App\Traits\VersionTrait;

class Controller
{
    use VersionTrait;

    protected $version;

    public function __construct()
    {
        $this->version = $this->getVersionForHeader();
    }

    public function outPut($code, $message = '', $data = [], $version = '1.0')
    {
        $response = new Response();
        return $response->withJson(
            [
                'code'    => $code,
                'message' => $message,
                'data'    => $data,
                'version' => $version,
                'runtime' => intval((microtime(true) - SERVICE_START) * 1000),
            ]
        );
    }
}