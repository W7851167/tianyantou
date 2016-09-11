<?php
/*********************************************************************************
 *  后台登陆控制器
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:BaseModel.php
 * $Author:pzz
 * $Dtime:2016/9/7
 ***********************************************************************************/

namespace App\Http\Front;


use App\Http\Controllers\FrontController;
use Illuminate\Http\Request;

class LoginController extends FrontController
{
    public function __construct()
    {
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {

        }

        return view('front.passport');
    }

    public function register(Request $request)
    {
        if ($request->isMethod('post')) {

        }

        return view('front.register');
    }

}