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
use App\Repositories\TaskRepository;

class HomeController extends AdminController
{
    public function __construct(
        NewRepository $new,
        CensusRepository $census,
        TaskRepository $tasks
    )
    {
        parent::__initalize();
        $this->new = $new;
        $this->census = $census;
        $this->tasks = $tasks;

    }

    public function index()
    {
        $where['category_id'] = 10;
        list($counts, $notices) = $this->new->getNewList($where, 1, 8);

        $where['category_id'] = 11;
        list($counts, $latests) = $this->new->getNewList($where, 1, 10);


        $yesterday = date('Y-m-d',strtotime('- 1day'));
        $startTime = $yesterday . ' 00:00:01';
        $endTime = $yesterday . ' 23:59:59';
        $dayUserStats = $this->census->getRegisterUserStats($startTime, $endTime);
        $month = date('Y-m');
        $startTime = $month . '-01 00:00:01';
        $endTime = $month . '-' . date('t') . ' 23:59:59';
        $monthUserStats = $this->census->getRegisterUserStats($startTime, $endTime);
        unset($where);
        $where['status'] = 1;
        $order['proccess'] = 'desc';
        list($counts, $tasks) = $this->tasks->getTaskList($where,10, 1,0,$order);
        return view('admin.home.index', compact(
            'notices','latests','dayUserStats','monthUserStats','tasks'
        ));
    }
}