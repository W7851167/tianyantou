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

class AdController extends  AdminController
{
    public function __construct(XdataRepository $xdata)
    {
        parent::__initalize();
        $this->xdata = $xdata;
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     * 广告列表
     */
    public function index(Request $request)
    {
        $page = !empty($request->get('page')) ? $request->get('page') : 1;
        list($count, $lists) = $this->xdata->getAdvList([], $this->perpage, $page);
        $pageHtml = $this->pager($count,$page, $this->perpage);
        return view('admin.ad.index',compact('lists','pageHtml'));
    }


    /**
     * @return \Illuminate\View\View
     * 创建广告信息
     */
    public function create(Request $request, $id=null)
    {
        if($request->isMethod('post')) {
            $data = $request->get('data');
            if(!empty($data['img']))
                $data['img'] = str_replace(config('app.static_url'), '', $data['img']);
            $result = $this->xdata->saveAdv($data);
            if($result['status'])
                return $this->success($result['message'],url('ad'),true);
            return $this->error($result['message'],null,true);
        }
        if(!empty($id)) {
            $adv = $this->xdata->advModel->find($id);
            return view('admin.ad.create',compact('adv'));
        }
        return view('admin.ad.create');
    }

}