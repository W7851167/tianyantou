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

use App\Eloquent\Model;
use App\Models\BankModel;
use App\Models\BookModel;
use App\Models\MessageModel;
use App\Models\MoneyModel;
use App\Models\RecordModel;
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
        BankModel $bankModel,
        MessageModel $messageModel,
        RecordModel $recordModel,
        BookModel $bookModel
    )
    {
        $this->userModel = $userModel;
        $this->scoreModel = $scoreModel;
        $this->moneyModel = $moneyModel;
        $this->bankModel = $bankModel;
        $this->withdrawModel = $withdrawModel;
        $this->messageModel = $messageModel;
        $this->recordModel = $recordModel;
        $this->bookModel = $bookModel;
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
    public function checkLogin($username, $password, $isAdmin = false, $remember = 0)
    {
        if ($isAdmin) {
            $userModel = $this->userModel->where('nickname', $username)
                ->orWhere('mobile', $username)->orWhere('email', $username)->first();
        } else {
            $userModel = $this->userModel->where('username', $username)->first();
        }

        if (!$userModel) return $this->getError('该用户不存在!');

        if ($isAdmin) {
            if ($userModel->roles != '管理员')
                return $this->getError('此账号非管理员账号!');
        }

        //自动登录
        if ($remember && $res = Session::get('user.passport')) {
            if ($res['username'] == $userModel->username) {
                return static::getSuccess('登录成功!');
            }
        }
        //判断密码是否正确
        if (!password_verify($password, $userModel->password)) {
            return static::getError('密码不正确，请重新输入!');
        }
        Session::put('user.passport', $this->setSessionData($userModel));

        return static::getSuccess('登录成功!');
    }

    /**
     * @param $userModel
     * @return array
     *
     * 设置登录保存session信息
     */
    public function setSessionData($userModel)
    {
        $emailFlag = !empty($userModel->email) ? 1 : 0;
        $mobileFlag = !empty($userModel->mobile) ? 1 : 0;
        $bankFlag = !empty($userModel->bank) ? 1 : 0;
        //$investFlag = $emailFlag && $mobileFlag && $bankFlag;
//        $emailFlag = 1;
//        $mobileFlag = 1;
//        $bankFlag = 1;
        $investFlag = 1;
        $avatar = isset($userModel->avatar->name) ? $userModel->avatar->name : '';

        return [
            'id' => $userModel->id,
            'username' => $userModel->username,
            'avatar' => $avatar,
            'email' => $emailFlag,
            'mobile' => $mobileFlag,
            'bank' => $bankFlag,
            "invest" => $investFlag,
            'role' => $userModel->roles,
            'model' => $userModel,
        ];
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
    public function getUserList($where = [], $limit, $page)
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
        $result = $this->moneyModel->getConnection()->transaction(function () use ($data) {
            $userId = $data['id'] ? $data['id'] : $data['user_id'];
            $moneyModel = $this->moneyModel->where('user_id', $userId)->first();
            $moneyModel->increment('score', (int)$data['score']);
            //记录积分日志
            $logData['user_id'] = $userId;
            $logData['score'] = (int)$data['score'];
            $logData['intro'] = $data['intro'];
            $this->scoreModel->create($logData);
        });
        if ($result instanceof QueryException) {
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
    public function getWithdrawList($where = [], $limit, $page)
    {
        $orderBy = ['created_at' => 'desc'];
        $lists = $this->withdrawModel->lists("*", $where, $orderBy, [], $limit, $page);
        $count = $this->withdrawModel->countBy($where);
        return [$count, $lists];
    }

    /**
     * @param $data
     * 审核提现记录
     */
    public function saveWithdraw($data)
    {
        $result = $this->withdrawModel->getConnection()->transaction(function () use ($data) {
            $this->withdrawModel->saveBy($data);
            $userModel = $this->userModel->find($data['user_id']);
            if ($data['status'] == 0) {
                $userModel->money->increment('withdraw', $data['price']);
                $userModel->money->decrement('money', $data['price']);
            }
            if ($data['status'] == 1) {
                $userModel->money->decrement('withdraw', $data['price']);
            }
            if ($data['status'] == 2) {
                $userModel->money->decrement('withdraw', $data['price']);
                $userModel->money->increment('money', $data['price']);
            }
        });
        if ($result instanceof \Exception) {
            return static::getError($result->getMessage());
        }
        return static::getSuccess('审核提现记录数据完成');
    }

    /**
     * @param $data
     * @return array
     * @throws \Exception
     * @throws \Throwable
     *
     * 批量体现审核
     */
    public function saveWithdraws($data)
    {
        $result = $this->withdrawModel->getConnection()->transaction(function () use ($data) {
            $errors = 0;
            foreach ($data['ids'] as $id) {
                $withdraw = $this->withdrawModel->find($id);
                if (!($withdraw->user instanceof Model)) {
                    $errors++;
                    continue;
                }
                if (!($withdraw->user->money instanceof Model)) {
                    $errors++;
                    continue;
                }
                if (!$withdraw->user->money instanceof Model) {
                    $errors++;
                    continue;
                }
                if ($withdraw->user->money->withdraw < $withdraw->price) {
                    $errors++;
                    continue;
                }
                $item = [
                    'id' => $id,
                    'user_id' => $withdraw->user_id,
                    'price' => $withdraw->price,
                    'commission' => $withdraw->commission,
                    'status' => $data['status'],
                    'reason' => '批量操作',
                ];
                $this->withdrawModel->saveBy($item);
                $userModel = $this->userModel->find($item['user_id']);
                $userModel->money->decrement('withdraw', $item['price']);
                if ($data['status'] == 2) {
                    $userModel->money->increment('money', $item['price']);
                }
            }
            return $errors;
        });

        if ($result instanceof \Exception) {
            return static::getError($result->getMessage(), $result);
        }
        return static::getSuccess('审核提现记录数据完成', $result);
    }

    /**
     * @param array $where
     * @param $limit
     * @param $page
     * @return array
     *
     * 积分列表
     */
    public function getScoreList($where = [], $limit, $page)
    {
        $orderBy = ['created_at' => 'desc'];
        $lists = $this->scoreModel->lists("*", $where, $orderBy, [], $limit, $page);
        $count = $this->scoreModel->countBy($where);
        return [$count, $lists];
    }

    /**
     * @param array $where
     * @param $limit
     * @param $page
     * @return array
     *
     * 消息列表
     */
    public function getMessageList($where = [], $limit, $page)
    {
        $orderBy = ['created_at' => 'desc'];
        $lists = $this->messageModel->lists("*", $where, $orderBy, [], $limit, $page);
        $count = $this->messageModel->countBy($where);
        return [$count, $lists];
    }

    /**
     * @param array $where
     * @param $limit
     * @param $page
     * @return array
     *
     * 流水列表
     */
    public function getRecordList($where = [], $limit, $page)
    {
        $orderBy = ['created_at' => 'desc'];
        $lists = $this->recordModel->lists("*", $where, $orderBy, [], $limit, $page);
        $count = $this->recordModel->countBy($where);
        return [$count, $lists];
    }

    /**
     * @param array $where
     * @param $limit
     * @param $page
     * @return array
     *
     * 用户记账列表
     */
    public function getBookList($where = [], $limit, $page)
    {
        $orderBy = ['created_at' => 'desc'];
        $lists = $this->bookModel->lists('*', $where, $orderBy, [], $limit, $page);
        $count = $this->bookModel->countBy($where);
        return [$count, $lists];
    }

    /**
     * @param $data
     * @return array
     * @throws \Exception
     * @throws \Throwable
     *
     * 保存用户信息
     */
    public function saveUser($data)
    {
        $result = $this->userModel->getConnection()->transaction(function () use ($data) {
            $userModel = $this->userModel->create($data);
            $this->moneyModel->saveMoney($userModel->id, ['user_id' => $userModel->id]);
            Session::put('user.passport', $this->setSessionData($userModel));
        });

        if ($result instanceof \Exception) {
            return static::getError($result->getMessage());
        }
        return static::getSuccess('注册成功!');
    }
}