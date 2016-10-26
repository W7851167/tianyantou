<?php
/*********************************************************************************
 *  投资记录控制器 - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By tianyantou.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:NetworthController.php
 * $Author:pzz
 * $Dtime:2016/9/13
 ***********************************************************************************/

namespace App\Http\Controllers\Account;


use App\Http\Controllers\FrontController;
use App\Repositories\CensusRepository;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class NetworthController extends FrontController
{
    public function __construct(
        TaskRepository $taskRepository,
        CensusRepository $censusRepository
    )
    {
        parent::__initalize();
        $this->taskRepository = $taskRepository;
        $this->censusRepository = $censusRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * 返回投资记录明细
     */
    public function index()
    {
        //待提交的任务
        $where = ['user_id' => $this->user['id'], 'status'=>0];
        list($count, $lists0) = $this->taskRepository->getAchievesList($where, $this->perpage);
        //待审核的任务
        $where = ['user_id' => $this->user['id'], 'status' => 2];
        list($count, $lists2) = $this->taskRepository->getAchievesList($where, $this->perpage);
        //已审核的任务
        $where = ['user_id' => $this->user['id'], 'status' => 1];
        list($count, $lists1) = $this->taskRepository->getAchievesList($where, $this->perpage);
        //已驳回的任务
        $where = ['user_id' => $this->user['id'], 'status' => 3];
        list($count, $lists3) = $this->taskRepository->getAchievesList($where, $this->perpage);

        list($unIncome, $hasIncome,$unCount) = $this->censusRepository->getUserInvestIncome($this->user['id']);
        return view('account.networth.index', compact(
            'lists0', 'lists1','lists2','lists3','lists4','unIncome','hasIncome','unCount'
        ));
    }

    /**
     * @param Request $request
     * 交任务
     */
    public function create(Request $request,$id)
    {
        $achieveModel = $this->taskRepository->taskAchieveModel->find($id);

        if(empty($achieveModel) || $achieveModel->status == 1) {
            return redirect(url('networth/index.html'));
        }
        if($request->isMethod('post')) {
            $data = $request->get('data');
            if(empty($data['order_sn']))
                return $this->error(' 请输入投资编号',null,true);
            if(empty($data['realname']))
                return $this->error(' 请添加投资人用户姓名',null,true);
            if(empty($data['mobile']))
                return $this->error('请添加投资人用户投资手机号码',null,true);
            if(empty($data['price'])) {
                return $this->error('请添加投资人投资金额',null,true);
            }
             if(!is_phone($data['mobile'])) {
                 return $this->error('请填写真实的手机号码或固定电话',null,true);
             }
            if(!is_money($data['price'])) {
                return $this->error('投资金额必须为数字或.',null,true);
            }
            if($achieveModel->corp->limit <= $achieveModel->achieves->count()) {
                return $this->error('该平台每标限定投资' . $achieveModel->corp->limit . '次', null,true);
            }
            $data['receive_id'] = $achieveModel->id;
            $data['task_id'] = $achieveModel->task_id;
            $result  = $this->taskRepository->saveAchieves($data);
            if($result['status']) {
                return $this->success($result['message'],url('networth/create',['id'=>$receiveModel->id]),true);
            }
            return $this->error($result['message'],null,true);

        }

        return view('account.networth.create',compact('receiveModel'));
    }

    /**
     * @param Request $request
     * @param $id
     * 删除提交的任务
     */
    public function delete(Request $request, $id)
    {
        $achieveModel = $this->taskRepository->taskAchieveModel->find($id);
        $result = $this->taskRepository->deleteAchieves($id);
        if($result['status']) {
            return $this->success($result['message'], url('networth/create',['id'=>$achieveModel->receive_id]));
        }
        return $this->error('删除投标信息异常');
    }
}
