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
use App\Repositories\XdataRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LinkController extends  AdminController
{
    public function __construct(XdataRepository $xdata)
    {
        parent::__initalize();
        $this->xdata = $xdata;
    }

    public function index(Request $request)
    {
        $page = !empty($request->get('page')) ? $request->get('page') : 1;
        list($counts, $lists) = $this->xdata->getLinkList([], $this->perpage, $page);
        $pageHtml = $this->pager($counts, $page, $this->perpage);
        return view('admin.link.index', compact('lists', 'pageHtml'));
    }

    /**
     * @param Request $request
     * @param null $id
     * @return \Illuminate\View\View|void
     * 创建编辑友情链接信息
     */
    public function create(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->get('data');
            $result = $this->xdata->saveLink($data);
            if ($result['status'])
                return $this->success($result['message'], url('link'), true);
            return $this->error($result['message'], null, true);
        }

        if (!empty($id)) {
            $link = $this->xdata->linkModel->find($id);
            return view('admin.link.create', compact('link'));
        }

        return view('admin.link.create');
    }


    /**
     * @param $id
     *  删除友情链接
     */
    public function delete($id)
    {
        try {
            if($this->xdata->linkModel->find($id)->delete()) {
                return $this->success('删除友情链接完成!',url('link'));
            }
            return $this->error('删除友情链接失败，请联系开发人员!');
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }
}




