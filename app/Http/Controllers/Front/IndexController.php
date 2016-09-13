<?php
/*********************************************************************************
 *  前台首页控制器
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By phpad
 * 首页控制器内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:IndexController.php
 * $Author:pzz
 * $Dtime:2016/9/7
 ***********************************************************************************/

namespace App\Http\Controllers\Front;


use App\Http\Controllers\FrontController;

class IndexController extends FrontController
{
    public function __construct()
    {
        parent::__initalize();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * 首页控制器
     */
    public function index()
    {
        return view('front.index.index');
    }
}