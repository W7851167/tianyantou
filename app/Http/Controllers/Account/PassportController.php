<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:PassportController.php
 * $Author:zxs
 * $Dtime:2016/9/11
 ***********************************************************************************/

namespace App\Http\Controllers\Account;


use App\Http\Controllers\FrontController;

class PassportController extends  FrontController
{
    public function __construct()
    {
        parent::__initalize();
    }

    /**
     * 登录
     */
    public function signin() {
        return view('account.passport.signin');
    }

    /**
     * 注册
     */
    public function register()
    {
       return view('account.passport.register');
    }

    public function captcha()
    {

    }

}