<?php

/*
 * routing utama
 * */

Auth::routes();

Route::group(['namespace' => 'Auth', 'prefix' => 'auth'], function () {

    Route::get('cek-username', [
        'uses' => 'RegisterController@cekUsername',
        'as' => 'cek.username'
    ]);

    Route::get('password/reset', [
        'uses' => 'ResetPasswordController@showResetForm',
        'as' => 'password.request'
    ]);

    Route::post('password/reset/submit', [
        'uses' => 'ResetPasswordController@reset',
        'as' => 'password.reset'
    ]);

    Route::post('login', [
        'uses' => 'LoginController@login',
        'as' => 'login'
    ]);

    Route::post('logout', [
        'uses' => 'LoginController@logout',
        'as' => 'logout'
    ]);

    Route::get('activate', [
        'uses' => 'ActivationController@activate',
        'as' => 'activate'
    ]);

    Route::get('login/{provider}', [
        'uses' => 'SocialAuthController@redirectToProvider',
        'as' => 'redirect'
    ]);

    Route::get('login/{provider}/callback', [
        'uses' => 'SocialAuthController@handleProviderCallback',
        'as' => 'callback'
    ]);

});

Route::group(['prefix' => '{lang?}', 'middleware' => 'locale'], function () {

    Route::group(['namespace' => 'Pages'], function () {

        Route::get('{produk}', [
            'uses' => 'MainController@produk',
            'as' => 'produk'
        ]);

        Route::get('/', [
            'uses' => 'MainController@beranda',
            'as' => 'beranda'
        ]);

        Route::get(__('lang.footer.tnc'), [
            'uses' => 'MainController@syaratKetentuan',
            'as' => 'syarat-ketentuan'
        ]);

        Route::get(__('lang.footer.pp'), [
            'uses' => 'MainController@kebijakanPrivasi',
            'as' => 'kebijakan-privasi'
        ]);

    });

});
