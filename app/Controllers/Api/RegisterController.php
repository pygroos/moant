<?php

namespace App\Controllers;

use App\Models\Register_V1_0;
use App\Models\Register_V1_1;

/**
 * @SWG\Info(
 *   version="1.0.0",
 *   title="Example of using references in swagger-php",
 * )
 */
class RegisterController extends Controller
{
    /**
     * @SWG\Post(
     *     path="/api/path",
     *     summary="Post to URL",
     *     @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          required=true,
     *          @SWG\Schema(
     *              @SWG\Property(
     *                  property="name",
     *                  type="string",
     *                  maximum=64
     *              ),
     *              @SWG\Property(
     *                  property="description",
     *                  type="string"
     *              )
     *          )
     *     ),
     *     @SWG\Response(
     *          response=200,
     *          description="Example extended response",
     *          ref="$/responses/Json",
     *          @SWG\Schema(
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Product"
     *              )
     *          )
     *     ),
     *     security={{"Bearer":{}}}
     * )
     */
    public function action()
    {

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