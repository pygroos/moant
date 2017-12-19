<?php

namespace App\Controllers;

use App\Models\Register_V1_0;
use App\Models\Register_V1_1;

// ./vendor/bin/swagger app/Controllers/Api/ -o document/v1.0
/**
 * @SWG\Info(
 *   version="1.0",
 *   title="Example of using references in swagger-php",
 * )
 */
class RegisterController extends Controller
{
    /**
     * @SWG\Post(
     *     path="/users",
     *     summary="用户注册",
     *     @SWG\Parameter(
     *          name="email, username, password",
     *          in="body",
     *          required=true,
     *          @SWG\Schema(
     *              @SWG\Property(
     *                  property="email",
     *                  type="string",
     *                  maximum=64
     *              ),
     *              @SWG\Property(
     *                  property="username",
     *                  type="string",
     *                  maximum=12
     *              ),
     *              @SWG\Property(
     *                  property="password",
     *                  type="string",
     *                  maximum=64
     *              )
     *          )
     *     ),
     *     @SWG\Response(
     *          response=200,
     *          description="注册成功",
     *     ),
     *     security={{"Bearer":{}}}
     * )
     */
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