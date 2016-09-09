<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By phpad
 * 文章分类管理控制器管理
 *-------------------------------------------------------------------------------
 * $FILE:NewController.php
 * $Author:pzz
 * $Dtime:2016/9/8
 ***********************************************************************************/

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;

class CategoryController extends AdminController
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {

    }

    public function edit($id,Request $request)
    {
        if($request->isMethod('post')){

        }

        return view('admin.category.edit');
    }

    public function del($id)
    {

    }
}