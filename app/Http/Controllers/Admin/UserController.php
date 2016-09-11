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
use Illuminate\Http\Request;

class UserController extends  AdminController
{
    public function __construct(UserRepository $userRepository)
    {
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
        list($counts, $lists) = $this->userRepository->getUserList($where,$this->perpage, $page);
        $pageHtml = $this->pager($counts, $page, $this->perpage);
        return view('admin.user.index',compact('lists','pageHtml'));
    }

    /**
     * @param Request $request
     * @param $id
     * 给用户添加积分
     */
    public function score(Request $request, $id)
    {
        $user = $this->userRepository->userModel->find($id);
        if($request->isMethod('post')) {
            $data = $request->get('data');
            $result = $this->userRepository->saveScore($data);
            if($result['status'])
                return $this->success($result['message'],url('user'), true);
            return $this->error('给用户添加积分异常，请联系开发人员');
        }
        return view('admin.user.score',compact('user'));
    }

}