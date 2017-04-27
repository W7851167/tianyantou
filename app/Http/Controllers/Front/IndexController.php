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
use App\Repositories\CensusRepository;
use App\Repositories\NewRepository;
use App\Repositories\TaskRepository;
use App\Repositories\XdataRepository;

class IndexController extends FrontController
{
    public function __construct(
        XdataRepository $xdata,
        NewRepository $news,
        TaskRepository $tasks,
        CensusRepository $census
    )
    {
        parent::__initalize();
        $this->xdata = $xdata;
        $this->news = $news;
        $this->tasks = $tasks;
        $this->census = $census;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * 首页控制器
     */
    public function index()
    {
        list($counts, $advs) = $this->xdata->getAdvList([], 5, 1);
        //系统公告
        $where['category_id'] = 10;
        list($counts, $notices) = $this->news->getNewList($where, 1, 5);
        //最新动态
        $where['category_id'] = 11;
        list($counts, $latests) = $this->news->getNewList($where, 1, 4);
        //投资攻略
        $where['category_id'] = 12;
        list($counts, $strategys) = $this->news->getNewList($where, 1, 6);
        //已上线项目
        unset($where);
        $where['status'] = 1;
        $where['position'] = 1;
        list($counts, $tasks) = $this->tasks->getTaskList($where, 12, 1);
        //links
        list($counts, $links) = $this->xdata->getLinkList([], 15, 1);
        $stats = $this->census->getHomeStats();
        return view('front.index.index', compact('advs', 'notices', 'tasks', 'latests', 'strategys', 'links','stats'));
    }

    /**
     * 第三方跳转
     */
    public function thirdPlatform()
    {
        $url = "http://m.niwodai.com/index.do?method=acReg&artId=5820160000006480&nwd_ext_aid=5020160090133035&v=http%253a%252f%252fm.niwodai.com%252factivity.mhtml%253fartId%253d5820160000006483";
        return redirect($url);
    }
}