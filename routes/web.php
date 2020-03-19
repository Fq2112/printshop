<?php

/*
 * routing utama
 * */

Route::group(['namespace' => 'Pages', 'prefix' => '{lang?}', 'middleware' => 'locale'], function () {

    Route::get('{produk}', [
        'uses' => 'MainController@produk',
        'as' => 'produk'
    ]);

    Route::get('/', [
        'uses' => 'MainController@beranda',
        'as' => 'beranda'
    ]);

    Route::get('info', [
        'uses' => 'UserController@info',
        'as' => 'info'
    ]);

    Route::post(__('route.password') . '/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.request');
    Route::post(__('route.password') . '/reset', 'Auth\ResetPasswordController@postReset')->name('password.reset');

    Auth::routes();

    Route::group(['namespace' => 'Auth', 'prefix' => __('route.account')], function () {

        Route::get('cek/{username}', [
            'uses' => 'Auth\RegisterController@cekUsername',
            'as' => 'cek.username'
        ]);

        Route::post(__('route.login'), [
            'uses' => 'LoginController@login',
            'as' => 'login'
        ]);

        Route::post(__('route.logout'), [
            'uses' => 'LoginController@logout',
            'as' => 'logout'
        ]);

        Route::get(__('route.activate'), [
            'uses' => 'ActivationController@activate',
            'as' => 'activate'
        ]);

        Route::get(__('route.login') . '/{provider}', [
            'uses' => 'SocialAuthController@redirectToProvider',
            'as' => 'redirect'
        ]);

        Route::get(__('route.login') . '/{provider}/callback', [
            'uses' => 'SocialAuthController@handleProviderCallback',
            'as' => 'callback'
        ]);

    });

});
