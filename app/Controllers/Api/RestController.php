<?php

namespace App\Controllers;

/**
 * @SWG\Info(
 *   version="1.0.0",
 *   title="Example of using references in swagger-php",
 * )
 */
class RestController extends Controller
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
    public function get()
    {

    }
}