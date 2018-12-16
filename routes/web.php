<?php

/*
|--------------------------------------------------------------------------
| Bo Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "bo" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'Web'], function() {
    Route::get('/login', 'LoginController@login')->name("login");
    Route::post('/login/access', 'LoginController@access')->name("login_access");
    Route::get('/logout', 'LoginController@logout')->name("logout");

    Route::group(['middleware' => 'loginCheck'], function() {
        Route::get('/', 'UserController@list');
        Route::group(['prefix' => 'user'], function() {
            Route::get('list',              'UserController@list')->name("web_user_list");
            Route::get('list/level',              'UserController@level')->name("web_user_level");
            Route::get('{id}/detail',      'UserController@detail')->name("web_user_detail");
            Route::get('brokerages',              'UserController@brokerages')->name("web_user_brokerages");
            Route::get('wallet',              'UserController@wallet')->name("web_user_wallet");
            Route::get('pay',              'UserController@pay')->name("web_user_pay");
            Route::get('cashout',              'UserController@cashout')->name("web_user_cashout");
            Route::get('data',              'UserController@data')->name("web_user_data");
        });

        Route::group(['prefix' => 'task'], function() {
            Route::get('list',              'TaskController@list')->name("web_task_list");
            Route::get('create',              'TaskController@create')->name("web_task_create");
            Route::get('list/edit',              'TaskController@edit')->name("web_task_edit");
            Route::get('join',              'TaskController@join')->name("web_task_join");
            Route::get('{id}/detail',      'TaskController@detail')->name("web_task_detail");
        });

        Route::group(['prefix' => 'news'], function() {
            Route::get('list',              'NewsController@list')->name("web_news_list");
            Route::get('create',              'NewsController@create')->name("web_news_create");
            Route::get('{id}/detail',      'NewsController@detail')->name("web_news_detail");
        });

        Route::group(['prefix' => 'banner'], function() {
            Route::get('list',              'BannerController@list')->name("web_banner_list");
            Route::get('create',              'BannerController@create')->name("web_banner_create");
            Route::get('{id}/detail',      'BannerController@detail')->name("web_banner_detail");
        });

        Route::group(['prefix' => 'admin'], function() {
            Route::get('list',              'AdminController@list')->name("web_admin_list");
            Route::get('role',              'AdminController@role')->name("web_admin_role");
            Route::get('role_create',              'AdminController@createRole')->name("web_admin_createRole");
            Route::get('create',              'AdminController@create')->name("web_admin_create");
        });

        Route::group(['prefix' => 'system'], function() {
            Route::get('basis',              'SystemController@basis')->name("web_system_list");
            Route::get('parameter',              'SystemController@parameter')->name("web_system_parameter");
            Route::get('member',              'SystemController@member')->name("web_system_member");
            Route::get('task',              'SystemController@task')->name("web_system_task");
            Route::get('limit',              'SystemController@limit')->name("web_system_limit");
            Route::get('code',              'SystemController@code')->name("web_system_code");
            Route::get('protocol',              'SystemController@protocol')->name("web_system_protocol");
            Route::get('{id}/detail',      'SystemController@detail')->name("web_system_detail");
        });
    });
});
