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
use App\Repositories\NewRepository;
use App\Repositories\TaskRepository;
use App\Repositories\XdataRepository;

class IndexController extends FrontController
{
    public function __construct(
        XdataRepository $xdata,
        NewRepository $news,
        TaskRepository $tasks
    ) {
        parent::__initalize();
        $this->xdata = $xdata;
        $this->news  = $news;
        $this->tasks = $tasks;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * 首页控制器
     */
    public function index()
    {
        list($counts, $advs) = $this->xdata->getAdvList([],5,1);
        //系统公告
        $where['category_id'] = 10;
        list($counts, $notices) = $this->news->getNewList($where,1,5);
        //最新动态
        $where['category_id'] = 11;
        list($counts, $latests) = $this->news->getNewList($where,1,4);
        //投资攻略
        $where['category_id'] = 12;
        list($counts, $strategys) = $this->news->getNewList($where,1,6);
        //已上线项目
        unset($where);
        $where['status'] = 1;
        list($counts, $tasks) = $this->tasks->getTaskList($where, 12, 1);
        return view('front.index.index',compact('advs','notices','tasks','latests','strategys'));
    }
}