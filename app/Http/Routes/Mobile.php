<?php
/*********************************************************************************
 *  H5前端 - 路由
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:M.php
 * $Author:wyw
 * $Dtime:2017/3/31
 ***********************************************************************************/

//首页
Route::get('/', ['as' => 'mindex', 'uses' => 'IndexController@index']);//get路由
//多重路由，可允许get和post访问    as路由命名   uses对应的路径
Route::post('/item',['as' =>'m.index.item', 'uses' => 'IndexController@item']);//投资项目（提交投资页面ajax）
Route::post('/coupon',['as' =>'m.index.item', 'uses' => 'IndexController@coupon']);//投资项目（提交投资页面ajax）
/**
 * 平台相关路由
 */
Route::get('platform', ['as' => 'mplatform', 'uses' => 'PlatformController@index']);
Route::get('platform/{ename}/{id}.html', ['as' => 'mplatform.detail', 'uses' => 'PlatformController@detail']);
Route::get('platform/{ename}/{task_id}.info', ['as' => 'mplatform.info', 'uses' => 'PlatformController@info']);
Route::get('platform/login/{corp}/{task_id}', ['as' => 'mplatform.login', 'uses' => 'PlatformController@login']);
//可允许任何的http访问
Route::any('platform/redirect', ['as' => 'mplatform.redirect', 'uses' => 'PlatformController@redirect']);


Route::match(['get', 'post'], 'signin/captcha', ['as' => 'mpassport.mcaptcha', 'uses' => 'PassportController@captcha']);//图形验证码
//post路由
Route::post('common/sendVerifyCode', ['as' => 'mpassport.msendVerifyCode', 'uses' => 'PassportController@sendVerifyCode']);//发送验证码到手机

Route::match(['get', 'post'], 'signin.html', ['as' => 'mpassport.msignin', 'uses' => 'PassportController@signin']);//登录
Route::match(['get', 'post'], 'register.html', ['as' => 'mpassport.mregister', 'uses' => 'PassportController@register']);//注册

//手机找回密码
Route::match(['get', 'post'], 'findpassword.html', ['as' => 'mpassport', 'uses' => 'PassportController@findPassword']);//找回密码

//H5注册登录
Route::group(['middleware' => 'middle.account'], function () {//中间件，以下所有接口先访问中间件
    Route::get('/user', ['as' => 'muser', 'uses' => 'UserController@index']);//个人中心
    Route::match(['get', 'post'], 'resetpass.html', ['as' => 'mpassport.mresetpass', 'uses' => 'PassportController@resetpass']);//重置密码
    Route::get('signout.html', ['as' => 'mpassport.msingout', 'uses' => 'PassportController@signout']);//退出
    Route::get('invitation.html', ['as' => 'muser.minvitation', 'uses' => 'UserController@invitation']);//邀请好友
    Route::get('record.html', ['as' => 'muser.mrecord', 'uses' => 'UserController@record']);//投资记录
    Route::get('recommend.html', ['as' => 'muser.mrecommend', 'uses' => 'UserController@recommend']);//推荐好友
    Route::get('coupon.html', ['as' => 'muser.mcoupon', 'uses' => 'UserController@coupon']);//优惠券
    Route::match(['get', 'post'],'/user/wallet', ['as' => 'muser.mwallet', 'uses' => 'UserController@wallet']);//优惠券
    Route::match(['get','post'],'/userInvestInfo', ['as' => 'mindex.userInvestInfo', 'uses' => 'IndexController@userInvestInfo']);//提交投资
});




