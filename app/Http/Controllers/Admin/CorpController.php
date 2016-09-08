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
        $pageHtml = $this->pager($count,$this->perpage, $page);
        return view('admin.corp.index', compact('lists','pageHtml'));
    }

    /**
     * @return \Illuminate\View\View
     * 创建公司信息
     */
    public function create()
    {
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