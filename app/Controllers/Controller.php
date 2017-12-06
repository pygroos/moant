<?php

namespace App\Controllers;

use Slim\Http\Response;

class Controller
{
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