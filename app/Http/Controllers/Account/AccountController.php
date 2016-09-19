<?php
/*********************************************************************************
 *  账户管理控制器 - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By tianyantou.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:AccountController.php
 * $Author:pzz
 * $Dtime:2016/9/13
 ***********************************************************************************/

namespace App\Http\Controllers\Account;


use App\Events\ValidateEmail;
use App\Http\Controllers\FrontController;
use App\Repositories\UserRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AccountController extends FrontController
{
    public function __construct(
        UserRepository $userRepository
    )
    {
        parent::__initalize();
        $this->userRepository = $userRepository;
    }

    public function safe()
    {
        return view('account.account.safe');
    }

    public function bankcard()
    {
        return view('account.account.bankcard');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View|void
     *
     *
     * 修改用户名
     */
    public function changenickname(Request $request)
    {
        if ($request->isMethod('post')) {
            $username = $request->nickname;
            $vUsername = $request->nickname_verify;
            if (!$username || !$vUsername || $username != $vUsername)
                return response()->json(['status' => 0, 'message' => '修改失败!']);
            $data = [
                'id' => $this->user['id'],
                'username' => $username,
            ];
            try {
                $result = $this->userRepository->userModel->saveBy($data);
                if ($result) {
                    $data = Session::get('user.passport');
                    $data['username'] = $username;
                    Session::put('user.passport', $data);
                    return '修改成功!';
                }
            } catch (QueryException $e) {
                $e->getMessage();
            }
            return '修改失败!';
        }

        return view('account.account.changenickname');
    }

    public function changetelephone()
    {
        return view('account.account.changetelephone');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     *
     * 验证邮箱
     */
    public function validateemail(Request $request)
    {
        if ($request->isMethod('post')) {
            if ($request->get('action') == 'authEmail') {
                $user = $this->userRepository->userModel->find($this->user['id']);
                $user->email = $request->email;
                event(new ValidateEmail($user));
                return '发送成功!';
            }
            $code = $request->get('verifyCode');
            $email = $request->get('email');
            $checkcode = Session::get('user_' . $this->user['id']);
            if (!$code || !$email || ($code != $checkcode)) {
                return '验证失败!';
            }
            $data = ['id' => $this->user['id'], 'email' => $email];
            try {
                $result = $this->userRepository->userModel->saveBy($data);
                if ($result) return '修改成功!';
            } catch (QueryException $e) {
                $e->getMessage();
            }
            return '修改失败!';
        }

        return view('account.account.validateemail');
    }

    public function validcard()
    {
        return view('account.account.validcard');
    }

    public function changepassword()
    {
        return view('account.account.changepassword');
    }

    public function dealpassword()
    {
        return view('account.account.dealpassword');
    }

    public function findpassword()
    {
        return view('account.account.findpassword');
    }

    public function question()
    {
        return view('account.account.question');
    }
}