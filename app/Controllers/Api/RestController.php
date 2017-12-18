<?php

namespace App\Controllers;

class RestController extends Controller
{
    /**
     * @SWG\Info(
     *   version="1.0.0",
     *   title="Example of using references in swagger-php",
     * )
     *
     * @SWG\Definition(
     *   definition="ExampleDefinition",
     *   @SWG\Property(
     *      property="status",
     *      type="string",
     *      description="The status of a product",
     *      enum={"available", "discontinued"},
     *      default="available"
     *   )
     * )
     */
    public function get()
    {

    }
}