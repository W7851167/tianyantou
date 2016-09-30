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
    Route::get('/', function () {
        return redirect(url('passport/login'));
    });
    Route::match(['get', 'post'], 'passport/login', ['as' => 'admin.passport', 'uses' => 'PassportController@login']);
    //登录退出
    Route::any('passport/logout', ['as' => 'admin.logout', 'uses' => 'PassportController@logout']);
    Route::post('uploadImg', ['as' => 'admin.passport.upload', 'uses' => 'PassportController@uploadImg']);
    //修改密码
    Route::match(['get', 'post'], 'passport/password', ['as' => 'home.passport.password', 'uses' => 'PassportController@password']);
    //控制面板
    Route::get('dashboard', ['as' => 'home.dashboard.index', 'uses' => 'HomeController@index']);
    //用户管理
    Route::get('user', ['as' => 'user.user.index', 'uses' => 'UserController@index']);
    Route::match(['get', 'post'], 'user/edit/{id}', ['as' => 'user.user.edit', 'uses' => 'UserController@edit']);
    Route::match(['get', 'post'], 'user/manage/{id}', ['as' => 'user.user.manage', 'uses' => 'UserController@manage']);
    Route::any('user/score/{user_id}', ['as' => 'user.user.score', 'uses' => 'UserController@score']);
    Route::get('withdraw', ['as' => 'user.withdraw.index', 'uses' => 'WithdrawController@index']);
    Route::any('withdraw/create/{id}', ['as' => 'user.withdraw.create', 'uses' => 'WithdrawController@create']);
    Route::post('withdraw/batch', ['as' => 'user.withdraw.batch', 'uses' => 'WithdrawController@batch']);
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
    Route::any('corp/charts/{id?}', ['as' => 'task.corp.charts', 'uses' => 'CorpController@charts']);
    Route::any('corp/photos/{id?}', ['as' => 'task.corp.photos', 'uses' => 'CorpController@photos']);
    Route::any('corp/news/{id?}', ['as' => 'task.corp.news', 'uses' => 'CorpController@news']);
    Route::any('corp/honour/{id?}', ['as' => 'task.corp.honour', 'uses' => 'CorpController@honour']);
    Route::any('corp/dynamic/{corp_id}/{id?}', ['as' => 'task.corp.dynamic', 'uses' => 'CorpController@dynamic']);
    Route::any('corp/newdelete/{corp_id}/{id}', ['as' => 'task.corp.newdelete', 'uses' => 'CorpController@newdelete']);
    //领取任务管理
    Route::get('achieve', ['as' => 'task.achieve.index', 'uses' => 'AchieveController@index']);
    Route::any('achieve/create/{id}', ['as' => 'task.achieve.create', 'uses' => 'AchieveController@create']);
    //统计管理
    Route::get('census', ['as' => 'census.census.index', 'uses' => 'CensusController@index']);
    Route::get('census/register', ['as' => 'census.census.register', 'uses' => 'CensusController@register']);
    Route::get('ad', ['as' => 'census.ad.index', 'uses' => 'AdController@index']);
    Route::any('ad/create/{id?}', ['as' => 'census.ad.create', 'uses' => 'AdController@create']);
    Route::get('ad/delete/{id}', ['as' => 'census.ad.delete', 'uses' => 'AdController@delete']);
    Route::get('link', ['as' => 'census.link.index', 'uses' => 'LinkController@index']);
    Route::any('link/create/{id?}', ['as' => 'census.link.create', 'uses' => 'LinkController@create']);
    Route::get('link/delete/{id}', ['as' => 'census.link.delete', 'uses' => 'LinkController@delete']);

    //系统管理
    Route::any('system', ['as' => 'system.system.index', 'uses' => 'SystemController@index']);
    Route::get('system/role', ['as' => 'system.role.index', 'uses' => 'SystemController@role']);
    //文章管理
    Route::get('news/multi', ['as' => 'news.multi.index', 'uses' => 'NewController@index']);
    Route::match(['get', 'post'], 'news/multi/create/{id?}', ['as' => 'news.multi.edit', 'uses' => 'NewController@createmulti']);
    Route::match(['get', 'post'], 'news/single/{id?}', ['as' => 'news.single.index', 'uses' => 'NewController@single']);
    Route::get('news/help', ['as' => 'news.help.index', 'uses' => 'NewController@help']);
    Route::match(['get', 'post'], 'news/help/create/{id?}', ['as' => 'news.help.edit', 'uses' => 'NewController@helpcreate']);
    Route::get('news/notice', ['as' => 'news.notice.index', 'uses' => 'NewController@notice']);
    Route::match(['get', 'post'], 'news/notice/create/{id?}', ['as' => 'news.notice.edit', 'uses' => 'NewController@noticecreate']);
    Route::get('news/del/{id}', ['as' => 'news.news.del', 'uses' => 'NewController@del']);
});

Route::get('test','TestController@index');

