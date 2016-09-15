<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By phpad
 * 用户中心路由控制
 *-------------------------------------------------------------------------------
 * $FILE:Account.php
 * $Author:zxs
 * $Dtime:2016/9/11
 ***********************************************************************************/
Route::group(['middleware' => 'middle.account'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);
    //平台
    Route::get('platforms/statistic.html', ['as' => 'platform', 'uses' => 'PlatformController@statistic']);
    Route::get('platforms/analysis.html', ['as' => 'platform', 'uses' => 'PlatformController@analysis']);
    Route::get('platforms/bind.html', ['as' => 'platform', 'uses' => 'PlatformController@bind']);
    //账号充值
    Route::get('wallet/recharge.html', ['as' => 'wallet.recharge', 'uses' => 'WalletController@recharge']);
    Route::get('wallet/rechargelist.html', ['as' => 'wallet.rechargelist', 'uses' => 'WalletController@rechargelist']);
    Route::get('wallet/withdraw.html', ['as' => 'wallet.recharge', 'uses' => 'WalletController@withdraw']);
    Route::get('wallet/book.html', ['as' => 'wallet.recharge', 'uses' => 'WalletController@book']);
    //账户管理
    Route::get('safe.html', ['as' => 'safe', 'uses' => 'AccountController@safe']);
    Route::get('bankcard.html', ['as' => 'safe', 'uses' => 'AccountController@bankcard']);
    //活动专区
    Route::get('activity/recommend.html', ['as' => 'activity.recommend', 'uses' => 'ActivityController@recommend']);
    Route::get('shop.html', ['as' => 'shop', 'uses' => 'ActivityController@shop']);
    Route::get('message.html', ['as' => 'message', 'uses' => 'MessageController@index']);
});
Route::match(['get', 'post'], 'signin.html', 'PassportController@signin');
Route::get('signin/captcha', 'PassportController@captcha');
Route::get('register.html', 'PassportController@register');