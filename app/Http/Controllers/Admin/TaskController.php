<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:TaskController.php
 * $Author:zxs
 * $Dtime:2016/9/8
 ***********************************************************************************/

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\AdminController;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class TaskController extends  AdminController
{
    public function __construct(
        TaskRepository $taskRepository
    ) {
        $this->taskRepository = $taskRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     * 项目列表
     */
    public function index(Request $request, $status=null)
    {
        $page = !empty($request->get('page')) ? $request->get('page') : 1;
        $where = isset($status) ? ['status'=>$status] : [];
        list($count, $lists) = $this->taskRepository->getTaskList($where, $this->perpage, $page);
        $pageHtml = $this->pager($count,$page, $this->perpage);
        return view('admin.task.index', compact('lists','pageHtml','status'));
    }

    /**
     * @param Request $request
     * @param null $id
     * @return \Illuminate\View\View|void
     * 添加创建项目
     */
    public function create(Request $request,$id=null)
    {
        if($request->isMethod('post')) {
            $data = $request->get('data');
            try {
                $this->taskRepository->taskModel->saveBy($data);
                return $this->success('创建项目完成',url('task'),true);
            } catch(\Exception $e) {
                return $this->error('创建项目异常，请联系开发人员',null, true);
            }
        }
        $corps = $this->taskRepository->getNormalCorps(['status'=>1]);
        if(!empty($id)) {
            $task = $this->taskRepository->taskModel->find($id);
            return view('admin.task.create',compact('task','corps'));
        }
        return view('admin.task.create',compact('corps'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     * 获取回收站内容项目
     */
    public function trashed(Request $request)
    {
        $page = !empty($request->get('page')) ? $request->get('page') : 1;
        $where = isset($status) ? ['status'=>$status] : [];
        list($count, $lists) = $this->taskRepository->getTaskList($where, $this->perpage, $page,2);
        $pageHtml = $this->pager($count,$page, $this->perpage);
        return view('admin.task.trashed', compact('lists','pageHtml','status'));
    }

    /**
     * @param $id
     * 还原功能
     */
    public function untrashed($id)
    {
        try {
            $this->taskRepository->untrashed($id);
                return $this->success('还原数据完成',url('task',['status'=>0]));
        } catch (\Exception $e) {
            return $this->error('还原数据异常，请联系开发人员',url('tash'));
        }
    }

    /**
     * @param $id
     * 删除任务
     */
    public function delete($id)
    {
        try{
            $this->taskRepository->taskModel->find($id)->delete();
            return $this->success('删除该项目完成',url('task/trashed'));
        } catch (\Exception $e) {
            return $this->error('删除该项目异常');
        }
    }
}