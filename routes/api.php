<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Api'], function () {

    Route::group(['namespace' => 'Auth'], function () {
        Route::post('register', 'RegisterController');
        Route::post('login', 'LoginController');
        Route::post('logout', 'LogoutController')->middleware('auth:api');
    });

    Route::group(['namespace' => 'MyController'], function () {
        Route::get('index', 'HomeController@index')->middleware(['auth:api']);
        Route::post('addGroup', 'HomeController@addGroup')->middleware(['auth:api']);
        Route::post('addNewContact', 'HomeController@addContact')->middleware(['auth:api']);
    });
});
