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

Route::group(['namespace' => 'Pages'], function () {

    Route::get('/', [
        'uses' => 'MainController@beranda',
        'as' => 'beranda'
    ]);

    Route::group(['prefix' => '{produk}'], function () {

        Route::get('/', [
            'uses' => 'MainController@produk',
            'as' => 'produk'
        ]);

        Route::get('guidelines/{file}/download', [
            'uses' => 'MainController@downloadGuidelines',
            'as' => 'produk.download.guideline'
        ]);

        Route::post('order/submit', [
            'middleware' => ['auth', 'user'],
            'uses' => 'MainController@submitPemesanan',
            'as' => 'produk.submit.pemesanan'
        ]);

        Route::put('order/{id}/update', [
            'middleware' => ['auth', 'user'],
            'uses' => 'MainController@updatePemesanan',
            'as' => 'produk.update.pemesanan'
        ]);

        Route::get('order/{id}/delete', [
            'middleware' => ['auth', 'user'],
            'uses' => 'MainController@deletePemesanan',
            'as' => 'produk.delete.pemesanan'
        ]);

    });

    Route::get('cari/nama', [
        'uses' => 'MainController@cariNamaProduk',
        'as' => 'get.cari-nama.produk'
    ]);

    Route::get('cari/pengiriman', [
        'uses' => 'MainController@cekPengirimanProduk',
        'as' => 'get.cari-pengiriman.produk'
    ]);

    Route::group(['prefix' => 'info'], function () {

        Route::get('pro', [
            'middleware' => '503',
            'uses' => 'InfoController@pro',
            'as' => 'pro'
        ]);

        Route::get('how-to', [
            'uses' => 'InfoController@caraPemesanan',
            'as' => 'cara-pemesanan'
        ]);

        Route::get('faq', [
            'uses' => 'InfoController@faq',
            'as' => 'faq'
        ]);

        Route::get('about-us', [
            'uses' => 'InfoController@tentang',
            'as' => 'tentang'
        ]);

        Route::get('contact', [
            'uses' => 'InfoController@kontak',
            'as' => 'kontak'
        ]);

        Route::post('contact/submit', [
            'uses' => 'InfoController@kirimKontak',
            'as' => 'kirim.kontak'
        ]);

        Route::get('terms-conditions', [
            'uses' => 'InfoController@syaratKetentuan',
            'as' => 'syarat-ketentuan'
        ]);

        Route::get('privacy-policy', [
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

    Route::group(['namespace' => 'Users', 'prefix' => 'account', 'middleware' => ['auth', 'user']], function () {

        Route::group(['prefix' => 'cart'], function () {

            Route::get('/', [
                'uses' => 'UserController@cart',
                'as' => 'user.cart',
            ]);

            Route::get('edit/{id}/design', [
                'uses' => 'UserController@editDesign',
                'as' => 'user.edit-design.cart',
            ]);

            Route::put('update/{id}/order', [
                'uses' => 'UserController@updateOrder',
                'as' => 'user.update-order.cart',
            ]);

            Route::get('delete/{id}/note', [
                'uses' => 'UserController@deleteNote',
                'as' => 'user.delete-note.cart',
            ]);

            Route::get('cari/promo', [
                'uses' => 'UserController@cariPromo',
                'as' => 'get.cari-promo.cart'
            ]);

            Route::post('checkout', [
                'uses' => 'UserController@checkout',
                'as' => 'user.checkout.cart',
            ]);

        });

        Route::group(['prefix' => 'dashboard'], function () {

            Route::get('/', [
                'uses' => 'UserController@dashboard',
                'as' => 'user.dashboard'
            ]);

            Route::get('download/{id}/{file}', [
                'uses' => 'UserController@downloadFile',
                'as' => 'user.download.file'
            ]);

            Route::get('{code}/received', [
                'uses' => 'UserController@received',
                'as' => 'user.received'
            ]);

            Route::get('{code}/reorder', [
                'uses' => 'UserController@reorder',
                'as' => 'user.reorder'
            ]);

        });

        Route::get('edit-profile', [
            'uses' => 'AkunController@profil',
            'as' => 'user.profil'
        ]);

        Route::put('edit-profile/update', [
            'uses' => 'AkunController@updateProfil',
            'as' => 'user.update.profil'
        ]);

        Route::post('edit-profile/address/create', [
            'uses' => 'AkunController@createProfilAddress',
            'as' => 'user.profil-alamat.create'
        ]);

        Route::put('edit-profile/address/{id}/update', [
            'uses' => 'AkunController@updateProfilAddress',
            'as' => 'user.profil-alamat.update'
        ]);

        Route::get('edit-profile/address/{id}/delete', [
            'uses' => 'AkunController@deleteProfilAddress',
            'as' => 'user.profil-alamat.delete'
        ]);

        Route::get('settings', [
            'uses' => 'AkunController@pengaturan',
            'as' => 'user.pengaturan'
        ]);

        Route::put('settings/update', [
            'uses' => 'AkunController@updatePengaturan',
            'as' => 'user.update.pengaturan'
        ]);

    });

});
