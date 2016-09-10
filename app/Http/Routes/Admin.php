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

Route::group(['middleware' => 'admin.auth'], function () {
    //修改密码
    Route::match(['get', 'post'], 'passport/password', ['as' => 'home.passport.password', 'uses' => 'PassportController@password']);
    //控制面板
    Route::get('dashboard', ['as' => 'home.dashboard.index', 'uses' => 'HomeController@index']);
    //用户管理
    Route::get('user', ['as' => 'user.user.index', 'uses' => 'UserController@index']);
    Route::get('user/create', ['as' => 'user.user.create', 'uses' => 'UserController@create']);
    Route::any('user/edit/{id}', ['as' => 'user.user.store', 'uses' => 'UserController@store']);
    Route::get('withdraw', ['as' => 'user.withdraw.index', 'uses' => 'WithdrawController@index']);
    //项目管理
    Route::get('task/{status?}', ['as' => 'task.task.index', 'uses' => 'TaskController@index'])->where('status', '[0-9]+');
    Route::any('task/create/{id?}', ['as' => 'task.task.create', 'uses' => 'TaskController@create']);
    Route::any('task/trashed', ['as' => 'task.task.trashed', 'uses' => 'TaskController@trashed']);
    Route::get('task/untrashed/{id}', ['as' => 'task.task.untrashed', 'uses' => 'TaskController@untrashed']);
    Route::get('task/delete/{id}', ['as' => 'task.task.delete', 'uses' => 'TaskController@delete']);
    //平台管理
    Route::get('corp', ['as' => 'task.corp.index', 'uses' => 'CorpController@index']);
    Route::any('corp/create/{id?}', ['as' => 'task.corp.create', 'uses' => 'CorpController@create']);
    Route::any('corp/manage/{id?}', ['as' => 'task.corp.manage', 'uses' => 'CorpController@manage']);
    Route::any('corp/termcreate/{corp_id}/{id?}', ['as' => 'task.corp.termcreate', 'uses' => 'CorpController@termcreate']);
    Route::get('corp/termdelete/{corp_id}/{id}', ['as' => 'task.corp.termdelete', 'uses' => 'CorpController@termdelete']);
    Route::get('corp/term/{id?}', ['as' => 'task.corp.term', 'uses' => 'CorpController@term']);
    Route::any('corp/safety/{id?}', ['as' => 'task.corp.safety', 'uses' => 'CorpController@safety']);
    Route::any('corp/photos/{id?}', ['as' => 'task.corp.photos', 'uses' => 'CorpController@photos']);
    Route::any('corp/news/{id?}', ['as' => 'task.corp.news', 'uses' => 'CorpController@news']);
    Route::any('corp/dynamic/{corp_id}/{id?}', ['as' => 'task.corp.dynamic', 'uses' => 'CorpController@dynamic']);
    Route::any('corp/newdelete/{corp_id}/{id}', ['as' => 'task.corp.newdelete', 'uses' => 'CorpController@newdelete']);
    //统计管理
    Route::get('census', ['as' => 'census.census.index', 'uses' => 'CensusController@index']);
    //系统管理
    Route::get('system', ['as' => 'system.system.index', 'uses' => 'SystemController@index']);
    Route::get('system/role', ['as' => 'system.role.index', 'uses' => 'SystemController@role']);
    //文章管理
    Route::get('news', ['as' => 'news.multi.index', 'uses' => 'NewController@index']);
    Route::get('news/single', ['as' => 'news.single.index', 'uses' => 'NewController@single']);
    Route::match(['get', 'post'], 'news/single/{id}', ['as' => 'news.single.edit', 'uses' => 'NewController@category']);
    Route::match(['get', 'post'], 'news/multi/{id?}', ['as' => 'news.multi.edit', 'uses' => 'NewController@multi']);
    Route::get('news/del/{id}', ['as' => 'news.multi.del', 'uses' => 'NewController@del']);

});

Route::get('/', function () {
    return redirect(url('passport/login'));
});
//登录退出
Route::match(['get', 'post'], 'passport/login', ['as' => 'admin.passport', 'uses' => 'PassportController@login']);
Route::any('passport/logout', ['as' => 'admin.logout', 'uses' => 'PassportController@logout']);
Route::post('uploadImg', ['as' => 'admin.passport.upload', 'uses' => 'PassportController@uploadImg']);
