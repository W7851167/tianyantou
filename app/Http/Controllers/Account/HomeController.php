<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:IndexController.php
 * $Author:zxs
 * $Dtime:2016/9/11
 ***********************************************************************************/

namespace App\Http\Controllers\Account;


use App\Http\Controllers\FrontController;

class HomeController extends  FrontController
{
    public function index()
    {
//        if(!empty(\Session::get('user.passport'))) {
//            return redirect(url('signin.html'));
//        }

        return view('account.index.index');

    }

}