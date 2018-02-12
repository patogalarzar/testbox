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

Route::get('/emails/all', 'Api\EmailController@index');
Route::post('/emails/send', 'Api\EmailController@sendEmail');
Route::delete('/emails/destroy/{id}', 'Api\EmailController@destroy');
