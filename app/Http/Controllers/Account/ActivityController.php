<?php
/*********************************************************************************
 *  活动专区控制器 - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By tianyantou.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:ActivityController.php
 * $Author:pzz
 * $Dtime:2016/9/13
 ***********************************************************************************/

namespace App\Http\Controllers\Account;


use App\Http\Controllers\FrontController;

class ActivityController extends FrontController
{
    public function __construct()
    {
        parent::__initalize();
    }

    public function recommend()
    {
        return view('account.activity.recommend');
    }

    public function shop()
    {
        return view('account.activity.shop');
    }
}