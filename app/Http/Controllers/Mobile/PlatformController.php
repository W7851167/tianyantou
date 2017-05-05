<?php
/*********************************************************************************
 *  H5平台控制器
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By phpad
 * 首页控制器内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:PlatformController.php
 * $Author:wyw
 * $Dtime:2017/4/13
 ***********************************************************************************/

namespace App\Http\Controllers\Mobile;


use App\Http\Controllers\MobileController;
use App\Repositories\NewRepository;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;
use App\Repositories\CensusRepository;
use App\Repositories\UserRepository;
use App\Repositories\XdataRepository;

class PlatformController extends MobileController
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
     * 精选平台套用
     */
    public function index(Request $request)
    {
        //已上线项目
        $where['status'] = 1;
        $where['position'] = 1;
        list($counts, $tasks) = $this->tasks->getTaskList($where, 12, 1);
        return view('mobile.platform.index', compact('tasks'));
    }

    /**
     * @param $ename
     * @return View
     * 单平台数据详情
     */
    public function detail($ename,$id)
    {
        $tasks = $this->tasks->getTaskById($id);
        if(!empty($tasks)) {
            $corps = $this->tasks->getCorpById($tasks['corp_id']);
        }
        return view('mobile.platform.detail',compact('tasks','corps'));
    }

    /**
     * @param $ename
     * @return View
     * 单平台数据详情
     */
    public function info($ename,$task_id)
    {
        $corp = $this->tasks->getCorpByEname($ename);
        $corp = $this->filterModel($corp);
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
        //担保机构
        $metas['assure'] = '';
        //担保方式
        $metas['pattern'] = '';
        //荣誉
        $metas['honour_1'] = $metas['honour_2'] = $metas['honour_3'] = '';
        $metas['honour_corp_1'] = $metas['honour_corp_2'] = $metas['honour_corp_3'] = '';
        $metas['icp_invest_cost'] = '';//投资服务费
        $metas['icp_cash_in'] = '';//提现到账
        $metas['icp_cash_door'] = '';//体现门槛
        $metas['icp_vip_cost'] = '';//vip费用
        $metas['icp_carry_time'] = '';//起息时间
        $metas['icp_payment_time'] = '';//回款时间
        $metas['icp_custody'] = '';//托管存管
        $metas['icp_overdue_ensure'] = '';//逾期/坏账保障
        $metas['icp_overdue_pay'] = '';//逾期垫付
        $metas['icp_bond'] = '';//债权转让
        if(!empty($corp->metas[0])) {
            $metas = getMetas($corp->metas, $metas);
        }
        return view('mobile.platform.info',compact('corp','metas','task_id'));
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
            $where['in']['corps.level'] = $grades[$search['grade']];
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
                $where['between']['corps.max_yield'] = $overalls[$search['overall']];
            }
        }

        if($search['time'] > 0) {
            if($search['time'] == 1) {
                $where['tasks.term <='] = 30;
                $where['tasks.term !='] = 0;
            }
            if($search['time'] == 2) {
                $where['between']['tasks.term'] = [30,90];
            }
            if($search['time'] == 3) {
                $where['between']['tasks.term'] = [90,180];
            }
            if($search['time'] == 4) {
                $where['between']['tasks.term'] = [180,365];
            }
            if($search['time'] == 5) {
                $where['tasks.term >='] = 365;
            }
        }
        $where['corps.status'] = 1;
        $where['tasks.position'] = 1;
        list($counts,$lists) = $this->tasks->getPlatformList($where,$this->perpage,$page);

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
        $corp = $this->filterModel($corp);
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
        //担保机构
        $metas['assure'] = '';
        //担保方式
        $metas['pattern'] = '';
        //荣誉
        $metas['honour_1'] = $metas['honour_2'] = $metas['honour_3'] = '';
        $metas['honour_corp_1'] = $metas['honour_corp_2'] = $metas['honour_corp_3'] = '';
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
        if($task->end_time < time()) {
            return abort(500, '项目已结束，不能投资');
        }
        if($task->begin_time > time()) {
            return abort(500, '项目未开始，不能投资');
        }

        if($task->nums <= 0) {
            return abort(500, '该项目已超出投资数，请联系运营人员');
        }
        $data['corp_id'] = $corp->id;
        $data['task_id']  = $id;
        $data['user_id'] = $this->user['id'];
        $data['ratio'] = $task->ratio;
        $data['mratio'] = $task->mratio;
        $timestamp = time();
        $sign = $this->signature($id,$task->url,$ename, $timestamp);

        $result = $this->tasks->saveReceive($data);
        if($result['status']) {
            return view('front.platform.login',compact('task','corp','sign'));
        }
        return abort(500, '异常、请联系开发人员');
    }

    public function redirect(Request $request)
    {
        if($request->isMethod('post')) {
            $signature = $request->get('signature');
            $appid = $request->get('appid');
            $nonce = $request->get('nonce');
            $timestamp = $request->get('timestamp');
            $task = $this->tasks->taskModel->find($appid);
            if(empty($task->url)) {
                return abort(500, '没有跳转的URL信息,请联系运营人员');
            }
            $newSign = $this->signature($appid, $task->url, $nonce, $timestamp);
            if($newSign['signature'] != $signature) {
                return abort(500, '签名错误');
            }
            $url = strpos($task->url, 'http') !== false ? $task->url : 'http://'.$task->url;
            return redirect($url);
        }
        return abort(500, '异常、请联系开发人员');
    }


    private function signature($appId,$url = null, $nonce = null, $timestamp = null)
    {
        $timestamp = $timestamp ? $timestamp : time();
        $sign = [
            'appId' => $appId,
            'nonceStr' => $nonce,
            'timestamp' => $timestamp,
            'url' => $url,
            'signature' => sha1("appId={$appId}&noncestr={$nonce}&timestamp={$timestamp}&url={$url}"),
        ];

        return $sign;
    }







}