<?php

namespace App\Models;

class Register_V1_1 extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->setModelVersion('1.1');
    }

    public function store($email, $username, $password)
    {

    }

    public function verify()
    {

    }
}
