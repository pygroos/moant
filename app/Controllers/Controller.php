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

        if ($this->getVersionForHeader())
        {
            $this->version = $this->getVersionForHeader();
        }
        else
        {
            $this->version = $this->request->getParam('v') ? $this->request->getParam('v') : '1.0';
        }
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