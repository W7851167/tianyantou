<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:CensusController.php
 * $Author:zxs
 * $Dtime:2016/9/8
 ***********************************************************************************/

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\AdminController;
use App\Repositories\CensusRepository;
use Illuminate\Http\Request;

class CensusController extends AdminController
{
    public function __construct(CensusRepository $census)
    {
        parent::__initalize();
        $this->census = $census;;
    }

    public function index(Request $request)
    {
        $startTime = $request->get('start_time');
        $endTime = $request->get('end_time');
        $corpId = $request->get('corp_id');
        $taskId = $request->get('task_id');
        $startTime = !empty($startTime) ? strtotime($startTime . ' 00:00:01') : strtotime('-7 days', time());
        $endTime = !empty($endTime) ? strtotime($endTime . ' 23:59:59') : time();
        $corpId = !empty($corpId) ? $corpId : 0;
        $taskId = !empty($taskId) ? $taskId : 0;
        $title = date('Y-m-d', (int)$startTime) . '至' . date('Y-m-d', (int)$endTime) . '任务统计';
        $data = $this->getCalendar($startTime, $endTime);
        foreach ($data as $i => $item) {
            $census[0][] = $this->census->getTaskReceiveStats(0, $item[0], $item[1], $corpId, $taskId);
            $census[1][] = $this->census->getTaskReceiveStats(1, $item[0], $item[1], $corpId, $taskId);
            $census[2][] = $this->census->getTaskReceiveStats(2, $item[0], $item[1], $corpId, $taskId);
        }
        $categorys = array_keys($data);

        $corps = $this->census->corpModel->where('status', 1)->get();
        $tasks = $this->census->taskModel->where('status', 1)->get();

        $where = ['status' => 1];
        $taskstats = $this->census->getTaskStats($where);

        return view('admin.census.index', compact(
            'categorys', 'census', 'startTime', 'endTime', 'title', 'corps', 'tasks', 'taskstats'
        ));
    }

    /**
     * @param Request $request
     * 注册统计
     */
    public function register(Request $request)
    {
        $startTime = $request->get('start_time');
        $endTime = $request->get('end_time');
        $startTime = !empty($startTime) ? strtotime($startTime . ' 00:00:01') : strtotime('-7 days', time());
        $endTime = !empty($endTime) ? strtotime($endTime . ' 23:59:59') : time();
        $title = date('Y-m-d', (int)$startTime + 24 * 60 * 60) . '至' . date('Y-m-d', (int)$endTime) . '注册用户统计';
        $data = $this->getCalendar($startTime, $endTime);
        foreach ($data as $i => $item) {
            $data[$i] = $this->census->getRegisterUserStats($item[0], $item[1]);
        }
        $categorys = array_keys($data);
        $census = array_values($data);
        return view('admin.census.register', compact('categorys', 'census', 'startTime', 'endTime', 'title'));
    }

    /**
     * @param $startTime
     * @param $endTime
     * 获取开始和结束的天数
     */
    private function getCalendar($startTime, $endTime)
    {
        $days = ($endTime - $startTime) / (24 * 60 * 60);
        for ($i = 1; $i <= $days; $i++) {
            $date = date('Y-m-d', strtotime('+' . $i . 'days', $startTime));
            $data[$date] = [$date . ' 00:00:01', $date . ' 23:59:59'];
        }
        return $data;
    }
}