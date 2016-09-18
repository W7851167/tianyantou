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
use App\Repositories\CensusRepository;
use App\Repositories\NewRepository;

class HomeController extends AdminController
{
    public function __construct(
        NewRepository $new,
        CensusRepository $census
    )
    {
        parent::__initalize();
        $this->new = $new;
        $this->census = $census;
    }

    public function index()
    {
        $notices = $this->new->newModel->where('category_id', 0)->take(8)->get();
        $yesterday = date('Y-m-d',strtotime('- 1day'));
        $startTime = strtotime($yesterday . ' 00:00:01');
        $endTime = strtotime($yesterday . ' 23:59:59');
        $dayUserStats = $this->census->getRegisterUserStats($startTime, $endTime);
        $month = date('Y-m');
        $startTime = strtotime($month . '-01 00:00:01');
        $endTime = strtotime($month . '-' . date('t') . ' 23:59:59');
        $monthUserStats = $this->census->getRegisterUserStats($startTime, $endTime);

        return view('admin.home.index', compact(
            'notices','dayUserStats','monthUserStats'
        ));
    }
}