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

use App\Models\BankModel;
use App\Models\MoneyModel;
use App\Models\ScoreModel;
use App\Models\UserModel;
use App\Models\WithdrawModel;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class UserRepository extends BaseRepository
{
    public function __construct(
        UserModel $userModel,
        ScoreModel $scoreModel,
        MoneyModel $moneyModel,
        WithdrawModel $withdrawModel,
        BankModel $bankModel
    )
    {
        $this->userModel = $userModel;
        $this->scoreModel = $scoreModel;
        $this->moneyModel = $moneyModel;
        $this->bankModel = $bankModel;
        $this->withdrawModel = $withdrawModel;
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

    /**
     * @param $where
     * @param $limit
     * @param $page
     * 获取用户列表
     */
    public function getUserList($where=[], $limit,$page)
    {
        $orderBy = ['id' => 'desc'];
        $lists = $this->userModel->lists("*", $where, $orderBy, [], $limit, $page);
        $count = $this->userModel->countBy($where);
        return [$count, $lists];
    }

    /**
     * @param $data
     * 添加积分功能
     */
    public function saveScore($data)
    {
        $result = $this->moneyModel->getConnection()->transaction(function()use($data){
            $userId = $data['id'] ? $data['id'] : $data['user_id'];
            $moneyModel = $this->moneyModel->where('user_id',$userId)->first();
            $moneyModel->increment('score', (int)$data['score']);
            //记录积分日志
            $logData['user_id'] = $userId;
            $logData['score'] = (int)$data['score'];
            $logData['intro'] = $data['intro'];
            $this->scoreModel->create($logData);
        });
        if($result instanceof QueryException) {
            return static::getError($result->getMessage());
        }
        return static::getSuccess('添加用户积分操作完成');
    }

    /**
     * @param array $where
     * @param $limit
     * @param $page
     * 提现处理
     */
    public function  getWithdrawList($where=[], $limit, $page)
    {
        $orderBy = ['created_at' => 'desc'];
        $lists = $this->withdrawModel->lists("*", $where, $orderBy, [], $limit, $page);
        $count = $this->withdrawModel->countBy($where);
        return [$count, $lists];
    }
}