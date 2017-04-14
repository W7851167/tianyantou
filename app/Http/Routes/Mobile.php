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
<<<<<<< HEAD
Route::get('platform', ['as' => 'platform', 'uses' => 'PlatformController@index']);
Route::get('platform/{ename}.html', ['as' => 'platform.detail', 'uses' => 'PlatformController@detail']);
=======
//Route::get('platform', ['as' => 'platform', 'uses' => 'PlatformController@index']);
Route::get('platform/{ename}.html', ['as' => 'platform.detail', 'uses' => 'PlatformController@detail']);




>>>>>>> 4179dbccf91a1df6a05e04aafbc9c57d4b798bd1
