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
        Route::post('setlocale', 'LocaleController@setLocale');

        /* Location */
        Route::get('location', 'LocationController@list');
        Route::get('location/country', 'LocationController@countryList');

        Route::group(['prefix' => 'user'], function() {
            Route::get('{seq}/point',   'UserController@point');
        });
        
        Route::group(['prefix'  => 'seller'], function() {
            Route::get('list',                  'SellerController@list');
            Route::get('{seq}/detail',          'SellerController@detail');
            Route::get('{seq}/package',         'SellerController@package');
            Route::get('{seq}/record',          'SellerController@record');
            Route::get('{seq}/point',           'SellerController@point');
            Route::post('{seq}/activate',        'SellerController@activate');
        });

        Route::group(['prefix' => 'package'], function() {
            Route::post('',                     'PackageController@create');
            Route::get('list',                  'PackageController@list');
            Route::get('{seq}/detail',          'PackageController@detail');
            
            Route::get('{seq}/code',            'PackageController@code');
            Route::get('{seq}/distribution',    'PackageController@distribution');
            Route::get('{seq}/sales',           'PackageController@sales');
            Route::get('{seq}/sales/package',   'PackageController@salesPackage');
        });

        Route::group(['prefix' => 'code'], function() {
            Route::get('summary',               'CodeController@summary');
            Route::post('',                     'CodeController@create');
            Route::post('new-excel/download',   'CodeController@newExcelDownload');
            Route::post('exist-excel/download', 'CodeController@existExcelDownload');
            Route::get('exist-excel',           'CodeController@existExcelList');
        });
        
        /* Package Request */
        Route::group(['prefix' => 'request'], function() {
            Route::get('/inbound/list/{status}', 'Q35PkgRequestController@inRequestPkgList');
            Route::post('/inbound/confirm', 'Q35PkgRequestController@confirmInRequest');
            Route::post('/inbound/response', 'Q35PkgRequestController@responseInRequest');
            Route::get('/outbound/list/{partner}/{status}', 'Q35PkgRequestController@outRequestPkgList');
            Route::post('/outbound/available/quantity', 'Q35PkgRequestController@checkAvailabeQuantity');
            Route::post('/outbound/create', 'Q35PkgRequestController@createRequest');
            Route::post('/outbound/cancel', 'Q35PkgRequestController@cancelRequest');
            // Route::post('/outbound/response', 'Q35PkgRequestController@responseOutRequest');
        });

        //wood
        Route::group(['prefix' => 'partner-account'], function() {
            Route::get('',                      'PartnerAccountController@list');
            Route::get('{seq}/detail',          'PartnerAccountController@detail');
            Route::post('',                     'PartnerAccountController@create');
            Route::put('{seq}',                 'PartnerAccountController@update');
            Route::delete('{seq}',              'PartnerAccountController@delete');
            Route::post('excel-download',       'PartnerAccountController@excelDownload');
            Route::get('{seq}/sales-partner',   'PartnerAccountController@salesPartner');
            Route::post('check-id',             'PartnerAccountController@checkId');
            Route::get('sole-list',             'PartnerAccountController@soleList');
            Route::get('bank-list',             'PartnerAccountController@bankList');
            Route::post('add-sole',             'PartnerAccountController@addSole');
        });

        //wood
        Route::group(['prefix' => 'sales-partner'], function() {
            Route::get('category',              'SalesPartnerController@category');
            Route::get('',                      'SalesPartnerController@list');
            Route::get('{seq}/detail',          'SalesPartnerController@detail');
            Route::get('search',                'SalesPartnerController@search');
            Route::get('/package',              'SalesPartnerController@package');
            Route::get('{seq}/relation',        'SalesPartnerController@relation');
            Route::post('/active',              'SalesPartnerController@active');
            Route::get('/all_list',             'SalesPartnerController@allList');
            Route::get('/table_list',           'SalesPartnerController@tableList');
            Route::get('{seq}/record',          'SalesPartnerController@record');
            Route::get('{seq}/point',           'SalesPartnerController@point');
        });

        //wang
        Route::group(['prefix' => 'buyer'], function() {
            Route::get('',                  'BuyerController@list');
            Route::post('',                 'BuyerController@create');
            Route::put('{seq}',             'BuyerController@update');
            Route::delete('{seq}',          'BuyerController@delete');
            Route::get('{seq}/detail',      'BuyerController@detail');
            Route::get('{seq}/point',       'BuyerController@point');
            Route::post('check-id',         'BuyerController@checkId');
            Route::get('sales-partner',     'BuyerController@salesPartner');
            Route::post('excel-download',   'BuyerController@excelDownload');
            Route::get('bank-list',         'BuyerController@bankList');
            Route::get('category',          'BuyerController@category');
            Route::get('{seq}/account-list','BuyerController@accountlist');
            Route::get('ad/list',                  'BuyerController@adList');
            Route::get('ad/{seq}/adDetail',        'BuyerController@adDetail');
            Route::get('ad/list',                  'BuyerController@adList');
            Route::get('ad/{seq}/detail',          'BuyerController@adDetail');
            Route::post('ad/save',                 'BuyerController@adSave');

            Route::get('ad/allPackagelist/{seq}',  'BuyerController@allPackagelist');
            Route::patch('ad/status/{status}',     'BuyerController@statusAD');
            
            Route::post('ad/create',               'BuyerController@adCreate');
            Route::get('ad/package-list',          'BuyerController@packagelist');
            Route::get('ad/buyer',                 'BuyerController@buyerList');
            Route::post('ad/{seq}',                'BuyerController@modify');
            Route::get('gift/list',                'GiftController@list');
            Route::get('gift/buyer',               'GiftController@buyer');
            Route::get('gift/buyer/{seq}/detail',  'GiftController@buyerDetail');
            Route::get('gift/gift/{seq}/detail',   'GiftController@giftDetail');
            Route::post('gift',                    'GiftController@create');
            Route::post('gift/{seq}',              'GiftController@modify');

            Route::get('event/list',                 'BuyerController@eventList');
            Route::post('event/create',              'BuyerController@eventCreate');
            Route::get('event/giftList',             'BuyerController@giftList');
            Route::get('event/{seq}/detail',         'BuyerController@eventDetail');
            Route::patch('event/status/{status}',    'BuyerController@statusEvent');
            Route::get('event/allPackagelist/{seq}', 'BuyerController@allPackagelistEvent');
            Route::get('event/{seq}/coupon',         'BuyerController@couponList');
            Route::get('event/package-list',         'BuyerController@packagelist');
            Route::post('event/{seq}',               'BuyerController@updateEvent');

            Route::get('stamp/list',               'BuyerController@stampList');
            Route::get('stamp/{seq}/setting',      'BuyerController@setting');
            Route::get('stamp/{seq}/coupon',       'BuyerController@coupon');
            Route::get('stamp/{seq}/save',         'BuyerController@settingSave');
            Route::get('stamp/{seq}/user',         'BuyerController@user');
            Route::get('stamp/{seq}/used/{buyer}',             'BuyerController@used');
            Route::patch('stamp/{seq}/status/{status}',        'BuyerController@status');
            Route::get('stamp/{buyer}/record/',                'BuyerController@record');
            Route::get('stamp/{seq}/detail/{buyer}',           'BuyerController@userdetail');
            Route::get('stamp/{seq}/giftList',                 'BuyerController@gift_list');

        });

        //Sales
        Route::group(['prefix' => 'sales'], function() {
            Route::get('hq-shipping/list',             'SalesController@shippingItemList');
            Route::get('hq-shipping/packagelist/{seq}',      'SalesController@pkgList');
            Route::post('hq-shipping/{seq}',      'SalesController@shippingModify');
            Route::patch('hq-shipping/status/{status}',      'SalesController@shippingStatus');
            // Route::get('/list/{status}', 'SalesController@salesList');
            // Route::post('/distribution/list', 'SalesController@distributionList');
            // Route::post('/create', 'SalesController@create');
            // Route::post('/modify', 'SalesController@modify');
            // Route::post('/pay', 'SalesController@pay');
        });

        //Market's Event
        Route::group(['prefix' => 'marketing-event'], function() {

            Route::put(     '/event/{seq}/gift/{gift_seq}', 'MarketingEventGiftController@update');
            Route::delete(  '/event/{seq}/gift/{gift_seq}', 'MarketingEventGiftController@delete');
            Route::get(     '/event/{seq}/gift',            'MarketingEventGiftController@list');
            Route::post(    '/event/{seq}/gift',            'MarketingEventGiftController@create');

            Route::post(    '/event',                   'MarketingEventController@create');
            Route::get(     '/event',                   'MarketingEventController@list');
            Route::get(     '/event/{seq}',             'MarketingEventController@detail');
            Route::put(     '/event/{seq}',             'MarketingEventController@update');
            Route::delete(  '/event/{seq}',             'MarketingEventController@delete');
            Route::patch(   '/event/{seq}/{status}',    'MarketingEventController@status');
            
        });

        /* AD */
        Route::group(['prefix' => 'ad'], function() {
            Route::get('/skip/list/{status}', 'ADController@skipADList');
            Route::post('/skip/create', 'ADController@createSkipAD');
            Route::post('/skip/activate', 'ADController@activateSkipAD');
            Route::post('/skip/stop',   'ADController@stopSkipAD');
            Route::post('/skip/modify', 'ADController@modifySkipAD');

            Route::get('/mtop/list/{status}', 'ADController@mainTopList');
            Route::post('/mtop/create', 'ADController@createMainTop');
            Route::post('/mtop/activate', 'ADController@activateMainTop');
            Route::post('/mtop/stop',   'ADController@stopMainTop');
            Route::post('/mtop/modify', 'ADController@modifyMainTop');

            Route::get('/mbottom/list/{status}', 'ADController@mainBottomList');
            Route::post('/mbottom/create', 'ADController@createMainBottom');
            Route::post('/mbottom/activate', 'ADController@activateMainBottom');
            Route::post('/mbottom/stop',   'ADController@stopMainBottom');
            Route::post('/mbottom/modify', 'ADController@modifyMainBottom');

            // Route::get('/list/{status}', 'ADController@adList');
            // Route::post('/create', 'ADController@create');
            // Route::post('/modify', 'ADController@modify');
            // Route::post('/activate', 'ADController@activate');
            // Route::post('/stop',   'ADController@stop');
        });

        Route::group(['prefix' => 'marketing-event'], function() {
            Route::get('/winner/list',                    'MarketingEventWinnerController@list');
            Route::get('/winner/{seq}/detail',            'MarketingEventWinnerController@detail');
            Route::get('/winner/{seq}/abstract',          'MarketingEventWinnerController@abstract');
            Route::post('/winner/modify/{type}',          'MarketingEventWinnerController@modify');
        });
        
        //Contract
        Route::group(['prefix' => 'contract'], function() {
            Route::get('/list/{status}',    'ContractController@list');
            Route::get('{seq}/detail',      'ContractController@detail');
            Route::post('/create',          'ContractController@create');
            Route::post('/modify',          'ContractController@modify');
        });
        //PushLog
        Route::group(['prefix' => 'pushlog'], function() {
            Route::get('',                  'PushLogController@list');
            Route::get('{seq}/detail',      'PushLogController@detail');
        });
        //Staff Management
        Route::group(['prefix' => 'staff'], function() {
            Route::get('account/list',              'StaffController@accountList');
            Route::get('account/{seq}/detail',      'StaffController@accountDetail');
            Route::post('account/save',             'StaffController@accountSave');
            Route::post('account/create',           'StaffController@accountCreate');
            Route::get('account/all_level',         'StaffController@allLevel');
            Route::post('account/check-id',         'StaffController@checkAccountId');
            Route::get('auth/list',                 'StaffController@authList');
            Route::get('auth/all_action',           'StaffController@allAction');
            Route::get('auth/{seq}/detail',         'StaffController@authDetail');
            Route::post('auth/check-id',            'StaffController@checkAuthId');
            Route::post('auth/create',              'StaffController@authCreate');
            Route::post('auth/save',             'StaffController@authSave');
        });
        
        Route::group(['prefix' => 'notice'], function() {
            Route::get('',                  'NoticeController@list');
            Route::post('',                 'NoticeController@create');
            Route::put('{seq}',             'NoticeController@update');
            Route::delete('{seq}',          'NoticeController@delete');
            Route::get('{seq}/detail',      'NoticeController@detail');
        });
        //cashout
        Route::group(['prefix' => 'cash'], function() {
            Route::get('/user/list', 'CashOutController@userList');
            Route::get('/user/{seq}/detail',      'CashOutController@userDetail');
            Route::put('{seq}',             'CashOutController@update');
            Route::post('/user/modify/{type}',          'CashOutController@modify');
            Route::post('excel-download',       'CashOutController@excelDownload');
        });

    }); 
