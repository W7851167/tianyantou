<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:AchieveController.php
 * $Author:zxs
 * $Dtime:2016/9/11
 ***********************************************************************************/

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\AdminController;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class AchieveController extends  AdminController
{
    public  function  __construct(TaskRepository $taskRepository)
    {
        parent::__initalize();
        $this->taskRepository = $taskRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     * 获取任务列表
     */
    public function index(Request $request)
    {
        $page = !empty($request->get('page')) ? $request->get('page') : 1;
        list($count, $lists) = $this->taskRepository->getReceiveList([], $this->perpage, $page);
        $pageHtml = $this->pager($count,$page, $this->perpage);
        return view('admin.achieve.index', compact('lists','pageHtml'));
    }

    /**
     * @param Request $request
     * @param $id
     * 审核操作
     */
    public function create(Request $request,$id)
    {
        $receive = $this->taskRepository->taskReceiveModel->find($id);
        if($request->isMethod('post')) {
            $data  = $request->get('data');
            $data['complete_time'] = time();
            $result = $this->taskRepository->saveReceive($data);
            if($result['status'])
                return $this->success($result['message'],url('achieve'),true);
            return $this->error('审核任务异常，请联系开发人员');
        }
        return view('admin.achieve.create',compact('receive'));
    }
}