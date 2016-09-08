<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By phpad
 * 文章控制器管理
 *-------------------------------------------------------------------------------
 * $FILE:NewsController.php
 * $Author:zxs
 * $Dtime:2016/9/8
 ***********************************************************************************/

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;

class NewsController extends AdminController
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('admin.news.index');
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {

        }

        return view('admin.news.create');
    }

    public function edit($id, Request $request)
    {
        if ($request->isMethod('post')) {

        }

        return view('admin.news.edit');
    }

    public function del($id)
    {

    }
}