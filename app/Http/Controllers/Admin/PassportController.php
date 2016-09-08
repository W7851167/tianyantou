<?php
/*********************************************************************************
 *  后台登陆控制器
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:BaseModel.php
 * $Author:pzz
 * $Dtime:2016/9/7
 ***********************************************************************************/

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\AdminController;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class PassportController extends AdminController
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
     * @return \Illuminate\View\View|void
     *
     * 验证登陆
     */
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {

            $username = $request->username;
            $password = $request->password;
            $remember = $request->remember;

            if (!$username || !$password) return $this->error('用户名或密码错误!', '', true);

            $result = $this->userRepository->checkLogin($username, $password, $remember);

            if ($result['status']) {
                return $this->success('登陆成功!', url('dashboard'), true);
            }

            return $this->error('用户名或密码错误!', '', true);
        }

        return view('admin.passport.index');
    }

    /**
     * @return string
     * 退出系统
     */
    public function logout()
    {
        if ($this->userRepository->logout()) {
            return redirect(url('passport/login'));
        }
    }

    public function password(Request $request)
    {
        if ($request->isMethod('post')) {
            $old = $request->get('old');
            $new = $request->get('new');
            $confirmation = $request->get('confirmation');
            if ($new !== $confirmation)
                return back()->with('errors', '两次密码不正确!');

            $userModel = $this->userRepository->userModel->find($this->user['id']);
            if (!password_verify($old, $userModel->password ?: ''))
                return back()->with('errors', '原密码不正确!');

            try {
            $result = $this->userRepository->userModel->whereId($this->user['id'])
                ->update(['password' => \Hash::make($new)]);
            if ($result) {
                $this->userRepository->logout();
                return redirect('passport/login');
            }
            } catch (\Exception $e) {
                $e->getMessage();
            }
            return back()->with('errror', '修改密码失败!');
        }

        return view('admin.passport.forget_password');
    }
}
