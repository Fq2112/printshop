<?php

/*
 * routing admin
 * */

Route::redirect('/', 'dashboard');

Route::group(['namespace' => 'Pages\Admins'], function () {

    Route::get('dashboard', [
        'uses' => 'AdminController@dashboard',
        'as' => 'admin.dashboard'
    ]);

    Route::group(['prefix' => 'account'], function () {

        Route::get('profile', [
            'uses' => 'AdminController@profil',
            'as' => 'admin.profil'
        ]);

        Route::put('profile/update', [
            'uses' => 'AdminController@updateProfil',
            'as' => 'admin.update.profil'
        ]);

        Route::get('settings', [
            'uses' => 'AdminController@pengaturan',
            'as' => 'admin.pengaturan'
        ]);

        Route::put('settings/update', [
            'uses' => 'AdminController@updatePengaturan',
            'as' => 'admin.update.pengaturan'
        ]);

    });

    Route::group(['prefix' => 'inbox', 'middleware' => 'owner'], function () {

        Route::get('/', [
            'uses' => 'AdminController@showInbox',
            'as' => 'admin.inbox'
        ]);

        Route::post('compose', [
            'uses' => 'AdminController@composeInbox',
            'as' => 'admin.compose.inbox'
        ]);

        Route::get('{id}/delete', [
            'uses' => 'AdminController@deleteInbox',
            'as' => 'admin.delete.inbox'
        ]);

    });

    Route::group(['prefix' => 'invoice', 'middleware' => 'owner'], function () {

        Route::get('/', [
            'uses' => 'InvoiceController@index',
            'as' => 'admin.invoice'
        ]);

        Route::post('compose', [
            'uses' => 'InvoiceController@getDataInvoice',
            'as' => 'admin.invoice.data'
        ]);
//
////        Route::get('{id}/delete', [
////            'uses' => 'AdminController@deleteInbox',
////            'as' => 'admin.delete.inbox'
////        ]);

    });

    Route::group(['namespace' => 'DataMaster', 'prefix' => 'tables'], function () {

        Route::group(['prefix' => 'blog', 'middleware' => ['admin']], function () {

            Route::group(['prefix' => 'categories'], function () {

                Route::get('/', [
                    'uses' => 'BlogController@showBlogCategoriesTable',
                    'as' => 'table.blog.categories'
                ]);

                Route::post('create', [
                    'uses' => 'BlogController@createBlogCategories',
                    'as' => 'create.blog.categories'
                ]);

                Route::put('update', [
                    'uses' => 'BlogController@updateBlogCategories',
                    'as' => 'update.blog.categories'
                ]);

                Route::get('{id}/delete', [
                    'uses' => 'BlogController@deleteBlogCategories',
                    'as' => 'delete.blog.categories'
                ]);

                Route::post('deletes', [
                    'uses' => 'BlogController@massDeleteBlogCategories',
                    'as' => 'massDelete.blog.categories'
                ]);

            });

            Route::group(['prefix' => 'posts'], function () {

                Route::get('/', [
                    'uses' => 'BlogController@showBlogPostsTable',
                    'as' => 'table.blog.posts'
                ]);

                Route::post('create', [
                    'uses' => 'BlogController@createBlogPosts',
                    'as' => 'create.blog.posts'
                ]);

                Route::get('edit/{id}', [
                    'uses' => 'BlogController@editBlogPosts',
                    'as' => 'edit.blog.posts'
                ]);

                Route::get('galleries', [
                    'uses' => 'BlogController@getBlogGalleries',
                    'as' => 'get.blog.galleries'
                ]);

                Route::put('update', [
                    'uses' => 'BlogController@updateBlogPosts',
                    'as' => 'update.blog.posts'
                ]);

                Route::get('{id}/delete', [
                    'uses' => 'BlogController@deleteBlogPosts',
                    'as' => 'delete.blog.posts'
                ]);

                Route::post('deletes', [
                    'uses' => 'BlogController@massDeleteBlogPosts',
                    'as' => 'massDelete.blog.posts'
                ]);

                Route::group(['prefix' => '{blog_id}/galleries'], function () {

                    Route::get('/', [
                        'uses' => 'BlogController@showBlogGalleriesTable',
                        'as' => 'table.blog.galleries'
                    ]);

                    Route::put('update', [
                        'uses' => 'BlogController@updateBlogGalleries',
                        'as' => 'update.blog.galleries'
                    ]);

                    Route::get('{id}/delete', [
                        'uses' => 'BlogController@deleteBlogGalleries',
                        'as' => 'delete.blog.galleries'
                    ]);

                    Route::post('deletes', [
                        'uses' => 'BlogController@massDeleteBlogGalleries',
                        'as' => 'massDelete.blog.galleries'
                    ]);

                });

            });

        });

    });

});
