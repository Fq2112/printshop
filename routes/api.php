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

    Route::get('snap', [
        'uses' => 'MidtransController@snap',
        'as' => 'get.midtrans.snap'
    ]);

    Route::group(['prefix' => 'callback'], function () {

        Route::get('finish', [
            'uses' => 'MidtransController@finishCallback',
            'as' => 'get.midtrans-callback.finish'
        ]);

        Route::get('unfinish', [
            'uses' => 'MidtransController@unfinishCallback',
            'as' => 'get.midtrans-callback.unfinish'
        ]);

        Route::post('update/payment', [
            'uses' => 'MidtransController@updatePayment',
            'as' => 'asasakaskaskaskask'
        ]);
    });

});
