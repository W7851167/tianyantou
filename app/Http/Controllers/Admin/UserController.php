<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:UserController.php
 * $Author:zxs
 * $Dtime:2016/9/8
 ***********************************************************************************/

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\AdminController;
use App\Repositories\UserRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class UserController extends AdminController
{
    public function __construct(
        UserRepository $userRepository
    )
    {
        parent::__construct();
        $this->userRepository = $userRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     * 用户列表页面
     */
    public function index(Request $request)
    {
        $page = !empty($request->get('page')) ? $request->get('page') : 1;
        $where['roles'] = '用户';
        list($counts, $lists) = $this->userRepository->getUserList($where, $this->perpage, $page);
        $pageHtml = $this->pager($counts, $page, $this->perpage);
        return view('admin.user.index', compact('lists', 'pageHtml'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     *
     * 更新用户信息
     */
    public function edit($id, Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->get('data');
            try {
                $result = $this->userRepository->userModel->saveBy($data);
                if ($result) return $this->success('更新用户信息成功!', url('user'), true);
            } catch (QueryException $e) {
                $e->getMessage();
            }
            return $this->error('更新用户信息失败!', null, true);
        }
        $user = $this->userRepository->userModel->find($id);

        $area[] = !empty($user->province) ? $user->province : '省';
        $area[] = !empty($user->city) ? $user->city : '市';

        return view('admin.user.edit', compact('user'));
    }

    /**
     * @param Request $request
     * @param $id
     * 给用户添加积分
     */
    public function score(Request $request, $id)
    {
        $user = $this->userRepository->userModel->find($id);
        if ($request->isMethod('post')) {
            $data = $request->get('data');
            $result = $this->userRepository->saveScore($data);
            if ($result['status'])
                return $this->success($result['message'], url('user'), true);
            return $this->error('给用户添加积分异常，请联系开发人员');
        }
        return view('admin.user.score', compact('user'));
    }

}