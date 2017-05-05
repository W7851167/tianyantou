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

class TaskController extends AdminController
{
    public function __construct(
        TaskRepository $taskRepository
    )
    {
        parent::__initalize();
        $this->taskRepository = $taskRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     * 项目列表
     */
    public function index(Request $request, $status = null)
    {
        $page = !empty($request->get('page')) ? $request->get('page') : 1;
        $where = isset($status) ? ['status' => $status] : [];
        $str = '';
        if ($request->name) {
            $corpids = $this->taskRepository->corpModel->where('name', trim($request->name))->lists('id')->all();
            $where['in'] = ['corp_id' => $corpids];
            $query = 'name=' . trim($request->name);
            $str .= !empty($str) ? '&' . $query : '?'.$query;
        }
        if ($request->title) {
            $where['title'] = trim($request->title);
            $query = 'title=' . trim($request->title);
            $str .= !empty($str) ? '&' . $query : '?'.$query;
        }
        list($count, $lists) = $this->taskRepository->getTaskList($where, $this->perpage, $page);
        $pageHtml = $this->pager($count, $page, $this->perpage,null,$str);
        return view('admin.task.index', compact('lists', 'pageHtml', 'status'));
    }

    /**
     * @param Request $request
     * @param null $id
     * @return \Illuminate\View\View|void
     * 添加创建项目
     */
    public function create(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->get('data');
            if (!empty($data['start_time']))
                $data['start_time'] = strtotime($data['start_time']);
            if (!empty($data['end_time']))
                $data['end_time'] = strtotime($data['end_time']);
            if (!empty($data['home_img']))
                $data['home_img'] = str_replace(config('app.static_url'), '', $data['home_img']);

            $result = $this->taskRepository->saveTask($data);
            if ($result['status']) {
                return $this->success($result['message'], url('task'), true);
            }
            return $this->error('创建项目异常，请联系开发人员', null, true);
        }
        $corps = $this->taskRepository->getNormalCorps(['status' => 1]);
        if (!empty($id)) {
            $task = $this->taskRepository->taskModel->find($id);
            return view('admin.task.create', compact('task', 'corps'));
        }
        return view('admin.task.create', compact('corps'));
    }

	/**
     * @param Request $request
     * @param null $id
     * @return \Illuminate\View\View|void
     * 项目收益计算
     */
    public function income(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->get('data');

            $result = $this->taskRepository->saveTask($data);
            if ($result['status']) {
                return $this->success($result['message'], url('task'), true);
            }
            return $this->error('创建项目收益异常，请联系开发人员', null, true);
        }
        $corps = $this->taskRepository->getNormalCorps(['status' => 1]);
        if (!empty($id)) {
            $task = $this->taskRepository->taskModel->find($id);
            return view('admin.task.income', compact('task', 'corps'));
        }
        return view('admin.task.income', compact('corps'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     * 获取回收站内容项目
     */
    public function trashed(Request $request)
    {
        $page = !empty($request->get('page')) ? $request->get('page') : 1;
        $where = isset($status) ? ['status' => $status] : [];
        list($count, $lists) = $this->taskRepository->getTaskList($where, $this->perpage, $page, 2);
        $pageHtml = $this->pager($count, $page, $this->perpage);
        return view('admin.task.trashed', compact('lists', 'pageHtml', 'status'));
    }

    /**
     * @param $id
     * 还原功能
     */
    public function untrashed($id)
    {
        $result = $this->taskRepository->untrashed($id);
        if ($result['status']) {
            return $this->success($result['message'], url('task', ['status' => 0]));
        }
        return $this->error('还原数据异常，请联系开发人员', url('tash'));
    }

    /**
     * @param $id
     * 删除任务
     */
    public function delete($id)
    {
        $result = $this->taskRepository->deleteTask($id);
        if ($result['status'])
            return $this->success($result['message'], url('task/trashed'));
        return $this->error($result['message']);

    }
}