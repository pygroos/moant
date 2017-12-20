<?php

namespace App\Controllers;

use App\Models\Register_V1_0;
use App\Models\Register_V1_1;

class RegisterController extends Controller
{
    public function action()
    {
        $email = $this->request->getParam('email', '');
        $username = $this->request->getParam('username', '');
        $password = $this->request->getParam('password', '');

        $this->getInstanceByVersion()->store($email, $username, $password);
    }

    private function getInstanceByVersion()
    {
        $ret = null;

        if (0 == strcmp('1.1', $this->version))
        {
            $ret = Register_V1_1::getInstance();
        }
        else
        {
            $ret = Register_V1_0::getInstance();
        }

        return $ret;
    }

}