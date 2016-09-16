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
Route::get('register/protocol.html', 'PassportController@protocol');
Route::match(['get', 'post'], 'signin/captcha', 'PassportController@captcha');

Route::group(['middleware' => 'middle.account'], function () {
    Route::match(['get', 'post'], 'signin.html', 'PassportController@signin');
    Route::match(['get', 'post'], 'register.html', 'PassportController@register');
    Route::get('signout.html', 'PassportController@signout');

    Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);
    //投资记录
    Route::get('networth/index.html', ['as' => 'networth', 'uses' => 'NetworthController@index']);
    //平台
    Route::get('platforms/statistic.html', ['as' => 'platform', 'uses' => 'PlatformController@statistic']);
    Route::get('platforms/analysis.html', ['as' => 'platform', 'uses' => 'PlatformController@analysis']);
    //账号充值
    Route::get('wallet/withdraw.html', ['as' => 'wallet.recharge', 'uses' => 'WalletController@withdraw']);
    Route::get('wallet/book.html', ['as' => 'wallet.recharge', 'uses' => 'WalletController@book']);
    //账户管理
    Route::get('safe.html', ['as' => 'safe', 'uses' => 'AccountController@safe']);
    Route::get('bankcard.html', ['as' => 'safe', 'uses' => 'AccountController@bankcard']);
    //活动专区
    Route::get('activity/recommend.html', ['as' => 'activity.recommend', 'uses' => 'ActivityController@recommend']);
    Route::get('shop.html', ['as' => 'shop', 'uses' => 'ActivityController@shop']);
    //理财劵
    Route::get('coupon/index.html', ['as' => 'coupon', 'uses' => 'CouponController@index']);
    //消息中心
    Route::get('message.html', ['as' => 'message', 'uses' => 'MessageController@index']);
    //我的积分
    Route::get('user/scores.html', ['as' => 'scores', 'uses' => 'ScoresController@index']);
});
