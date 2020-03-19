<?php

Route::group(['namespace' => 'Auth', 'prefix' => 'scott.royce'], function () {

    Route::get('/', [
        'uses' => 'AdminController@index',
        'as' => 'admin.dashboard'
    ]);

});
