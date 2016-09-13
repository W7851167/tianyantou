<?php
/*********************************************************************************
 *  平台控制器 - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By tianyantou.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:PlatformController.php
 * $Author:pzz
 * $Dtime:2016/9/11
 ***********************************************************************************/


namespace App\Http\Controllers\Account;


use App\Http\Controllers\FrontController;

class PlatformController extends FrontController
{
    public function __construct()
    {
        parent::__initalize();
    }

    public function statistic()
    {
        return view('account.platform.statistic');
    }

    public function analysis()
    {
        return view('account.platform.analysis');
    }

    public function bind()
    {
        return view('account.platform.bind');
    }
}