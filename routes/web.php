<?php

/*
 * routing utama
 * */

Route::group(['namespace' => 'Pages', 'prefix' => '{lang?}', 'middleware' => 'locale'], function () {

    Route::get('/', [
        'uses' => 'MainController@beranda',
        'as' => 'beranda'
    ]);

});
