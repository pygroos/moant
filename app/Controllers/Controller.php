<?php

namespace App\Controllers;

use App\Traits\VersionTrait;
use Interop\Container\ContainerInterface;

class Controller
{
    use VersionTrait;

    protected $c;
    protected $request;
    protected $response;
    protected $version;

    public function __construct(ContainerInterface $ci)
    {
        $this->c = $ci;
        $this->request = $this->c->get('request');
        $this->response = $this->c->get('response');
        $this->version = $this->getVersionForHeader();
    }

    public function outPut($code, $message = '', $data = [], $version = '1.0')
    {
        return $this->response->withJson(
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