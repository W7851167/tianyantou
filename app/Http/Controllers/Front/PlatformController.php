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
use App\Repositories\NewRepository;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class PlatformController extends FrontController
{
    public function __construct(
        TaskRepository $tasks,
        NewRepository $news
    ) {
        parent::__initalize();
        $this->tasks = $tasks;
        $this->news = $news;
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
        return view('front.platform.index', compact('lists'));
    }



    /**
     * @param Request $request
     * ajax获取查询列表
     */
    public function plists(Request $request)
    {
        $from = $request->get('from');
        $page = $request->get('page');
        $sortType = $request->get('sorttype');
        $sortOrder = $request->get('sortoer');

        $corp = $this->tasks->getCorpByEname($from);
        $order = [];
        if($sortType == 1) {
            $order['ratio'] = $sortOrder;
        }
        $where['status'] = 1;
        list($counts, $lists) = $this->tasks->getTaskList($where,5, $page,0,$order);
        $result['total'] = $counts;
        $result['page']  = $page;
        $result['bidstr'] = view('front.platform.plists', compact('lists'));

    }

    public function corp($ename)
    {;
        $corp = $this->tasks->getCorpByEname($ename);
        $metas['icp_domain'] = '';
        $metas['icp_corp_type'] = '';
        $metas['icp_time'] = '';
        $metas['icp_corp_name'] = '';
        $metas['icp_no'] = '';
        $metas['credentials'] = '';
        $metas['office_address'] = '';
        if(!empty($corp->metas[0])) {
            $metas = getMetas($corp->metas, $metas);
        }

        return view('front.platform.corp',compact('corp','metas'));
    }
}