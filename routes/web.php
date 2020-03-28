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

            Route::get('pro', [
                'uses' => 'InfoController@pro',
                'as' => 'pro'
            ]);

            Route::get('cara-pemesanan', [
                'uses' => 'InfoController@caraPemesanan',
                'as' => 'cara-pemesanan'
            ]);

            Route::get('faq', [
                'uses' => 'InfoController@faq',
                'as' => 'faq'
            ]);

            Route::get('tentang', [
                'uses' => 'InfoController@tentang',
                'as' => 'tentang'
            ]);

            Route::get('kontak', [
                'uses' => 'InfoController@kontak',
                'as' => 'kontak'
            ]);

            Route::post('kontak/kirim', [
                'uses' => 'InfoController@kirimKontak',
                'as' => 'kirim.kontak'
            ]);

            Route::get('syarat-ketentuan', [
                'uses' => 'InfoController@syaratKetentuan',
                'as' => 'syarat-ketentuan'
            ]);

            Route::get('kebijakan-privasi', [
                'uses' => 'InfoController@kebijakanPrivasi',
                'as' => 'kebijakan-privasi'
            ]);

            Route::group(['prefix' => 'blog'], function () {

                Route::get('/', [
                    'uses' => 'BlogController@blog',
                    'as' => 'blog'
                ]);

                Route::get('data', [
                    'uses' => 'BlogController@getDataBlog',
                    'as' => 'get.data.blog'
                ]);

                Route::get('cari/judul', [
                    'uses' => 'BlogController@cariJudulBlog',
                    'as' => 'get.cari-judul.blog'
                ]);

                Route::get('{author}/{y?}/{m?}/{d?}/{title?}', [
                    'uses' => 'BlogController@detailBlog',
                    'as' => 'detail.blog'
                ]);

            });

        });

        Route::group(['namespace' => 'Users', 'prefix' => 'akun', 'middleware' => ['auth', 'user']], function () {

            Route::get('dashboard', [
                'uses' => 'UserController@dashboard',
                'as' => 'user.dashboard'
            ]);

            Route::get('sunting-profil', [
                'uses' => 'AkunController@profil',
                'as' => 'user.profil'
            ]);

            Route::put('sunting-profil/update', [
                'uses' => 'AkunController@updateProfil',
                'as' => 'user.update.profil'
            ]);

            Route::get('pengaturan', [
                'uses' => 'AkunController@pengaturan',
                'as' => 'user.pengaturan'
            ]);

            Route::put('pengaturan/update', [
                'uses' => 'AkunController@updatePengaturan',
                'as' => 'user.update.pengaturan'
            ]);

        });

    });

});
