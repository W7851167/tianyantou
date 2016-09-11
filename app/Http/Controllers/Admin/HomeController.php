<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:HomeController.php
 * $Author:zxs
 * $Dtime:2016/9/8
 ***********************************************************************************/

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\AdminController;
use App\Repositories\NewRepository;

class HomeController extends AdminController
{
    public function __construct(
        NewRepository $new
    )
    {
        parent::__construct();
        $this->new = $new;
    }

    public function index()
    {
        $notices = $this->new->newModel->where('category_id', 0)->take(8)->get();
//        var_dump($notices);
        return view('admin.home.index', compact(
            'notices'
        ));
    }
}