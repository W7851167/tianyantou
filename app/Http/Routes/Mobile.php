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
Route::get('/', ['as' => 'mindex', 'uses' => 'IndexController@index']);
/**
 * 平台相关路由
 */
Route::get('platform', ['as' => 'platform', 'uses' => 'PlatformController@index']);
Route::get('platform/{ename}.html', ['as' => 'platform.detail', 'uses' => 'PlatformController@detail']);
Route::get('platform/{ename}.info', ['as' => 'platform.info', 'uses' => 'PlatformController@info']);
Route::get('platform/login/{corp}/{task_id}', ['as' => 'platform.login', 'uses' => 'PlatformController@login']);
Route::any('platform/redirect', ['as' => 'platform.redirect', 'uses' => 'PlatformController@redirect']);




