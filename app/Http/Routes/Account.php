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
    Route::any('networth/create/{id}', ['as' => 'networth.create', 'uses' => 'NetworthController@create']);
    Route::any('networth/delete/{id}', ['as' => 'networth.delete', 'uses' => 'NetworthController@delete']);
    //平台
    Route::get('platforms/statistic.html', ['as' => 'platform', 'uses' => 'PlatformController@statistic']);
    Route::get('platforms/analysis.html', ['as' => 'platform', 'uses' => 'PlatformController@analysis']);
    //账号充值
    Route::match(['get', 'post'], 'wallet/withdraw.html', ['as' => 'wallet.withdraw', 'uses' => 'WalletController@withdraw']);
    Route::get('wallet/withdrawlist.html', ['as' => 'wallet.withdrawlist', 'uses' => 'WalletController@withdrawlist']);
    Route::get('wallet/book.html', ['as' => 'wallet.recharge', 'uses' => 'WalletController@book']);
    //记帐本
    Route::get('record.html', ['as' => 'record.index', 'uses' => 'RecordController@index']);
    Route::any('record/create/{id?}', ['as' => 'record.create', 'uses' => 'RecordController@create']);
    Route::get('record/delete/{id}', ['as' => 'record.delete', 'uses' => 'RecordController@delete']);
    //账户管理
    Route::get('safe.html', ['as' => 'safe', 'uses' => 'AccountController@safe']);
    Route::match(['get', 'post'], 'safe/changeNickname.html', ['as' => 'safe.changeNickname', 'uses' => 'AccountController@changenickname']);
//    Route::match(['get', 'post'], 'safe/changeTelephone.html', ['as' => 'safe.changeTelephone', 'uses' => 'AccountController@changetelephone']);
    Route::match(['get', 'post'], 'safe/validateEmail.html', ['as' => 'safe.validateEmail', 'uses' => 'AccountController@validateemail']);
//    Route::match(['get', 'post'], 'safe/validIdCard.html', ['as' => 'safe.validIdCard', 'uses' => 'AccountController@validcard']);
    Route::match(['get', 'post'], 'safe/changePassword.html', ['as' => 'safe.changePassword', 'uses' => 'AccountController@changepassword']);
    Route::match(['get', 'post'], 'safe/setDealPassword.html', ['as' => 'safe.setDealPassword', 'uses' => 'AccountController@setdealpassword']);
    Route::match(['get', 'post'], 'safe/changeDealPassword.html', ['as' => 'safe.changeDealPassword', 'uses' => 'AccountController@dealpassword']);
    Route::match(['get', 'post'], 'safe/finddealpassword.html', ['as' => 'safe.finddealpassword', 'uses' => 'AccountController@findpassword']);
//    Route::match(['get', 'post'], 'safe/setSecurityQuestion.html', ['as' => 'safe.setSecurityQuestion', 'uses' => 'AccountController@question']);
    Route::match(['get', 'post'], 'bankcard.html', ['as' => 'safe', 'uses' => 'AccountController@bankcard']);
    Route::match(['get', 'post'], 'bankcard/update.html', ['as' => 'safe.bankcard', 'uses' => 'AccountController@updatebcard']);
    //活动专区
//    Route::get('activity/recommend.html', ['as' => 'activity.recommend', 'uses' => 'ActivityController@recommend']);
//    Route::get('shop.html', ['as' => 'shop', 'uses' => 'ActivityController@shop']);
    //理财劵
//    Route::get('coupon/index.html', ['as' => 'coupon', 'uses' => 'CouponController@index']);
    //消息中心
    Route::get('message.html', ['as' => 'message', 'uses' => 'MessageController@index']);
    Route::post('message/readAll.html', ['as' => 'message.readAll', 'uses' => 'MessageController@readAll']);
    Route::post('message/deleteAll.html', ['as' => 'message.deleteAll', 'uses' => 'MessageController@deleteAll']);
    //我的积分
    Route::get('user/scores.html', ['as' => 'scores', 'uses' => 'ScoresController@index']);
    //统计
    Route::get('chart/waitIncomeStats', ['as' => 'charts.income', 'uses' => 'ChartController@waitIncomeStats']);
    Route::get('chart/incomeStats', ['as' => 'charts.halfyear', 'uses' => 'ChartController@incomeStats']);
});
