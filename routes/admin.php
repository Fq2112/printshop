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

        Route::group(['prefix' => 'categories'], function () {

            Route::get('/main', [
                'uses' => 'CategoryController@show_main',
                'as' => 'table.categories.main'
            ]);

            Route::get('edit/{id}', [
                'uses' => 'CategoryController@editCategory',
                'as' => 'edit.categories.posts'
            ]);

            Route::post('create', [
                'uses' => 'CategoryController@createCategory',
                'as' => 'create.categories'
            ]);

            Route::put('update', [
                'uses' => 'CategoryController@updateCategory',
                'as' => 'update.categories'
            ]);

            Route::get('{id}/delete', [
                'uses' => 'CategoryController@deleteCategory',
                'as' => 'delete.categories'
            ]);

            Route::get('/sub', [
                'uses' => 'CategoryController@show_subkategori',
                'as' => 'table.categories.subkat'
            ]);

            Route::get('edit/sub/{id}', [
                'uses' => 'CategoryController@editSubCategory',
                'as' => 'edit.categories.sub.posts'
            ]);

        });

        Route::group(['prefix' => 'spec', 'namespace' => 'Spec'], function () {

            Route::group(['prefix' => 'backside'], function () {

                Route::get('/main', [
                    'uses' => 'BackSideController@show_data',
                    'as' => 'table.backside'
                ]);

                Route::get('edit/{id}', [
                    'uses' => 'BackSideController@edit_data',
                    'as' => 'edit.backside.posts'
                ]);

                Route::post('create', [
                    'uses' => 'BackSideController@create_data',
                    'as' => 'create.backside'
                ]);

                Route::put('update', [
                    'uses' => 'BackSideController@update_data',
                    'as' => 'update.backside'
                ]);

                Route::get('{id}/delete', [
                    'uses' => 'BackSideController@delete_data',
                    'as' => 'delete.backside'
                ]);
            });
        });

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
