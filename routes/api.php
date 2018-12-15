<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
    Route::group(['namespace' => 'Api'], function() {

        Route::group(['prefix' => 'user'], function() {
            Route::get('list',              'UserController@list');
            Route::get('{id}/detail',      'UserController@detail');
            Route::get('brokerages',              'UserController@brokerages');
            Route::get('wallet',              'UserController@wallet');
            Route::get('pay',              'UserController@pay');
            Route::get('cashout',              'UserController@cashout');
            Route::get('data',              'UserController@data');
            Route::post('update',              'UserController@update');
            Route::delete('delete',              'UserController@delete');
            Route::post('deal',              'UserController@deal');
            Route::get('levelList',              'UserController@levelList');
            Route::get('callAlipay',              'UserController@callAlipay');
            Route::post('addFaker',              'UserController@addVirtualUser');
        });

        Route::group(['prefix' => 'task'], function() {
            Route::get('list',              'TaskController@list');
            Route::get('user',      'TaskController@user');
            Route::get('detail',      'TaskController@detail');
            Route::delete('/',              'TaskController@delete');
            Route::post('/',      'TaskController@create');
            Route::post('/modify',      'TaskController@modify');
            // Route::get('{id}/detail',      'TaskController@detail');
        });

        Route::group(['prefix' => 'news'], function() {
            Route::get('list',              'NewsController@list');
            Route::get('detail',      'NewsController@detail');
            Route::post('/',      'NewsController@create');
            Route::post('modify',      'NewsController@modify');
            Route::delete('/',      'NewsController@delete');

        });

        Route::group(['prefix' => 'banner'], function() {
            Route::get('list',              'BannerController@list');
            Route::get('detail',      'BannerController@detail');
            Route::post('/',      'BannerController@create');
            Route::post('/modify',      'BannerController@modify');
            Route::delete('/',      'BannerController@delete');
        });

        Route::group(['prefix' => 'admin'], function() {
            Route::get('list',              'AdminController@list');
            Route::get('detail',      'BannerController@detail');
            Route::get('menu',              'AdminController@menu');
            Route::get('role',              'AdminController@role');
            Route::post('addRole',              'AdminController@addRole');
            Route::post('addAdmin',              'AdminController@addAdmin');
            Route::post('delRole',      'AdminController@delRole');
            Route::post('delAdmin',      'AdminController@delAdmin');
            Route::post('update',      'AdminController@updateAdmin');
            Route::post('updateRole',      'AdminController@updateRole');

        });

        Route::group(['prefix' => 'system'], function() {
            Route::get('list',              'SystemController@list');
            Route::get('{id}/detail',      'SystemController@detail');
        });

    }); 
