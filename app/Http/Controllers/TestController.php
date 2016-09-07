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
namespace App\Http\Controllers;

use App\Models\BankModel;

class TestController  extends  Controller {
    public function index()
    {
        $bank = BankModel::find(1);
        dd($bank);
    }
}