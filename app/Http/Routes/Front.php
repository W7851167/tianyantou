<?php
/*********************************************************************************
 *  系统前台 - 路由
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:BaseModel.php
 * $Author:pzz
 * $Dtime:2016/9/7
 ***********************************************************************************/

Route::get('/', function () {
    return view('welcome');
});

Route::match(['get', 'post'], 'user/passport.html', ['as' => 'front.passport', 'uses' => 'LoginController@passport']);
Route::match(['get', 'post'], 'user/register.html', ['as' => 'front.register', 'uses' => 'LoginController@register']);