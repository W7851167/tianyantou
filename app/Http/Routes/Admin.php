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

Route::group(['as' => 'admin.', 'middleware' => 'admin.auth'], function () {
    //登录退出
    Route::match(['get', 'post'], 'passport/login', ['as' => 'passport', 'uses' => 'PassportController@login']);
    Route::any('passport/logout', ['as' => 'logout', 'uses' => 'PassportController@logout']);

    //控制面板
    Route::get('dashboard', ['as' => 'home.index', 'uses' => 'HomeController@index']);
    //用户管理
    Route::get('user', ['as' => 'user.index', 'uses' => 'UserController@index']);
    Route::get('user/create', ['as' => 'user.create', 'uses' => 'UserController@create']);
    Route::any('user/edit/{id}', ['as' => 'user.store', 'uses' => 'UserController@store']);
    //项目管理
    Route::get('task', ['as' => 'task.index', 'uses' => 'TaskController@index']);
    Route::get('task/create', ['as' => 'task.create', 'uses' => 'TaskController@create']);
    Route::get('task/store/{id}', ['as' => 'task.store', 'uses' => 'TaskController@store']);
    Route::get('corp', ['as' => 'corp', 'uses' => 'CorpController@index']);
    Route::get('corp/create', ['as' => 'corp.create', 'uses' => 'CorpController@create']);
    Route::any('corp/edit/{id}', ['as' => 'corp.store', 'uses' => 'CorpController@store']);
    //统计管理
    Route::get('census', ['as' => 'census', 'uses' => 'CensusController@index']);
    //系统管理
    Route::get('system', ['as' => 'system', 'uses' => 'SystemController@index']);
});

Route::get('test', 'TestController@index');