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
use App\Library\Utils\Captcha;
use App\Repositories\UserRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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
    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $rules = [
                'username' => 'required|unique:users',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
            ];
            $messages = [
                'username.required' => '请输入用户名!',
                'username.unique' => '此用户名已被注册!',
                'password.required' => '密码不能为空!',
                'password.confirmed' => '两次密码不一致!',
                'password_confirmation.required' => '请输入确认密码!',
            ];
            $data = $request->only(['username', 'password', 'password_confirmation']);
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return response()->json([
                    'statu' => 0,
                    'info' => '注册失败!',
                    'data' => $validator->errors(),
                ]);
            }
            try {
                $result = $this->userRepository->userModel->create(array_except($data, ['password_confirmation']));
                if ($result) {
                    $sessionData = [
                        'id' => $result->id,
                        'username' => $result->username,
                        'role' => $result->roles,
                    ];
                    if (!empty($result->avatar->name))
                        $sessionData['avatar'] = $result->avatar->name;
                    Session::put('user.passport', $sessionData);

                    return $this->success('注册成功!', url('/'), true);
                }
            } catch (QueryException $e) {
                $e->getMessage();
            }
            return $this->error('注册失败!', null, true);
        }
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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * 用户协议
     */
    public function protocol()
    {
        return view('account.passport.protocol');
    }

    public function captcha(Request $request, Captcha $captcha)
    {
        if ($request->isMethod('post')) {
            $code       = $request->get('captcha');;
            $checkCode    = Session::get('captcha');

            if(strtolower($code) == strtolower($checkCode)) {
                return response()->json('success');
            }
            return response()->json('fail');
        }
        $captcha->doimg();
        Session::put('captcha', $captcha->getCode());
    }

}