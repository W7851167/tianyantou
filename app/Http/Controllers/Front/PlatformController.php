<?php
/*********************************************************************************
 *  平台控制器
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By phpad
 * 首页控制器内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:PlatformController.php
 * $Author:pzz
 * $Dtime:2016/9/7
 ***********************************************************************************/

namespace App\Http\Controllers\Front;


use App\Http\Controllers\FrontController;

class PlatformController extends FrontController
{
    public function __construct()
    {
        parent::__initalize();
    }

    public function index()
    {
        return view('front.platform.platform');
    }

    public function project()
    {
        return view('front.platform.project');
    }
}