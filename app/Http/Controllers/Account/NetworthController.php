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
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class NetworthController extends FrontController
{
    public function __construct(
        TaskRepository $taskRepository
    )
    {
        parent::__initalize();
        $this->taskRepository = $taskRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * 返回投资记录明细
     */
    public function index()
    {
        $where = ['user_id' => $this->user['id'], 'in' => ['status' => [0, 1]]];
        list($count, $iLists) = $this->taskRepository->getReceiveList($where, $this->perpage);

        $where = ['user_id' => $this->user['id'], 'status' => 2];
        list($count, $cLists) = $this->taskRepository->getReceiveList($where, $this->perpage);

        return view('account.networth.index', compact(
            'iLists', 'cLists'
        ));
    }

    /**
     * @param Request $request
     * 交任务
     */
    public function create(Request $request,$id)
    {
        $receiveModel = $this->taskRepository->taskReceiveModel->find($id);
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
            if($receiveModel->corp->limit <= $receiveModel->achieves->count()) {
                return $this->error('该平台每标限定投资' . $receiveModel->corp->limit . '次', null,true);
            }
            $data['receive_id'] = $receiveModel->id;
            $data['task_id'] = $receiveModel->task_id;
            $data['invest_time'] = strtotime($data['invest_time']);
            $result  = $this->taskRepository->saveAchieves($data);
            if($result['status']) {
                return $this->success($result['message'],url('networth/create/10'),true);
            }
            return $this->error($result['message'],null,true);

        }

        return view('account.networth.create',compact('receiveModel'));
    }
}
