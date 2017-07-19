<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:PassportController.php
 * $Author:wyw
 * $Dtime:2017/5/14
 ***********************************************************************************/

namespace App\Http\Controllers\Mobile;


use App\Events\ValidateEmail;
use App\Http\Controllers\MobileController;
use App\Library\Traits\SmsTrait;
use App\Library\Utils\Captcha;
use App\Repositories\CensusRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
class PassportController extends MobileController
{
    use SmsTrait;

    public function __construct(
        UserRepository $userRepository,
        CensusRepository $census
    )
    {
        parent::__initalize();
        $this->userRepository = $userRepository;
        $this->census = $census;
    }

    /**
     * 登录
     */
    public function signin(Request $request)
    {
        if ($request->isMethod('post')) {
            $username = $request->username;
            $password = $request->password;
            $remember = 1;
            if (!$username || !$password) return $this->error('用户名或密码错误!', '', true);

            $result = $this->userRepository->checkLogin($username, $password, false, $remember);

            if ($result['status']) {
                return $this->success('登陆成功!', url('/user/'), true);
            }

            return $this->error($result['message'], '', true);
        }
        if ($this->user) return redirect('/');
        return view('mobile.user.signin');
    }

    /**
     * 注册
     */
    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $mobile = trim($request->mobile);
            $password = trim($request->password);
//            $confirmpassword = trim($request->password_confirmation);
            $verifyCode = trim($request->verifyCode);
            //邀请人账号
            $invite = Input::get('id');
            $phoneCode = 11;//Session::get('phone');

            if (!$mobile) {
                return $this->error('手机号不能为空!', null, true);
            }
            if ($verifyCode != $phoneCode or empty($verifyCode)) {
                return $this->error('手机验证码不正确!', null, true);
            }
            if (!$password) {
                return $this->error('密码不能为空!', null, true);
            }
//            if ($password != $confirmpassword) {
//                return $this->error('两次输入密码不一致!', null, true);
//            }
            $exists = $this->userRepository->userModel->where('mobile', $mobile)->exists();
            if ($exists) {
                return $this->error('该手机号码已注册天眼投账号!', null, true);
            }
            $count = $this->userRepository->userModel->count();
            $count += 250001;
            $username = 'tyt' . $count;
            $user = $this->userRepository->userModel->where('id', $invite)->first();
            $data = [
                'username' => $username,
                'mobile' => $mobile,
                'password' => $password,
                'invite' => empty($user) ? '' : $invite,
            ];
            $result = $this->userRepository->saveUser($data);
            if ($result['status']) return $this->success('注册成功!', url('/user/'), true);
            return $this->error('注册失败!', null, true);
        }
        $stats = $this->census->getHomeStats();
        return view('mobile.user.register',compact('stats'));
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

//        $captcha = $request->get('captcha');
//        $checkCaptcha = Session::get('captcha');
        if ($action == 'm_register') {

//            if (!$captcha) {
//                return $this->error('图形验证码不能为空', null, true);
//            }
//            if (strtolower($captcha) != strtolower($checkCaptcha)) {
//                return $this->error('图形验证码不正确', null, true);
//            }
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
        Session::put('phone', $code);
        $this->sendSms($mobile, $template);

        /*try {
            $this->sendSms($mobile, $template);
            Session::put('phone', $code);
        } catch (\Exception $e) {
            $e->getMessage();

        }*/
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
                $exists = $this->userRepository->findLogin($mobile);

                if($exists['status']) return $this->success('登陆成功请稍后!', url('user'), true);

                return $this->error($exists['message'], null, true);

            }
        }
        $mobile = $request->get('phone');
        return view('mobile.user.findpassword', compact('step', 'mobile'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     *
     * 手机端重置密码
     */
    public function resetpass(Request $request)
    {
        if ($request->isMethod('post')) {
            $password = $request->get('password');

            $repeatpassword = $request->get('repeat_password');
            if (!$password || !$repeatpassword) {

               // echo "<script> alert('error');</script>";
                return $this->error('密码不能为空', null, true);

            }
            if ($password != $repeatpassword) {
                return $this->error('两次输入的密码不一致!', null, true);
            }
            try {
                $user = $this->userRepository->userModel->where('id', $this->user['id'])->first();
                if (empty($user)) {
                    return $this->error('账号不存在!', null, true);
                }
                $user->password = $password;
                $user->save();
                return $this->success('修改密码成功!', url('/user'), true);
            } catch (\Exception $e) {
                return $this->error('修改密码失败!', null, true);
            }
        }
        return view('mobile.user.resetpass');
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
