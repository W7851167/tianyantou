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


use App\Events\ValidateEmail;
use App\Http\Controllers\FrontController;
use App\Jobs\SendEmailJob;
use App\Library\Traits\SmsTrait;
use App\Library\Utils\Captcha;
use App\Repositories\UserRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PassportController extends FrontController
{
    use SmsTrait;

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
                $url = Session::get('previous');
                return $this->success('登陆成功!', url($url), true);
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
            $mobile = trim($request->mobile);
            $password = trim($request->password);
            $confirmpassword = trim($request->password_confirmation);
            $verifyCode = trim($request->verifyCode);
            $invite = $request->get('invite');
            $phoneCode = Session::get('phone');
            if (!$mobile) {
                return $this->error('手机号不能为空!', null, true);
            }
            if ($verifyCode != $phoneCode) {
                return $this->error('手机验证码不正确!', null, true);
            }
            if (!$password || !$confirmpassword) {
                return $this->error('密码或确认密码不能为空!', null, true);
            }
            if ($password != $confirmpassword) {
                return $this->error('两次输入密码不一致!', null, true);
            }
            $exists = $this->userRepository->userModel->where('mobile', $mobile)->exists();
            if ($exists) {
                return $this->error('该手机号码已注册天眼投账号!', null, true);
            }
            $username = 't' . createUsername();
            $user = $this->userRepository->userModel->where('mobile', $invite)->first();
            $data = [
                'username' => $username,
                'mobile' => $mobile,
                'password' => $password,
                'invite' => empty($user) ? '' : $invite,
            ];
            $result = $this->userRepository->saveUser($data);
            if ($result['status']) return $this->success('注册成功!', url('/'), true);
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

    /**
     * @param Request $request
     * @param Captcha $captcha
     * @return \Illuminate\Http\JsonResponse
     *
     * 获取图形验证码
     */
    public function captcha(Request $request, Captcha $captcha)
    {
        if ($request->isMethod('post')) {
            $code = $request->get('captcha');;
            $checkCode = Session::get('captcha');

            if (strtolower($code) == strtolower($checkCode)) {
                return response()->json('success');
            }
            return response()->json('fail');
        }
        $captcha->doimg();
        Session::put('captcha', $captcha->getCode());
    }

    /**
     * @param Request $request
     *
     * 发送手机验证码
     */
    public function sendVerifyCode(Request $request)
    {
        $action = $request->get('action');
        $phone = $request->get('telephone');
        $captcha = $request->get('captcha');
        $checkCaptcha = Session::get('captcha');

        if ($action == 'register') {
            if (!$captcha) {
                return $this->error('图形验证码不能为空', null, true);
            }
            if (strtolower($captcha) != strtolower($checkCaptcha)) {
                return $this->error('图形验证码不正确', null, true);
            }
            $model = $this->userRepository->userModel->where('mobile', $phone)->first();
            if (!empty($model)) {
                $this->error('该手机号码已注册天眼投账号', null, true);
            }
            $mobile = [$phone];
        }
        if ($action == 'changeEmailByTelephone') {
            $mobile = [$this->user['mobile']];
        }
        if ($action == 'verifyTelephone') {
            $mobile = [$this->user['mobile']];
        }
        if ($action == 'reset_password') {
            $mobile = [$phone];
        }

        $code = randomCode();
        $template = $this->getSmsTemplates('register', $code);
        try {
            $this->sendSms($mobile, $template);
            Session::put('phone', $code);
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     *
     * 手机找回密码
     */
    public function findpassword(Request $request)
    {
        $step = $request->get('step') ?: 0;
        if ($request->isMethod('post')) {
            if ($step == 1) {
                $mobile = $request->get('mobile');
                $captcha = $request->get('captcha');
                $checkcode = Session::get('phone');
                if (!$captcha) {
                    return $this->error('验证码不能为空!', null, true);
                }
                if ($captcha != $checkcode) {
                    return $this->error('手机验证码不正确!', null, true);
                }
                $exists = $this->userRepository->userModel->where('mobile', $mobile)->exists();
                if (!$exists) {
                    return $this->error('该手机号码未注册天眼投账号!', null, true);
                }
                return $this->success('验证码正确!', url('findpassword.html?phone=' . $mobile . '&step=1'), true);
            }
        }
        $mobile = $request->get('phone');
        return view('account.passport.findpassword', compact('step', 'mobile'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     *
     * 手机找回密码重新设置密码
     */
    public function doresetpasswordphone(Request $request)
    {
        if ($request->isMethod('post')) {
            $phone = $request->get('phone');
            $password = $request->get('password');
            $repeatpassword = $request->get('repeat_password');
            if (!$password || !$repeatpassword) {
                return $this->error('新密码不能为空!', null, true);
            }
            if ($password != $repeatpassword) {
                return $this->error('两次输入的密码不一致!', null, true);
            }
            try {
                $user = $this->userRepository->userModel->where('mobile', $phone)->first();
                if (empty($user)) {
                    return $this->error('该手机号码未注册天眼投账号!', null, true);
                }
                $user->password = $password;
                $user->save();
                return $this->success('修改密码成功!', url('findpassword/doresetpasswordphone.html'), true);
            } catch (\Exception $e) {
                return $this->error('修改密码失败!', null, true);
            }
        }
        return view('account.passport.doresetpasswordphone');
    }

    /**
     * @return \Illuminate\Contracts\View\Factorypu|\Illuminate\View\View
     *  通过手机设置密码页面
     */
    public function resetByPhone(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('account.passport.phone');
        }
        return view('account.passport.reset-phone');
    }

    /**
     * 通过邮箱找回密码
     */
    public function resetByEmail(Request $request)
    {
        if ($request->isMethod('get')) {
            $step = $request->get('step') ?: 1;

            if ($step == 1) {
                return view('account.passport.resetbyemail');
            } elseif ($step == 2) {

                return view('account.passport.reset-email');
            }
        }

        return view('account.passport.reset-email');
    }

    /**
     * @param Request $request
     *
     * 检测邮箱是否存在
     */
    public function checkEmailRegisted(Request $request)
    {
        $email = $request->get('email');
        $captcha = $request->get('captcha');
        $checkcaptcha = Session::get('captcha');

        if (!$email) {
            return $this->error('请输入正确的邮箱', null, true);
        }
        if (!$captcha) {
            return $this->error('请输入验证码以发送找回邮件', null, true);
        }
        if ($captcha != $checkcaptcha) {
            return $this->error('请输入正确的验证码', null, true);
        }
        $user = $this->userRepository->userModel->where('email', $email)->first();
        if (empty($user)) {
            return $this->error('该邮箱未注册天眼投账号!', null, true);
        }
        $params = [
            'type' => 'find',
            'email' => $email,
            'username' => $user->username,
            'url' => url('findpassword/resetpasswordemail/' . authcode($user->id, 'ENCODE') . '.html')
        ];
//        $this->dispatch(new SendEmailJob($params));
        event(new ValidateEmail($params));
        return $this->success('发送邮箱验证码成功', url('findpassword/resetByEmail.html?step=2'), true);
    }


    /**
     * @param $token
     *  通过邮箱重置密码
     */
    public function setPassowrdByEmail($token)
    {
        $userId = authcode($token);
        $user = $this->userRepository->userModel->find($userId);
        if (empty($user)) {
            return redirect('findpassword/resetByEmail.html');
        }
        return view('account.passport.set-email-password', compact('token'));
    }

    /**
     * @param Request $request
     * 设置完成页面
     */
    public function complete(Request $request)
    {
        if ($request->isMethod('post')) {
            $password = $request->get('password');
            $confirmpassword = $request->get('confirm_password');
            $token = $request->get('token');
            if (!$password || !$confirmpassword) {
                return $this->error('新密码不能为空!', null, true);
            }
            if ($password != $confirmpassword) {
                return $this->error('两次输入的密码不一致!', null, true);
            }
            $user = $this->userRepository->userModel->find(authcode($token));
            if (empty($user)) {
                return $this->error('该邮箱未注册天眼投账号!', null, true);
            }
            try {
                $user->password = $password;
                $user->save();
                return $this->success('修改密码成功!', url('findpassword/doResetPasswordEmail.html'), true);
            } catch (\Exception $e) {
                return $this->error('修改密码失败!', null, true);
            }
        }
        return view('account.passport.complete-phone');
    }
}
