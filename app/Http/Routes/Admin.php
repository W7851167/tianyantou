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
    Route::get('user', ['as'=>'user.index','uses'=>'UserController@index']);
    Route::get('user/create', ['as'=>'user.create','uses'=>'UserController@create']);
    Route::get('user/store/{id}', ['as'=>'user.store','uses'=>'UserController@store']);
    Route::get('task', ['as'=>'task.index','uses'=>'TaskController@index']);
    Route::get('task/create', ['as'=>'task.create','uses'=>'TaskController@create']);
    Route::get('task/store/{id}', ['as'=>'task.store','uses'=>'TaskController@store']);
    Route::get('task/corp', ['as'=>'task.corp','uses'=>'TaskController@crop']);
    Route::get('task/crop-create', ['as'=>'task.corp.create','uses'=>'TaskController@corpCreate']);
    Route::get('task/crop-store/{id}', ['as'=>'task.corp.store','uses'=>'TaskController@cropStore']);
    Route::get('census', ['as'=>'census','uses'=>'CensusController@index']);
});

Route::get('test','TestController@index');