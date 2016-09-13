<?php
/*********************************************************************************
 *  账户管理控制器 - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By tianyantou.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:AccountController.php
 * $Author:pzz
 * $Dtime:2016/9/13
 ***********************************************************************************/

namespace App\Http\Controllers\Account;


use App\Http\Controllers\FrontController;

class AccountController extends FrontController
{
    public function __construct()
    {
        parent::__initalize();
    }

    public function safe()
    {
        return view('account.account.safe');
    }

    public function bankcard()
    {
        return view('account.account.bankcard');
    }
}