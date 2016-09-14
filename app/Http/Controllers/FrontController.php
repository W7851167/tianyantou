<?php
/*********************************************************************************
 * 前台基础控制器
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:FrontController.php
 * $Author:pzz
 * $Dtime:2016/9/7
 ***********************************************************************************/

namespace App\Http\Controllers;


class FrontController extends Controller
{
    protected $user;
    protected  $perpage = 20;


    public function __initalize()
    {
        $this->user = \Session::get('user.passport');
        view()->share('user', $this->user);
    }
}