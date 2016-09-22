<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 统计说明
 *-------------------------------------------------------------------------------
 * $FILE:CensusRepository.php
 * $Author:zxs
 * $Dtime:2016/9/15
 ***********************************************************************************/
namespace App\Repositories;


use App\Models\ArticleModel;
use App\Models\CategoryModel;
use App\Models\ImageModel;
use App\Models\MoneyModel;
use App\Models\NewModel;
use App\Models\PastModel;
use App\Models\TaskAchieveModel;
use App\Models\TaskReceiveModel;
use App\Models\UserModel;
use Illuminate\Database\QueryException;

class CensusRepository extends BaseRepository
{
    public function __construct(
        TaskReceiveModel $taskReceiveModel,
        TaskAchieveModel $taskAchieveModel,
        MoneyModel $moneyModel,
        UserModel $userModel,
        PastModel $pastModel
    ) {
        $this->taskReceiveModel = $taskReceiveModel;
        $this->taskAchieveModel = $taskAchieveModel;
        $this->moneyModel = $moneyModel;
        $this->userModel = $userModel;
        $this->pastModel = $pastModel;
    }


    /**
     * @param $userId
     * 用户签到信息
     */
    public function savePast($userId)
    {
        $result = $this->pastModel->getConnection()->transaction(function($conn) use($userId){

            $pastModel = $this->pastModel->firstOrCreate(['user_id'=>$userId]);
            $today = date('Y-m-d') . ' 00:00:00';
            //记录创建时间小于今天
            if($pastModel->created_at < $today) {
                if($pastModel->updated_at > $today) {
                    throw new \Exception('您今天已经签过到了！');
                }
                //签到
                $sql = "UPDATE ad_pasts SET days = ";
                $sql .= "CASE WHEN TO_DAYS(updated_at) = TO_DAYS(now()) - 1 THEN (days + 1) MOD 7 ";
                $sql .= "ELSE 0 END WHERE user_id = ?";
                return $conn->update($sql,[$userId]);
            }
        });

        if ($result instanceof \Exception) {
            return $this->getError($result->getMessage());
        } else {
            return $this->getSuccess('签到完成', $result);
        }
    }


    /**
     * @param $startTime
     * @param $endTime
     * 获取注册人数u
     *
     */
    public function getRegisterUserStats($startTime, $endTime)
    {
        return $this->userModel->whereBetween('created_at', [$startTime,$endTime])->count();
    }

    /**
     * @param $userId
     * @param $startTime 2016-08-09
     * @param $endTime   2016-10-10
     * 查询投资统计
     */
    public function getIncomesStats($userId,$startTime, $endTime)
    {
        list($startTime,$endTime) = $this->getMonthTime($endTime,$startTime);
        $stats = [];
        $receiveIn = 0.00;
        $repayIn = 0.00;
        $account = 0.00;
        $colors=[
            0=>'#2aa3ce',
            1=>'#FB9142',
            2=>'#fb4242',
            3=>'#79B32B',
        ];
        //账号金额
        $moneyModel = $this->moneyModel->where('user_id',$userId)->first();
        if(!empty($moneyModel->money)) {
            $account = $moneyModel->money;
        }
        $query = $this->taskReceiveModel->select(['*']);
        $where['user_id'] = $userId;
        $query = $this->taskReceiveModel->createWhere($query, $where);
        $result = $query->get();
        if(empty($result)) return $stats;
        foreach($result as $receiveModel)
        {
            $unit = $receiveModel->task->term_unit == 0 ? '天' : ($receiveModel->task->term_unit == 1 ? '月' : '年');
            //领取任务
            if(!empty($receiveModel->create_time) &&
                ($receiveModel->create_time >= $startTime && $receiveModel->create_time < $endTime) && $receiveModel->status == 0)
            {
                $title = '领' . $receiveModel->task->term . $unit . '任务';
                $stats[] = ['title'=>$title, 'color'=>$colors[0],'start'=>date('Y-m-d',$receiveModel->create_time)];
            }
            //已交任务
            if(!empty($receiveModel->commit_time) &&
                ($receiveModel->commit_time >= $startTime && $receiveModel->commit_time < $endTime) && $receiveModel->status == 2)
            {
                $price = $receiveModel->achieves->sum('price');
                $income = getIncome($receiveModel->task->term,$receiveModel->task->term_unit,$receiveModel->mratio,$price);
                $title = '待收' . $income . '元';
                $repayIn+=  sprintf('%.2f',$income);
                $stats[] = ['title'=>$title, 'color'=>$colors[1],'start'=>date('Y-m-d',$receiveModel->commit_time)];
            }

            if(!empty($receiveModel->complete_time) &&
                ($receiveModel->complete_time >= $startTime && $receiveModel->complete_time < $endTime) && $receiveModel->status == 1)
            {
                $price = $receiveModel->achieves->sum('price');
                $income = getIncome($receiveModel->task->term,$receiveModel->task->term_unit,$receiveModel->mratio,$price);
                $title = '已收' . $income . '元任务';
                $receiveIn+=  sprintf('%.2f',$income);
                $stats[] = ['title'=>$title, 'color'=>$colors[3],'start'=>date('Y-m-d',$receiveModel->complete_time)];
            }

        }
        return [$account, $receiveIn,$repayIn,$stats];
    }

    /**
     * @param $userId
     * 查询用户投资收益金额
     */
    public function getUserInvestIncome($userId)
    {
        //待收总额
        $unIncome = $this->taskReceiveModel->where('user_id',$userId)->where('status',2)->sum('income');
        $unIncome = !empty($unIncome) ? $unIncome : 0.00;
        //已投资收益
        $hasIncome = $this->taskReceiveModel->where('user_id',$userId)->where('status',1)->sum('income');
        $hasIncome = !empty($hasIncome) ? $hasIncome : 0.00;
        //待收笔数
        $unCount = $this->taskReceiveModel->where('user_id',$userId)->where('status',2)->count();
        return [$unIncome,$hasIncome,$unCount];
    }

    /**
     * 首页统计情况
     */
    public function getHomeStats()
    {
        //撮合成交总量
        $total = $this->taskReceiveModel->where('status',1)->sum('total');
        $census['total'] = !empty($total) ? $total : '0.00';
        //累计注册人数
        $census['registers'] = $this->userModel->where('roles','用户')->count();
        //累计产生收益
        $income = $this->taskReceiveModel->where('status',1)->sum('income');
        $census['income'] = !empty($income) ? $income : '0.00';
        //待完成成交
        $invested = $this->taskReceiveModel->where('status',2)->sum("total");
        $census['untotal'] = !empty($invested) ? $invested : '0.00';

        return $census;
    }

    /**
     * @param $endTime
     * @param $startTime
     * 判断当开始和结束时间
     */
    private function getMonthTime($endTime, $startTime)
    {
        $time = strtotime($startTime) + 15 * 24 * 60 * 60; //加半个月
        //这个月的天数
        $money = date('m',$time);
        $days = date('t',$time);
        $start = strtotime(date('Y-m',$time) . '-01');
        $end = strtotime(date('Y-m',$time) . '-' . $days);
        return [$start,$end];
    }



}