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
use App\Repositories\ApiRepository;
use App\Repositories\TaskRepository;
use App\Repositories\XdataRepository;
use GuzzleHttp\ClientInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Log;
use Cache;
use Illuminate\Routing\Controller;

class ApiController extends  AdminController
{
    public function __construct(
        ApiRepository $api,
        TaskRepository $task
    ) {
        parent::__initalize();
        $this->api = $api;
        $this->task = $task;
    }

    public function index(Request $request)
    {
        $page = !empty($request->get('page')) ? $request->get('page') : 1;
        list($counts, $lists) = $this->api->getApiList([], $this->perpage, $page);
        $pageHtml = $this->pager($counts, $page, $this->perpage);
        $corps = $this->task->corpModel->where('status', 1)->get();
        return view('admin.api.index', compact('lists', 'pageHtml','corps'));
    }

    /**
     * @param Request $request
     * @param null $id
     * @return \Illuminate\View\View|void
     * 创建编辑友情链接信息
     */
    public function create(Request $request, $id = null)
    {
        $corps = $this->task->corpModel->where('status', 1)->get();
        if ($request->isMethod('post')) {
            $data = $request->get('data');
            $result = $this->api->saveApi($data);
            if ($result['status'])
                return $this->success($result['message'], url('api'), true);
            return $this->error($result['message'], null, true);
        }

        if (!empty($id)) {
            $api = $this->api->apiModel->find($id);
            return view('admin.api.create', compact('api','corps'));
        }

        return view('admin.api.create',compact('corps'));
    }

    /**
     * @param Request $request
     * 接口结果集合
     */
    public function result(Request $request, $id)
    {
        $api = $this->api->apiModel->find($id);
        $api_key = $api->options['api_key'];
//        var_dump($api->options['api_key']);exit;
//        $options['api_url'] = 'http://api.niwodai.com/interface/callHttpInterfaces.do';
//        $result = $this->getDefaultDriver($request, $api->options);
//        $result = $this->getDefaultDriver($request, $options);var_dump($result);exit;
//        $result = json_decode($result,true);
        return view("admin.api.$api_key",compact('api','api_key'));
    }
    /**
     * 获取默认驱动
     */
    private function getDefaultDriver($request, $options)
    {
        $startTime = $request->get('start_time');
        $endTime = $request->get('end_time');
        $startTime = !empty($startTime) ? $startTime : date('Y-m-d',strtotime('- 7days'));
        $endTime = !empty($endTime) ? $endTime : date('Y-m-d');
        $params['sign'] = md5($startTime . $endTime . md5($options['api_key']));
        $params['startday'] = $startTime;
        $params['endday'] = $endTime;
        $params['type'] = $options['type'];
//        $url = $options['api_url'] . '?' . http_build_query($params);
    }


    /**
     * @param Request $request
     * 导出集合
     */
    public function excel(Request $request)
    {

    }


    /**
     * @param $id
     *  删除友情链接
     */
    public function delete($id)
    {
        try {
            if($this->api->apiModel->find($id)->delete()) {
                return $this->success('删除友情链接完成!',url('link'));
            }
            return $this->error('删除友情链接失败，请联系开发人员!');
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }
}




