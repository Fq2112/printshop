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

        Route::get('/', [
            'uses' => 'MainController@beranda',
            'as' => 'beranda'
        ]);

        Route::get('{produk}', [
            'uses' => 'MainController@produk',
            'as' => 'produk'
        ]);

        Route::get('cari/nama', [
            'uses' => 'MainController@cariNamaProduk',
            'as' => 'get.cari-nama.produk'
        ]);

        Route::group(['prefix' => 'info'], function () {

            Route::get(__('routes.pro'), [
                'uses' => 'MainController@pro',
                'as' => 'pro'
            ]);

            Route::get(__('routes.how-to'), [
                'uses' => 'MainController@caraPemesanan',
                'as' => 'cara-pemesanan'
            ]);

            Route::get(__('routes.faq'), [
                'uses' => 'MainController@faq',
                'as' => 'faq'
            ]);

            Route::get(__('routes.about'), [
                'uses' => 'MainController@tentang',
                'as' => 'tentang'
            ]);

            Route::get(__('routes.contact'), [
                'uses' => 'MainController@kontak',
                'as' => 'kontak'
            ]);

            Route::get(__('routes.tnc'), [
                'uses' => 'MainController@syaratKetentuan',
                'as' => 'syarat-ketentuan'
            ]);

            Route::get(__('routes.pp'), [
                'uses' => 'MainController@kebijakanPrivasi',
                'as' => 'kebijakan-privasi'
            ]);

        });

    });

});
