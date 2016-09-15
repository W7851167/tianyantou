<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:PassportController.php
 * $Author:zxs
 * $Dtime:2016/9/11
 ***********************************************************************************/

namespace App\Http\Controllers\Account;


use App\Http\Controllers\FrontController;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class PassportController extends FrontController
{
    public function __construct(
        UserRepository $userRepository
    )
    {
        parent::__initalize();
        $this->userRepository = $userRepository;
    }

    /**
     * 登录
     */
    public function signin(Request $request)
    {
        if ($request->isMethod('post')) {

            $username = $request->username;
            $password = $request->password;
            $remember = $request->remember;

            if (!$username || !$password) return $this->error('用户名或密码错误!', '', true);

            $result = $this->userRepository->checkLogin($username, $password, false, $remember);

            if ($result['status']) {
                return $this->success('登陆成功!', url('/'), true);
            }

            return $this->error($result['message'], '', true);
        }

        if ($this->user) return redirect('/');

        return view('account.passport.signin');
    }

    /**
     * 注册
     */
    public function register()
    {
        return view('account.passport.register');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     *
     * 退出登录
     */
    public function signout()
    {
        if ($this->userRepository->logout()) {
            return redirect(url('signin.html'));
        }
    }

    public function captcha()
    {

    }

}