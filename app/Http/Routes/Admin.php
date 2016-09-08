<?php
/*********************************************************************************
 *  后台管理系统 - 路由
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:BaseModel.php
 * $Author:pzz
 * $Dtime:2016/9/7
 ***********************************************************************************/

Route::group(['as' => 'admin.'], function () {
    Route::match(['get', 'post'], 'login', ['as' => 'login', 'uses' => 'LoginController@login']);
    Route::get('dashboard', ['as'=>'home.index','uses'=>'HomeController@index']);
});

Route::get('test','TestController@index');