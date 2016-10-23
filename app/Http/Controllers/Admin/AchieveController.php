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
use Maatwebsite\Excel\Facades\Excel;

class AchieveController extends AdminController
{
    public function __construct(TaskRepository $taskRepository)
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
        $where = [];
        if ($request->realname) {
            $receiveids = $this->taskRepository->taskAchieveModel->where('realname', ($request->realname))->lists('receive_id')->all();
            $where['in'] = ['id' => $receiveids];
        }
        if ($request->mobile) {
            $receiveids = $this->taskRepository->taskAchieveModel->where('mobile', ($request->mobile))->lists('receive_id')->all();
            $where['in'] = ['id' => $receiveids];
        }
        list($count, $lists) = $this->taskRepository->getReceiveList($where, $this->perpage, $page);
        $pageHtml = $this->pager($count, $page, $this->perpage);
        return view('admin.achieve.index', compact('lists', 'pageHtml'));
    }

    /**
     * @param Request $request
     * @param $id
     * 审核操作
     */
    public function create(Request $request, $id)
    {
        $receive = $this->taskRepository->taskReceiveModel->find($id);
        if ($request->isMethod('post')) {
            $data = $request->get('data');
            $data['complete_time'] = time();
            $data['task_id'] = $receive->task_id;
            $result = $this->taskRepository->saveReceive($data);
            if ($result['status'])
                return $this->success($result['message'], url('achieve'), true);
            return $this->error('审核任务异常，请联系开发人员');
        }
        if (empty($receive)) {
            return $this->error('该审核任务异常，请联系开发人员');
        }

        return view('admin.achieve.create', compact('receive'));
    }

    /**
     * 数据导出
     */
    public function export()
    {
        $data = [
            ['编号', '平台名称', '任务名称', '投资人', '投资者手机', '投资金额', '投资订单号', '提交时间']
        ];
        $achieves = $this->taskRepository->taskAchieveModel->get();
        foreach ($achieves as $achieve) {
            $item = [
                $achieve->id ?: '',
                !empty($achieve->receive) ? !empty($achieve->receive->corp) ? $achieve->receive->corp->name : '' : '',
                !empty($achieve->task) ? $achieve->task->title ?: '' : '',
                $achieve->realname ?: '',
                $achieve->mobile ?: '',
                $achieve->price ?: 0.00,
                $achieve->order_sn ?: '',
                $achieve->created_at ?: '',
            ];
            array_push($data, $item);
        }
        $title = '投资记录';
        Excel::create($title, function ($excel) use ($data) {
            $excel->sheet('receives', function ($sheet) use ($data) {
                $sheet->rows($data);
            });
        })->export('xls');
    }
}