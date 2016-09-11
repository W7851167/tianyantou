<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:WithdrawController.php
 * $Author:zxs
 * $Dtime:2016/9/9
 ***********************************************************************************/

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\AdminController;

class WithdrawController extends  AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view('admin.withdraw.index');
    }
}