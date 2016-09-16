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
        return view('front.platform.index', compact('lists','citys'));
    }


    /**
     * @param Request $request
     * 获取平台列表
     */
    public function lists(Request $request)
    {
        $page = $request->get('page');
        $search['grade'] = $request->get('grade');
        $search['overall'] = $request->get('overall');
        $search['time'] = $request->get('time');
        $search['city'] = $request->get('city');
        $where = [];
        //城市查询
        $citys = ['北京市','上海市','广州市','深圳市'];
        if($search['city'] == -1) {
            $where['not_in']['city'] = $citys;
        } else if($search['city'] > 0){
            $where['city'] = $citys[$search['city'] - 1];
        }
        //等级查询
        if($search['grade'] > 0) {
            $grades = [
                1=>['AAA'],
                2=>['AAA','AA'],
                3=>['AAA','AA','A'],
                4=>['AAA','AA','A','BBB'],
                5=>['AAA','AA','A','BBB','BB'],
                6=>['AAA','AA','A','BBB','BB','B']
            ];
            $where['in']['level'] = $grades[$search['grade']];
        }
        //年收益查询
        if($search['overall'] > 0) {
            if($search['overall'] == 4) {
                $where['max_yield <='] = 8;
                $where['max_yield !='] = 0;
            } else {
                $overalls = [
                    1 => [16,20],
                    2 => [12,16],
                    3 => [8,12],
                ];
                $where['between']['max_yield'] = $overalls[$search['overall']];
            }
        }

        if($search['time'] > 0) {
            if($search['time'] == 1) {
                $where['max_days <='] = 30;
                $where['max_days !='] = 0;
            }
            if($search['time'] == 2) {
                $where['between']['max_days'] = [30,90];
            }
            if($search['time'] == 3) {
                $where['between']['max_days'] = [90,180];
            }
            if($search['time'] == 4) {
                $where['between']['max_days'] = [180,365];
            }
            if($search['time'] == 5) {
                $where['max_days >='] = 365;
            }
        }
        $where['status'] = 1;
        list($counts,$lists) = $this->tasks->getCorpList($where,$this->perpage,$page);
        $result['total'] = $counts;
        $result['page']  = $page;
        $html = view('front.platform.lists', compact('lists'))->render();
        $html = str_replace('\r','', $html);
        $html = str_replace('\n',"", $html);
        $result['platformStr'] = $html;
        return $this->ajaxReturn($result);

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
        $sortOrder = $request->get('sortorder');

        $corp = $this->tasks->getCorpByEname($from);
        $order = [];
        if($sortType == 1) {
            $order['ratio'] = $sortOrder;
        }
        if($sortType == 3 ) {
            $order['proccess'] = $sortOrder;
        }
        $where['status'] = 1;
        $where['corp_id'] = $corp->id;
        list($counts, $lists) = $this->tasks->getTaskList($where,5, $page,0,$order);
        $result['total'] = $counts;
        $result['page']  = $page;
        $html = view('front.platform.plists', compact('lists'))->render();
        $html = str_replace('\r','', $html);
        $html = str_replace("\n","", $html);
        $result['bidstr'] = $html;
        return $this->ajaxReturn($result);

    }

    /**
     * @param $ename
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 单平台数据
     */
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
        //资本充足率
        $metas['capital_adequacy'] = '';
        //运营能力比率
        $metas['operating_capacity'] = '';
        //流动性
        $metas['flowability'] = '';
        //分散率
        $metas['dissemination'] = '';
        //透明去
        $metas['transparency'] = '';
        //违约比率
        $metas['contract_rate'] = '';
        if(!empty($corp->metas[0])) {
            $metas = getMetas($corp->metas, $metas);
        }

        return view('front.platform.corp',compact('corp','metas'));
    }

    /**
     * @param Request $request
     * @param $page
     * @param $id
     * 记录任务领取
     */
    public function login(Request $request,$ename, $id)
    {
        if(empty($this->user['id'])) {
            return abort(500,'请先登录');
        }
        $corp = $this->tasks->getCorpByEname($ename);
        $task = $this->tasks->taskModel->find($id);
        if(empty($task->url)) {
            return abort(500, '没有跳转的URL信息,请联系运营人员');
        }
        $data['corp_id'] = $corp->id;
        $data['task_id']  = $id;
        $data['user_id'] = $this->user['id'];
        $data['total'] = $task->limit;
        $data['status'] = 0;
        $sign = $this->signature($id,$task->url,$ename, time());
        if($this->tasks->saveReceive($data)) {
            return view('front.platform.login',compact('data','corp','task','sign'));
        }
        return abort(500, '记录领取任务信息异常，请联系开发人员');
    }

    private function signature($appId,$url = null, $nonce = null, $timestamp = null)
    {
        $timestamp = $timestamp ? $timestamp : time();
        $sign = [
            'appId' => $appId,
            'nonceStr' => $nonce,
            'timestamp' => $timestamp,
            'url' => $url,
            'signature' => $this->getSignature($appId, $nonce, $timestamp, $url),
        ];

        return $sign;
    }

    private function getSignature($appId, $nonce, $timestamp, $url)
    {
        return sha1("appId={$appId}&noncestr={$nonce}&timestamp={$timestamp}&url={$url}");
    }






}