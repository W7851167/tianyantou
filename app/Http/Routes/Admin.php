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
    //修改密码
    Route::match(['get', 'post'], 'passport/password', ['as' => 'password', 'uses' => 'PassportController@password']);
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
    //文章管理
    Route::get('news', ['as' => 'news.index', 'uses' => 'NewController@index']);
    Route::get('news/create', ['as' => 'news.create', 'uses' => 'NewController@create']);
    Route::post('news/store/{id}', ['as' => 'news.store', 'uses' => 'NewController@store']);
    Route::match(['get', 'psot'], 'news/edit/{id}', ['as' => 'news.edit', 'uses' => 'NewController@edit']);
    Route::get('news/del/{id}', ['as' => 'news.del', 'uses' => 'NewController@del']);
    Route::get('news/single',['as'=>'news.single','uses'=>'NewController@single']);
    Route::get('news/multi',['as'=>'news.multi','uses'=>'NewController@multi']);
});

Route::get('/', function(){
    return  redirect(url('passport/login'));
});
//登录退出
Route::match(['get', 'post'], 'passport/login', ['as' => 'admin.passport', 'uses' => 'PassportController@login']);
Route::any('passport/logout', ['as' => 'admin.logout', 'uses' => 'PassportController@logout']);
Route::post('uploadImg', ['as'=>'admin.passport.upload', 'uses'=>'PassportController@uploadImg']);