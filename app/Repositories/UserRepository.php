<?php
/*********************************************************************************
 *  用户逻辑代码仓库
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:BaseRepository.php
 * $Author:pzz
 * $Dtime:2016/9/7
 ***********************************************************************************/

namespace App\Repositories;

use App\Models\UserModel;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class UserRepository extends BaseRepository
{
    public function __construct(
        UserModel $userModel
    )
    {
        $this->userModel = $userModel;
    }

    /**
     * @param $suppliersId
     * @param $email
     * @param $password
     * @param int $remember
     * @return array
     *
     * 验证登录信息
     */
    public function checkLogin($username, $password, $remember = 0)
    {
        $userModel = $this->userModel->where('username', $username)->first();

        if (!$userModel) {
            return $this->getError('该用户不存在!');
        }

        $data = $userModel->toArray();
        //自动登录
        if ($remember && $res = Session::get('user.passport')) {
            if ($res['username'] == $data['username']) {
                return static::getSuccess('登录成功!');
            }
        }
        //判断密码是否正确
        if (!password_verify($password, $data['password'])) {
            return static::getError('密码不正确，请重新输入!');
        }
        $sessionData = [
            'id' => $data['id'],
            'username' => $data['username'],
        ];
        if (!empty($userModel->avatar->name))
            $sessionData['avatar'] = $userModel->avatar->name;
        Session::put('user.passport', $sessionData);

        Session::put('peng', 'zhuang');

        return static::getSuccess('登录成功!');
    }

    public function logout()
    {
        try {
            Session::forget('user.passport');
            Session::forget(base64_encode(Request::ip()));
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}