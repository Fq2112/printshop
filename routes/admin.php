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

            Route::group(['prefix' => 'balance'], function () {

                Route::get('/main', [
                    'uses' => 'BalanceController@show_data',
                    'as' => 'table.balance'
                ]);

                Route::get('edit/{id}', [
                    'uses' => 'BalanceController@edit_data',
                    'as' => 'edit.balance.posts'
                ]);

                Route::post('create', [
                    'uses' => 'BalanceController@create_data',
                    'as' => 'create.balance'
                ]);

                Route::put('update', [
                    'uses' => 'BalanceController@update_data',
                    'as' => 'update.balance'
                ]);

                Route::get('{id}/delete', [
                    'uses' => 'BalanceController@delete_data',
                    'as' => 'delete.balance'
                ]);
            });

            Route::group(['prefix' => 'colors'], function () {

                Route::get('/main', [
                    'uses' => 'ColorsController@show_data',
                    'as' => 'table.colors'
                ]);

                Route::get('edit/{id}', [
                    'uses' => 'ColorsController@edit_data',
                    'as' => 'edit.colors.posts'
                ]);

                Route::post('create', [
                    'uses' => 'ColorsController@create_data',
                    'as' => 'create.colors'
                ]);

                Route::put('update', [
                    'uses' => 'ColorsController@update_data',
                    'as' => 'update.colors'
                ]);

                Route::get('{id}/delete', [
                    'uses' => 'ColorsController@delete_data',
                    'as' => 'delete.colors'
                ]);
            });

            Route::group(['prefix' => 'copies'], function () {

                Route::get('/main', [
                    'uses' => 'CopiesController@show_data',
                    'as' => 'table.copies'
                ]);

                Route::get('edit/{id}', [
                    'uses' => 'CopiesController@edit_data',
                    'as' => 'edit.copies.posts'
                ]);

                Route::post('create', [
                    'uses' => 'CopiesController@create_data',
                    'as' => 'create.copies'
                ]);

                Route::put('update', [
                    'uses' => 'CopiesController@update_data',
                    'as' => 'update.copies'
                ]);

                Route::get('{id}/delete', [
                    'uses' => 'CopiesController@delete_data',
                    'as' => 'delete.copies'
                ]);
            });

            Route::group(['prefix' => 'edge'], function () {

                Route::get('/main', [
                    'uses' => 'EdgesController@show_data',
                    'as' => 'table.edge'
                ]);

                Route::get('edit/{id}', [
                    'uses' => 'EdgesController@edit_data',
                    'as' => 'edit.edge.posts'
                ]);

                Route::post('create', [
                    'uses' => 'EdgesController@create_data',
                    'as' => 'create.edge'
                ]);

                Route::put('update', [
                    'uses' => 'EdgesController@update_data',
                    'as' => 'update.edge'
                ]);

                Route::get('{id}/delete', [
                    'uses' => 'EdgesController@delete_data',
                    'as' => 'delete.edge'
                ]);
            });

            Route::group(['prefix' => 'finishing'], function () {

                Route::get('/main', [
                    'uses' => 'FinishingController@show_data',
                    'as' => 'table.finishing'
                ]);

                Route::get('edit/{id}', [
                    'uses' => 'FinishingController@edit_data',
                    'as' => 'edit.finishing.posts'
                ]);

                Route::post('create', [
                    'uses' => 'FinishingController@create_data',
                    'as' => 'create.finishing'
                ]);

                Route::put('update', [
                    'uses' => 'FinishingController@update_data',
                    'as' => 'update.finishing'
                ]);

                Route::get('{id}/delete', [
                    'uses' => 'FinishingController@delete_data',
                    'as' => 'delete.finishing'
                ]);
            });

            Route::group(['prefix' => 'folding'], function () {

                Route::get('/main', [
                    'uses' => 'FoldingController@show_data',
                    'as' => 'table.folding'
                ]);

                Route::get('edit/{id}', [
                    'uses' => 'FoldingController@edit_data',
                    'as' => 'edit.folding.posts'
                ]);

                Route::post('create', [
                    'uses' => 'FoldingController@create_data',
                    'as' => 'create.folding'
                ]);

                Route::put('update', [
                    'uses' => 'FoldingController@update_data',
                    'as' => 'update.folding'
                ]);

                Route::get('{id}/delete', [
                    'uses' => 'FoldingController@delete_data',
                    'as' => 'delete.folding'
                ]);
            });

            Route::group(['prefix' => 'front'], function () {

                Route::get('/main', [
                    'uses' => 'FrontSideController@show_data',
                    'as' => 'table.front'
                ]);

                Route::get('edit/{id}', [
                    'uses' => 'FrontSideController@edit_data',
                    'as' => 'edit.front.posts'
                ]);

                Route::post('create', [
                    'uses' => 'FrontSideController@create_data',
                    'as' => 'create.front'
                ]);

                Route::put('update', [
                    'uses' => 'FrontSideController@update_data',
                    'as' => 'update.front'
                ]);

                Route::get('{id}/delete', [
                    'uses' => 'FrontSideController@delete_data',
                    'as' => 'delete.front'
                ]);
            });

            Route::group(['prefix' => 'lamination'], function () {

                Route::get('/main', [
                    'uses' => 'LaminationsController@show_data',
                    'as' => 'table.lamination'
                ]);

                Route::get('edit/{id}', [
                    'uses' => 'LaminationsController@edit_data',
                    'as' => 'edit.lamination.posts'
                ]);

                Route::post('create', [
                    'uses' => 'LaminationsController@create_data',
                    'as' => 'create.lamination'
                ]);

                Route::put('update', [
                    'uses' => 'LaminationsController@update_data',
                    'as' => 'update.lamination'
                ]);

                Route::get('{id}/delete', [
                    'uses' => 'LaminationsController@delete_data',
                    'as' => 'delete.lamination'
                ]);
            });

            Route::group(['prefix' => 'lid'], function () {

                Route::get('/main', [
                    'uses' => 'LidController@show_data',
                    'as' => 'table.lid'
                ]);

                Route::get('edit/{id}', [
                    'uses' => 'LidController@edit_data',
                    'as' => 'edit.lid.posts'
                ]);

                Route::post('create', [
                    'uses' => 'LidController@create_data',
                    'as' => 'create.lid'
                ]);

                Route::put('update', [
                    'uses' => 'LidController@update_data',
                    'as' => 'update.lid'
                ]);

                Route::get('{id}/delete', [
                    'uses' => 'LidController@delete_data',
                    'as' => 'delete.lid'
                ]);
            });

            Route::group(['prefix' => 'material'], function () {

                Route::get('/main', [
                    'uses' => 'MaterialsController@show_data',
                    'as' => 'table.material'
                ]);

                Route::get('edit/{id}', [
                    'uses' => 'MaterialsController@edit_data',
                    'as' => 'edit.material.posts'
                ]);

                Route::post('create', [
                    'uses' => 'MaterialsController@create_data',
                    'as' => 'create.material'
                ]);

                Route::put('update', [
                    'uses' => 'MaterialsController@update_data',
                    'as' => 'update.material'
                ]);

                Route::get('{id}/delete', [
                    'uses' => 'MaterialsController@delete_data',
                    'as' => 'delete.material'
                ]);
            });

            Route::group(['prefix' => 'pages'], function () {

                Route::get('/main', [
                    'uses' => 'PagesController@show_data',
                    'as' => 'table.pages'
                ]);

                Route::get('edit/{id}', [
                    'uses' => 'PagesController@edit_data',
                    'as' => 'edit.pages.posts'
                ]);

                Route::post('create', [
                    'uses' => 'PagesController@create_data',
                    'as' => 'create.pages'
                ]);

                Route::put('update', [
                    'uses' => 'PagesController@update_data',
                    'as' => 'update.pages'
                ]);

                Route::get('{id}/delete', [
                    'uses' => 'PagesController@delete_data',
                    'as' => 'delete.pages'
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
