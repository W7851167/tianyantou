<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/9/12
 * Time: 14:13
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;

class TestController extends AdminController
{
    public function me(Request $request)
    {
        echo $request->isMethod('get');
        return view('admin.test.me');
    }
}