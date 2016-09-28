<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:SystemController.php
 * $Author:zxs
 * $Dtime:2016/9/8
 ***********************************************************************************/

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\AdminController;
use App\Repositories\CensusRepository;
use App\Repositories\SystemRepository;
use Illuminate\Http\Request;

class SystemController extends  AdminController
{
    public function __construct(SystemRepository $system)
    {
        parent::__initalize();
        $this->system = $system;
    }

    public function index(Request $request)
    {
        if($request->isMethod('post')) {
            $data = $request->get('data');
            $result = $this->system->saveSystemMeta($data);
            if($result['status']) {
                return $this->success('保存系统配置完成',url('system'),true);
            }
            return $this->error('保存系统信息异常，请联系开发人员');
        }
        $metas = $this->system->getSystemMetas();
        return view('admin.system.index',compact('metas'));
    }

    /**
     * @return \Illuminate\View\View
     * 角色管理
     */
    public function role()
    {
        return view('admin.system.index');
    }
}