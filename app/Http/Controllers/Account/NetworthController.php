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
        if($request->isMethod('post')) {
		return $this->ajaxReturn('测试提交内容');
        }
        $receiveModel = $this->taskRepository->taskReceiveModel->find($id);

        return view('account.networth.create');
    }
}
