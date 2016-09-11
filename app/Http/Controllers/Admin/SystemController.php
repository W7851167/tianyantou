<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:SystemController.php
 * $Author:zxs
 * $Dtime:2016/9/8
 ***********************************************************************************/

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\AdminController;

class SystemController extends  AdminController
{
    public function __construct()
    {
        parent::__initalize();
    }

    public function index()
    {
        return view('admin.system.index');
    }

    /**
     * @return \Illuminate\View\View
     * 角色管理
     */
    public function role()
    {
        return view('admin.system.index');
    }
}