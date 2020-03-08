<?php

/*
 * routing utama
 * */

Route::group(['namespace' => 'Pages', 'prefix' => '{lang?}', 'middleware' => 'locale'], function () {

    Route::get('/', [
        'uses' => 'MainController@beranda',
        'as' => 'beranda'
    ]);

    Route::get('info', [
        'uses' => 'UserController@info',
        'as' => 'info'
    ]);

    Route::post('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.request');
    Route::post('password/reset', 'Auth\ResetPasswordController@postReset')->name('password.reset');

    Auth::routes();

    Route::group(['namespace' => 'Auth', 'prefix' => 'account'], function () {

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

});
