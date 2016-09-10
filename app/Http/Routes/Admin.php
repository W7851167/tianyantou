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
    Route::any('user/score/{user_id}', ['as' => 'user.score', 'uses' => 'UserController@score']);
    Route::get('withdraw', ['as' => 'withdraw', 'uses' => 'UserController@withdraw']);
    //项目管理
    Route::get('task/{status?}', ['as' => 'task.index', 'uses' => 'TaskController@index'])->where('status', '[0-9]+');
    Route::any('task/create/{id?}', ['as' => 'task.create', 'uses' => 'TaskController@create']);
    Route::any('task/trashed', ['as' => 'task.trashed', 'uses' => 'TaskController@trashed']);
    Route::get('task/untrashed/{id}', ['as' => 'task.untrashed', 'uses' => 'TaskController@untrashed']);
    Route::get('task/delete/{id}', ['as' => 'task.delete', 'uses' => 'TaskController@delete']);
    //平台管理
    Route::get('corp', ['as' => 'corp', 'uses' => 'CorpController@index']);
    Route::any('corp/create/{id?}', ['as' => 'corp.create', 'uses' => 'CorpController@create']);
    Route::any('corp/manage/{id?}', ['as' => 'corp.manage', 'uses' => 'CorpController@manage']);
    Route::any('corp/termcreate/{corp_id}/{id?}', ['as' => 'corp.termcreate', 'uses' => 'CorpController@termcreate']);
    Route::get('corp/termdelete/{corp_id}/{id}', ['as' => 'corp.termdelete', 'uses' => 'CorpController@termdelete']);
    Route::get('corp/term/{id?}', ['as' => 'corp.term', 'uses' => 'CorpController@term']);
    Route::any('corp/safety/{id?}', ['as' => 'corp.safety', 'uses' => 'CorpController@safety']);
    Route::any('corp/photos/{id?}', ['as' => 'corp.photos', 'uses' => 'CorpController@photos']);
    Route::any('corp/news/{id?}', ['as' => 'corp.news', 'uses' => 'CorpController@news']);
    Route::any('corp/dynamic/{corp_id}/{id?}', ['as' => 'corp.dynamic', 'uses' => 'CorpController@dynamic']);
    Route::any('corp/newdelete/{corp_id}/{id}', ['as' => 'corp.newdelete', 'uses' => 'CorpController@newdelete']);
    //统计管理
    Route::get('census', ['as' => 'census', 'uses' => 'CensusController@index']);
    //系统管理
    Route::get('system', ['as' => 'system', 'uses' => 'SystemController@index']);
    Route::get('system/role', ['as' => 'system.role', 'uses' => 'SystemController@role']);
    //文章管理
    Route::get('news', ['as' => 'news.index', 'uses' => 'NewController@index']);
    Route::match(['get', 'post'], 'news/create', ['as' => 'news.create', 'uses' => 'NewController@create']);
    Route::get('news/single', ['as' => 'news.single', 'uses' => 'NewController@single']);
    Route::match(['get', 'post'], 'news/category/{id}', ['as' => 'news.category', 'uses' => 'NewController@category']);
    Route::match(['get', 'post'], 'news/multi/{id?}', ['as' => 'news.multi', 'uses' => 'NewController@multi']);
    Route::get('news/del/{id}', ['as' => 'news.del', 'uses' => 'NewController@del']);

});

Route::get('/', function () {
    return redirect(url('passport/login'));
});
//登录退出
Route::match(['get', 'post'], 'passport/login', ['as' => 'admin.passport', 'uses' => 'PassportController@login']);
Route::any('passport/logout', ['as' => 'admin.logout', 'uses' => 'PassportController@logout']);
Route::post('uploadImg', ['as' => 'admin.passport.upload', 'uses' => 'PassportController@uploadImg']);
