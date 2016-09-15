<?php
/*********************************************************************************
 *  投资记录控制器 - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By tianyantou.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:NetworthController.php
 * $Author:pzz
 * $Dtime:2016/9/13
 ***********************************************************************************/

namespace App\Http\Controllers\Account;


use App\Http\Controllers\FrontController;

class NetworthController extends FrontController
{
    public function __construct()
    {
        parent::__initalize();
    }

    public function index()
    {
        return view('account.networth.index');
    }
}