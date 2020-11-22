<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * products api v1
 */

Route::prefix('v1')->group(function () {
    Route::apiResource('/products', 'Api\v1\ProductController')->names('v1_products')->only('index');

    Route::namespace('api\v1')->group(function() {
        Route::post('register', 'AuthController@register')->name('v1_register');
        Route::post('token', 'AuthController@token')->name('v1_token');
    });

    Route::middleware('auth:sanctum')->get('/name', function (Request $request) {
        return response()->json(['name' => $request->user()->name]);
    })->name('v1_get_name');

});

/**
 * products api v2
 */
Route::prefix('v2')->group(function () {

    Route::prefix('auth')->group(function () {
        Route::post('/register', 'api\v2\Auth\RegisterController@register')->name('v2_register');
        Route::post('/login', 'api\v2\Auth\LoginController@login')->name('v2_login');
        Route::get('/logout', 'api\v2\Auth\LogoutController@logout')->name('v2_logout');
    });



    /**
     * Only authenticated /// 4|Z0PIcwuy9hnkhGYrbf1MR0m3DHLvAiJGSLJSmmRt
     */

    Route::middleware('auth:sanctum')->group(function() {

        Route::apiResource('/products', 'api\v2\ProductController')->names('v2_products');
    });



});
