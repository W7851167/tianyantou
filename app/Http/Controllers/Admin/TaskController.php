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
use Symfony\Component\HttpFoundation\Request;

class TaskController extends  AdminController
{
    public function __construct(
        TaskRepository $taskRepository
    ) {
        $this->taskRepository = $taskRepository;
    }

    public function index(Request $request)
    {
        $page = !empty($request->get('page')) ? $request->get('page') : 1;
        list($count, $lists) = $this->taskRepository->getTaskList([], $this->perpage, $page);
        $pageHtml = $this->pager($count,$page, $this->perpage);
        return view('admin.task.index', compact('lists','pageHtml'));
    }

    public function create(Request $request,$id=null)
    {
        if($request->isMethod('post')) {
            $data = $request->get('data');
        }
        $corps = $this->taskRepository->getNormalCorps(['status'=>1]);
        if(!empty($id)) {
            $task = $this->taskRepository->taskModel->find($id);
            return view('admin.task.create',compact('task','corps'));
        }
        return view('admin.task.create',compact('corps'));
    }
}