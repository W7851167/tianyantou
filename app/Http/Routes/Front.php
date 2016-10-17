<?php
/*********************************************************************************
 *  系统前台 - 路由
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:Front.php
 * $Author:pzz
 * $Dtime:2016/9/7
 ***********************************************************************************/

//首页
Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);
//选平台
Route::get('platform', ['as' => 'platform', 'uses' => 'PlatformController@index']);
Route::get('platform/{ename}.html', ['as' => 'platform.corp', 'uses' => 'PlatformController@corp']);
Route::get('platform/platform/lists', ['as' => 'platform.lists', 'uses' => 'PlatformController@lists']);
Route::get('platform/project/plists', ['as' => 'platform.plists', 'uses' => 'PlatformController@plists']);
Route::get('platform/login/{corp}/{task_id}', ['as' => 'platform.login', 'uses' => 'PlatformController@login']);
Route::any('platform/redirect', ['as' => 'platform.redirect', 'uses' => 'PlatformController@redirect']);
//积分商城
Route::get('shop', ['as' => 'shop', 'uses' => 'ShopController@index']);
//天眼盾
Route::get('plan', ['as' => 'plan', 'uses' => 'PlanController@index']);

//文章管理
Route::get('about', 'AboutController@about');
Route::get('about/{page}.html', ['as' => 'about', 'uses' => 'AboutController@index']);
Route::get('about/{page}/{id}.html', ['as' => 'about', 'uses' => 'AboutController@detail']);

//测试内容
Route::get('test', 'TestController@index');



