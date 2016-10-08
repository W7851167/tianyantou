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
use App\Repositories\AdminRepository;
use App\Repositories\CensusRepository;
use App\Repositories\SystemRepository;
use Illuminate\Http\Request;

class SystemController extends  AdminController
{
    public function __construct(
        SystemRepository $system,
        AdminRepository $admin
    ) {
        parent::__initalize();
        $this->system = $system;
        $this->admin = $admin;
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
    public function role(Request $request)
    {
        $page = !empty($request->get('page')) ? $request->get('page') : 1;
        list($counts, $lists) = $this->admin->getRoleList([],$this->perpage, $page);
        $page = $this->pager($counts);
        return view('admin.system.role',compact('page','lists'));
    }

    /**
     * @param Request $request
     * @param null $id
     * 获取所有权限
     */
    public function redit(Request $request,$id=null)
    {
        if($request->isMethod('post')) {
            $data = $request->get('data');
            if(empty($data['roles'])) {
                return $this->error('请选择相应选线',null,true);
            }
            if(empty($data['name'])) {
                return $this->error('请输入权限组名称',null,true);
            }
            if(!empty($data['roles'])) {
                $data['roles'] = implode(',',$data['roles']);
            }
            if($this->admin->saveRole($data)) {
                return $this->success('创建或编辑用户角色完成',url('system/role'),true);
            }
            return $this->error('创建或编辑用户角色异常，请联系管理员',null,true);
        }
        $roles = config('menu.menu');
        if(!empty($id)) {
            $roleModel = $this->admin->roleModel->find($id);
            return view('admin.system.redit',compact('roles','roleModel'));
        }

        return view('admin.system.redit',compact('roles'));
    }

    /**
     * @param $id
     * 删除角色
     */
    public function rdelete($id)
    {
        $roleModel = $this->admin->roleModel->find($id);
        if(empty($roleModel)) {
            return $this->error('未找到该角色，删除异常',url('system/role'));
        }
        if(count($roleModel->users) > 0) {
            return $this->error('该角色已有管理员，不能删除', url('system/role'));
        }
        if($roleModel->delete()) {
            return $this->success('删除角色完成',url('system/role'));
        }
        return $this->error('删除该角色异常，请联系开发人员',url('system/role'));
    }
}