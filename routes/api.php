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

Route::prefix('v1')->middleware('check.request')->namespace('Api\v1')->group(function() {
    Route::resource('products','ProductsController');
    Route::prefix('user')->group(function() {
        Route::post('login', 'AuthController@login');
        Route::post('register', 'UsersController@store');
    });
    Route::middleware('auth:api')->group(function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
        Route::patch('user' ,'UsersController@update');
        Route::delete('user' ,'UsersController@destroy');
    });
});