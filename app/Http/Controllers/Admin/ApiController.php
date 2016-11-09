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
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

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




