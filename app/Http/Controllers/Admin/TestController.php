<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:TestController.php
 * $Author:zxs
 * $Dtime:2016/9/7
 ***********************************************************************************/
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Models\BankModel;
use App\Models\UserModel;

class TestController  extends  AdminController {
    public function index()
    {
        $bank = UserModel::find(1);
        dd($bank);
    }
}