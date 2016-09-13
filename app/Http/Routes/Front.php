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
Route::get('platform/project.html', ['as' => 'platform.project', 'uses' => 'PlatformController@project']);
//积分商城
Route::get('shop', ['as' => 'shop', 'uses' => 'ShopController@index']);

//文章管理
Route::get('about', 'AboutController@about');
Route::get('about/{page}.html', ['as' => 'about', 'uses' => 'AboutController@index']);
Route::get('about/{page}/{id}.html', ['as' => 'about', 'uses' => 'AboutController@detail']);
