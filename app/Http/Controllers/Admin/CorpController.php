<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:CorpController.php
 * $Author:zxs
 * $Dtime:2016/9/8
 ***********************************************************************************/

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\AdminController;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class CorpController extends AdminController
{

    public function __construct(
        TaskRepository $taskRepository
    ){

        $this->taskRepository = $taskRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     * 公司列表
     */
    public function index(Request $request)
    {
        $page = !empty($request->get('page')) ? $request->get('page') : 1;
        list($count, $lists) = $this->taskRepository->getCorpList([], $this->perpage, $page);
        $pageHtml = $this->pager($count,$page, $this->perpage);
        return view('admin.corp.index', compact('lists','pageHtml'));
    }

    /**
     * @return \Illuminate\View\View
     * 创建公司信息
     */
    public function create(Request $request, $id=null)
    {
        if($request->isMethod('post')) {
            $data = $request->get('data');
            try {
                if(!empty($data['logo']))
                    $data['logo'] = str_replace(config('app.img_url'), '', $data['logo']);
                if(!empty($data['platform_logo']))
                    $data['platform_logo'] = str_replace(config('app.img_url'), '', $data['platform_logo']);
                $this->taskRepository->saveCorp($data);
                return $this->success('创建公司信息完成',url('corp'),true);
            } catch (\Exception $e) {
                return $this->error($e->getMessage(),null,true);
            }
        }
        if(!empty($id)) {
            $corp = $this->taskRepository->corpModel->find($id);
            $area[] = !empty($corp->province) ? $corp->province : '省';
            $area[] =  !empty($corp->city) ? $corp->city : '市';
            $area[] = !empty($corp->county) ? $corp->county : '区';
            $area = json_encode($area);
            return view('admin.corp.create',compact('corp','area'));
        }
        return view('admin.corp.create');
    }

    /**
     * @param $id
     * 编辑公司信息
     */
    public function edit($id)
    {
        return view('admin.corp.edit');
    }

}