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
use App\Models\AdvModel;
class AdController extends  AdminController
{
    public function __construct(
        XdataRepository $xdata,
        AdvModel $adv
    )
    {
        parent::__initalize();
        $this->xdata = $xdata;
        $this->adv = $adv;

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
            if (!empty($_FILES['img1'])){
                $type = $this->imageType($_FILES['img1']['type']);
                if($type=='no'){ return $this->error('图片错误', null, true);}
                $file_path = 'data/banner/' . uniqid() .$type;
                if (move_uploaded_file($_FILES['img1']['tmp_name'], $file_path)) {
                    $data['p_img'] = '/'.$file_path;
                }
            }
			if(!empty($_FILES['m_img1'])) {
                $type = $this->imageType($_FILES['m_img1']['type']);
                if($type=='no'){ return $this->error('图片错误', null, true);}
                $file_path = 'data/banner/' . uniqid() .$type;
                if (move_uploaded_file($_FILES['m_img1']['tmp_name'], $file_path)) {
                    $data['m_img'] = '/'.$file_path;
                }
            }
            if(!empty($data['id'])){
                if($this->adv->where('id',$data['id'])->update($data) ){
                    return $this->success('修改成功',url('ad'),true);
                }else {
                    return $this->error('修改失败', null, true);
                }
            }else{
                if($this->adv->insert($data)){
                    return $this->success('添加成功',url('ad'),true);
                }else {
                    return $this->error('添加失败', null, true);
                }
            }
        }
        if(!empty($id)) {
            $adv = $this->xdata->advModel->find($id);
            return view('admin.ad.create',compact('adv'));
        }
        return view('admin.ad.create');
    }

    public function imageType($images){
        switch ($images){
            case 'image/png' : return '.png';break;
            case 'image/jpeg' : return '.jpg';break;
            case 'image/gif' : return '.gif';break;
            case 'image/jpg'  : return '.jpg';break;
            default : return 'no';break;
        }
    }

}