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

    public function create(Request $request, $id = null)
    {
        if (!empty($id)) {
            $link = $this->xdata->linkModel->find($id);
            return view('admin.link.create', compact('link'));
        }
        return view('admin.link.create');
    }
}




