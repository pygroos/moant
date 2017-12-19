<?php

namespace App\Models;

class Register_V1_0 extends Model
{
    public function store($email, $username, $password)
    {
        var_dump($email, $username, $password);
    }

    public function verify()
    {

    }
}
