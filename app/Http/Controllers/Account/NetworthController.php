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
        $where = ['user_id' => $this->user['id']];
        //待提交的任务
        list($count, $lists) = $this->taskRepository->getReceiveList($where, $this->perpage);
        $pageHtml = $this->pager($count);
        //待审核的任务
        $where['status'] = 0;
        list($count, $lists0) = $this->taskRepository->getAchievesList($where, $this->perpage);
        $pageHtml0 = $this->pager($count);
        //完成的任务
        $where['status'] = 1;
        list($count, $lists1) = $this->taskRepository->getAchievesList($where, $this->perpage);
        $pageHtml1 = $this->pager($count);
        //驳回的任务
        $where['status'] = 2;
        list($count, $lists2) = $this->taskRepository->getAchievesList($where, $this->perpage);
        $pageHtml2 = $this->pager($count);

        list($unIncome, $hasIncome, $unCount) = $this->censusRepository->getUserInvestIncome($this->user['id']);
        return view('account.networth.index', compact(
            'lists', 'pageHtml', 'lists0', 'lists1', 'lists2', 'pageHtml0', 'pageHtml1', 'pageHtml2', 'unIncome', 'hasIncome', 'unCount'
        ));
    }

    /**
     * @param Request $request
     * 提交任务
     */
    public function create(Request $request, $id)
    {
        $receiveModel = $this->taskRepository->taskReceiveModel->find($id);

        if (empty($receiveModel) || $receiveModel->status == 1) {
            return redirect(url('networth/index.html'));
        }
        if ($request->isMethod('post')) {
            $data = $request->get('data');
            if (empty($data['order_sn']))
                return $this->error(' 请输入投资编号', null, true);
            if (empty($data['realname']))
                return $this->error(' 请添加投资人用户姓名', null, true);
            if (empty($data['mobile']))
                return $this->error('请添加投资人用户投资手机号码', null, true);
            if (empty($data['price'])) {
                return $this->error('请添加投资人投资金额', null, true);
            }
            if (!is_phone($data['mobile'])) {
                return $this->error('请填写真实的手机号码或固定电话', null, true);
            }
            if (!is_money($data['price'])) {
                return $this->error('投资金额必须为数字或.', null, true);
            }
            if ($receiveModel->corp->limit <= $receiveModel->achieves->count()) {
                return $this->error('该平台每标限定投资' . $receiveModel->corp->limit . '次', null, true);
            }
            $data['receive_id'] = $receiveModel->id;
            $data['task_id'] = $receiveModel->task_id;
            $data['user_id'] = $this->user['id'];
            $data['corp_id'] = $receiveModel->corp_id;
            $data['status'] = 0;
            $count = $this->taskRepository->taskAchieveModel
                ->where('user_id', $this->user['id'])
                ->where('receive_id', $receiveModel->id)
                ->where('realname', $data['realname'])
                ->where('mobile', $data['mobile'])->count();
            if ($count > 0) {
                return $this->error('用户名' . $data['realname'] . '和手机号' . $data['mobile'] . '已提交过', null, true);
            }

            $result = $this->taskRepository->saveAchieves($data);
            if ($result['status']) {
                return $this->success($result['message'], url('networth/create', ['id' => $receiveModel->id]), true);
            }
            return $this->error($result['message'], null, true);

        }

        return view('account.networth.create', compact('receiveModel'));
    }

    public function show($id, Request $request)
    {
        $achieveModel = $this->taskRepository->taskAchieveModel->find($id);

        if (empty($achieveModel)) {
            return redirect(url('networth/index.html'));
        }

        if ($request->isMethod('post')) {
            if ($achieveModel != 2) {
                return $this->error('该投标信息不能修改,请联系开发人员', null, true);
            }
            $data = $request->get('data');
            try {
                $result = $this->taskRepository->taskAchieveModel->updateBy($data, ['id' => $id]);
                if ($result) return $this->success('重新提交投标信息成功!', url('networth/show', ['id' => $id]), true);
            } catch (\Exception $e) {
                $e->getMessage();
            }
            return $this->error('重新提交投标信息失败!', null, true);
        }

        return view('account.networth.show', compact('achieveModel'));
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
        if ($result['status']) {
            return $this->success($result['message'], url('networth/create', ['id' => $achieveModel->receive_id]));
        }
        return $this->error('删除投标信息异常');
    }
}
