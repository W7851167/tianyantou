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
    public function index(Request $request, $status = null)
    {
        $page = !empty($request->get('page')) ? $request->get('page') : 1;
        $where = isset($status) ? ['status' => $status] : [];
        $str = '';
        if (!empty($request->realname)) {
            $where['realname'] = trim($request->realname);
            $query = 'realname=' . $where['realname'];
            $str .= !empty($str) ? '&' . $query : '?' . $query;
        }
        if (!empty($request->mobile)) {
            $where['mobile'] = trim($request->mobile);
            $query = 'mobile=' . $where['mobile'];
            $str .= !empty($str) ? '&' . $query : '?' . $query;
        }
        if (!empty($request->corp_id)) {
            $where['corp_id'] = $request->corp_id;
            $query = 'corp_id=' . $where['corp_id'];
            $str .= !empty($str) ? '&' . $query : '?' . $query;
        }

        if (!empty($request->task_id)) {
            $where['task_id'] = $request->task_id;
            $query = 'task_id=' . $where['task_id'];
            $str .= !empty($str) ? '&' . $query : '?' . $query;
        }

        list($count, $lists) = $this->taskRepository->getAchievesList($where, $this->perpage, $page);

        $pageHtml = $this->pager($count, $page, $this->perpage, '', $str);
        $corps = $this->taskRepository->corpModel->where('status', 1)->get();
        $tasks = $this->taskRepository->taskModel->where('status', 1)->get();
        $uri = $where ? http_build_query($where) : '';

        return view('admin.achieve.index', compact(
            'lists', 'pageHtml', 'status', 'corps', 'tasks', 'where', 'uri'
        ));
    }

    /**
     * @param Request $request
     * @param $id
     * 审核操作
     */
    public function create(Request $request, $id)
    {
        $achieves = $this->taskRepository->taskAchieveModel->find($id);
        if (empty($achieves)) {
            return $this->error('该审核任务异常，请联系开发人员');
        }

        if ($request->isMethod('post')) {
            $data = $request->get('data');
            $data['task_id'] = $achieves->task_id;
            $result = $this->taskRepository->saveAchieves($data);
            if ($result['status'])
                return $this->success($result['message'], url('achieve'), true);
            return $this->error('审核任务异常，请联系开发人员');
        }

        return view('admin.achieve.create', compact('achieves'));
    }

    public function batch($status, Request $request)
    {
        $data['ids'] = explode(',', $request->get('ids'));
        $data['status'] = $status;
        if (!$data['ids']) return $this->error('未选中任何审核记录!');

        $result = $this->taskRepository->saveBatchAchieves($data);
        if ($result['status']) {
            $errors = isset($result['data']) ? isset($result['data']['errors']) ? $result['data']['errors'] : 0 : 0;
            $message = '批量审核完成' . (count($data['ids']) - $errors) . '条记录,审核失败' . $errors . '条记录 !';
            return $this->success($message, url('achieve/1'), true);
        }
        return $this->error('批量审核失败!', null, true);
    }

    /**
     * 数据导出
     */
    public function export(Request $request)
    {
        $data = [
            ['编号', '平台名称', '任务名称', '投资人', '投资金额', '收益', '投资者手机', '状态', '投资订单号', '注册用户名', '注册手机', '提交时间']
        ];
        $status = $request->get('status');
        $where = isset($status) ? ['status' => $status] : [];
        if (!empty($request->realname)) {
            $where['realname'] = trim($request->realname);
        }
        if (!empty($request->mobile)) {
            $where['mobile'] = trim($request->mobile);
        }
        if (!empty($request->corp_id)) {
            $where['corp_id'] = $request->corp_id;
        }
        if (!empty($request->task_id)) {
            $where['task_id'] = $request->task_id;
        }
        $achieves = $this->taskRepository->taskAchieveModel->alls('*', $where, ['id' => 'desc']);
        foreach ($achieves as $achieve) {
            $item = [
                $achieve->id ?: '',
                !empty($achieve->corp) ? $achieve->corp->name : '',
                !empty($achieve->task) ? $achieve->task->title ?: '' : '',
                $achieve->realname ?: '',
                $achieve->price ?: 0.00,
                $achieve->income ?: 0.00,
                $achieve->mobile ?: '',
                !empty($achieve->status) ? $achieve->status == 1 ? '已完成' : '已驳回' : '待审核',
                $achieve->order_sn ?: '',
                !empty($achieve->user) ? $achieve->user->username ?: '' : '',
                !empty($achieve->user) ? $achieve->user->mobile ?: '' : '',
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