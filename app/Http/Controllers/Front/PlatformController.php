<?php
/*********************************************************************************
 *  平台控制器
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By phpad
 * 首页控制器内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:PlatformController.php
 * $Author:pzz
 * $Dtime:2016/9/7
 ***********************************************************************************/

namespace App\Http\Controllers\Front;


use App\Http\Controllers\FrontController;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class PlatformController extends FrontController
{
    public function __construct(TaskRepository $tasks)
    {
        parent::__initalize();
        $this->tasks = $tasks;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 精选平台套用
     */
    public function index(Request $request)
    {
        $page = !empty($request->get('page')) ? $request->get('page') : 1;
        $where['status'] = 1;
        list($counts, $lists) = $this->tasks->getCorpList($where, $this->perpage,$page);
        return view('front.platform.platform', compact('lists'));
    }



    /**
     * @param Request $request
     * ajax获取查询列表
     */
    public function lists(Request $request)
    {

    }

    public function corp($ename)
    {
        return view('front.platform.corp');
    }
}