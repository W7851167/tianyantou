<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By phpad
 * 用户中心路由控制
 *-------------------------------------------------------------------------------
 * $FILE:Account.php
 * $Author:zxs
 * $Dtime:2016/9/11
 ***********************************************************************************/
Route::group(['middle.admin'],function(){

});
Route::get('signin.html','PassportController@signin');
Route::get('register.html','PassportController@register');