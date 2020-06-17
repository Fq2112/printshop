<?php

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

Route::group(['namespace' => 'API', 'prefix' => 'midtrans'], function () {

    Route::post('snap', [
        'uses' => 'MidtransController@snap',
        'as' => 'midtrans.snap'
    ]);

    Route::get('test', [
        'uses' => 'AcceptPaymentCallbackController@getCallback',
        'as' => 'admin.dashboard'
    ]);

});
