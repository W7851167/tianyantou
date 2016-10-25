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
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SystemController extends AdminController
{
    public function __construct(
        SystemRepository $system,
        AdminRepository $admin,
        UserRepository $userRepository
    )
    {
        parent::__initalize();
        $this->system = $system;
        $this->admin = $admin;
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->get('data');
            $result = $this->system->saveSystemMeta($data);
            if ($result['status']) {
                return $this->success('保存系统配置完成', url('system'), true);
            }
            return $this->error('保存系统信息异常，请联系开发人员');
        }
        $metas = $this->system->getSystemMetas();
        return view('admin.system.index', compact('metas'));
    }

    /**
     * @return \Illuminate\View\View
     * 角色管理
     */
    public function role(Request $request)
    {
        $page = !empty($request->get('page')) ? $request->get('page') : 1;
        list($counts, $lists) = $this->admin->getRoleList([], $this->perpage, $page);
        $page = $this->pager($counts);
        return view('admin.system.role', compact('page', 'lists'));
    }

    /**
     * @param Request $request
     * @param null $id
     * 获取所有权限
     */
    public function redit(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->get('data');
            if (empty($data['roles'])) {
                return $this->error('请选择相应选线', null, true);
            }
            if (empty($data['name'])) {
                return $this->error('请输入权限组名称', null, true);
            }
            if (empty($id) && !empty($data['roles'])) {
                $data['roles'] = implode(',', $data['roles']);
            }
            if ($this->admin->saveRole($data)) {
                return $this->success('创建或编辑用户角色完成', url('system/role'), true);
            }
            return $this->error('创建或编辑用户角色异常，请联系管理员', null, true);
        }
        $roles = config('menu.menu');
        if (!empty($id)) {
            $roleModel = $this->admin->roleModel->find($id);
            return view('admin.system.redit', compact('roles', 'roleModel'));
        }

        return view('admin.system.redit', compact('roles'));
    }

    /**
     * @param $id
     * 删除角色
     */
    public function rdelete($id)
    {
        $roleModel = $this->admin->roleModel->find($id);
        if (empty($roleModel)) {
            return $this->error('未找到该角色，删除异常', url('system/role'));
        }
        if (count($roleModel->users) > 0) {
            return $this->error('该角色已有管理员，不能删除', url('system/role'));
        }
        if ($roleModel->delete()) {
            return $this->success('删除角色完成', url('system/role'));
        }
        return $this->error('删除该角色异常，请联系开发人员', url('system/role'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * 管理员列表
     */
    public function user(Request $request)
    {
        $page = !empty($request->get('page')) ? $request->get('page') : 1;
        $where['roles >'] = 0;
        list($counts, $lists) = $this->userRepository->getUserList($where, $this->perpage, $page);
        $pageHtml = $this->pager($counts, $page, $this->perpage);

        return view('admin.system.user', compact('pageHtml', 'lists'));
    }

    /**
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     *
     * 更新管理员
     */
    public function uedit(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->get('data');
            $rules = [
                'username' => $id ? 'required|unique:users' : 'required|unique:users,username,' . $id,
                'roles' => 'required',
                'password' => 'required|confirmed|min:6|max:16',
                'password_confirmation' => 'required',
            ];
            $messages = [
                'username.required' => '请填写用户名!',
                'username.unique' => '该用户名已经存在!',
                'roles.required' => '请选择角色!',
                'password.required' => '请填写密码!',
                'password_confirmation.required' => '请输入确认密码!',
                'password.confirmed' => '两次密码不一致!',
                'password.min' => '密码长度不能小于6位!',
                'password.max' => '密码长度不能大于16位',
            ];
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return $this->error($validator->errors()->first(), null);
            }
            unset($data['password_confirmation']);
            try {
                $result = $this->userRepository->userModel->edit($data);
                if ($result) return $this->success('添加管理员成功!', url('system/user'));
            } catch (\Exception $e) {
                $e->getMessage();
            }
            return $this->error('添加管理员失败!', null);
        }

        if ($id) {
            $usermodel = $this->userRepository->userModel->find($id);
        }

        list($counts, $roles) = $this->admin->getRoleList([]);

        return view('admin.system.uedit', compact('usermodel', 'roles'));
    }

    /**
     * @param $id
     *
     * 删除管理员
     */
    public function udelete($id)
    {
        $usermodel = $this->userRepository->userModel->find($id);
        if (empty($usermodel)) {
            return $this->error('未找到该管理员,删除异常!', url('systme/user'));
        }
        if ($usermodel->delete()) {
            return $this->success('删除管理员完成!', url('system/user'));
        }
        return $this->error('删除该管理员异常,请联系开发人员', url('system/user'));
    }
}