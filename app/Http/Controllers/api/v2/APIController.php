<?php

namespace App\Http\Controllers\api\v2;

use App\Http\Controllers\Controller;


/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="L5 OpenApi",
 *      description="L5 Swagger OpenApi test",
 *      @OA\Contact(
 *          email="123@123.com"
 *      ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 */

/**
 * @OA\Tag(
 *     name="products",
 *     description="Everything about your products",
 * )

 */

/**
 *  @OA\Server(
 *      url="http://192.168.99.100:8080/api/v2",
 *      description="API documentation"
 * )
 */

/**
 * @OA\SecurityScheme(
 *     type="apiKey",
 *     description="token",
 *     name="Authorization",
 *     in="header",
 *     securityScheme="Authorization",
 * )
 */

class APIController extends Controller
{
}
