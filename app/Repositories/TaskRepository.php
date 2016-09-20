<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:TaskRepository.php
 * $Author:zxs
 * $Dtime:2016/9/8
 ***********************************************************************************/

namespace App\Repositories;


use App\Models\CorpModel;
use App\Models\CorpTermModel;
use App\Models\ImageModel;
use App\Models\MetaModel;
use App\Models\MoneyModel;
use App\Models\TaskAchieveModel;
use App\Models\TaskModel;
use App\Models\TaskReceiveModel;
use Illuminate\Database\QueryException;

class TaskRepository extends  BaseRepository
{
    public function __construct(
        TaskModel $taskModel,
        CorpModel $corpModel,
        CorpTermModel $corpTermModel,
        ImageModel $imageModel,
        MetaModel $metaModel,
        TaskReceiveModel $taskReceiveModel,
        TaskAchieveModel $taskAchieveModel,
        MoneyModel $moneyModel
    )
    {
        $this->taskModel = $taskModel;
        $this->corpModel = $corpModel;
        $this->corpTermModel = $corpTermModel;
        $this->imageModel = $imageModel;
        $this->metaModel = $metaModel;
        $this->taskReceiveModel = $taskReceiveModel;
        $this->taskAchieveModel = $taskAchieveModel;
        $this->moneyModel = $moneyModel;
    }

    /**
     * @param $search
     * @param $limit
     * @param $page
     * 获取公司列表
     */
    public function getCorpList($where = [], $limit, $page)
    {
        $order['sorts'] = 'desc';
        $lists = $this->corpModel->lists(['*'], $where, $order, [], $limit, $page);
        $counts = $this->corpModel->countBy($where);
        return [$counts, $lists];
    }

    /**
     * @param $ename
     * 通过英文名获取公司信息
     */
    public function getCorpByEname($ename)
    {
        return $this->corpModel->where('ename',$ename)->first();
    }

    /**
     * @param array $where
     * 获取所有项目
     */
    public function getNormalCorps($where = [])
    {
        $fields = ['*'];
        $order['sorts'] = 'desc';
        return $this->corpModel->alls($fields, $where,$order);
    }



    /**
     * @param array $where
     * @param $limit
     * @param $page
     * @return array
     * 获取投标列表
     */
    public function getTaskList($where = [], $limit, $page, $trashed=0,$order=[])
    {
        if(empty($order)) {
            $order['sorts'] = 'desc';
        }
        $lists = $this->taskModel->lists(['*'], $where, $order, [], $limit, $page,$trashed);
        $counts = $this->taskModel->countBy($where);
        return [$counts, $lists];
    }

    /**
     * @param array $where
     * @param $limit
     * @param $page
     * @return array
     * 获取投标列表
     */
    public function getReceiveList($where = [], $limit, $page = 1)
    {
        $order['id'] = 'desc';
        $lists = $this->taskReceiveModel->lists(['*'], $where, $order, [], $limit, $page);
        $counts = $this->taskReceiveModel->countBy($where);
        return [$counts, $lists];
    }
    /**
     * @param $data
     * 保存信息
     */
    public function saveCorp($data)
    {
        try {
            $this->corpModel->saveBy($data);
            return static::getSuccess('创建公司成功');
        } catch (QueryException $e) {
            return static::getError($e->getMessage());
        }
    }

    /**
     * @param $id
     *  还原回收站数据
     */
    public function untrashed($id)
    {
        try {
            $this->taskModel->withTrashed()->find($id)->restore();
            $this->taskModel->saveBy(['id'=>$id,'status'=>0]);
            return static::getSuccess('还原回收站数据完成');
        } catch (QueryException $e) {
            return static::getError($e->getMessage());
        }

    }

    /**
     * @param $data
     * 创建公司团队信息
     */
    public function saveCorpTerm($data)
    {
        if(!empty($data['avatar'])) {
            $avatar = $data['avatar'];
            unset($data['avatar']);
        }
        $result = $this->corpTermModel->getConnection()->transaction(function() use($data,$avatar){
            $termId = $this->corpTermModel->saveBy($data);
            $termId = !empty($data['id']) ? $data['id'] : $termId;
            if(!empty($avatar)) {
                $imageData['item_id'] = $termId;
                $imageData['item_type'] = 'App\Models\CorpTermModel';
                $imageData['name'] = $avatar;
                $this->imageModel->saveImage($imageData,true);
            }
        });
        if ($result instanceof \Exception) {
            return $this->getError($result->getMessage());
        } else {
            return $this->getSuccess('创建/编辑公司团队完成', $result);
        }
    }

    /**
     * @param $id
     * 删除成员组信息
     */
    public function deleteCorpTerm($corpId,$id)
    {
        try {
            $term = $this->corpTermModel->find($id);
            if($corpId != $term->corp_id)
                return static::getError('您没有权限删除该组成员');
            $term->delete();
            $this->imageModel->deleteImage($id, 'App\Models\CorpTermModel');
            return static::getSuccess('删除公司团队成员完成');
        } catch (QueryException $e) {
            return static::getError($e->getMessage());
        }
    }

    /**
     * @param $id
     * @return array
     * 删除任务
     */
    public function deleteTask($id)
    {
        try {
            $this->taskModel->find($id)->delete();
            return static::getError('删除项目数据完成');
        }catch (QueryException $e) {
            return static::getError($e->getMessage());
        }
    }

    /**
     * @param $data
     * @return array
     * 保存编辑项目
     */
    public function saveTask($data)
    {
        $result = $this->corpTermModel->getConnection()->transaction(function() use($data){
            //保存项目
            $this->taskModel->saveBy($data);
            if(!empty($data['corp_id'])) {
                $days = getDiffTime($data['start_time'],$data['end_time']);
                $days = (int)$days;
                $ratio = (float)$data['ratio'];
                $corpModel = $this->corpModel->find($data['corp_id']);
                if($corpModel->min_yield == 0) {
                    $corpData['min_yield'] = $ratio;
                } else {
                    if($corpModel->min_yield > $ratio) {
                        $corpData['min_yield'] = $ratio;
                    }
                }
                if($corpModel->max_yield == 0) {
                    $corpData['max_yield'] = $ratio;
                } else {
                    if($corpModel->max_yield < $ratio) {
                        $corpData['max_yield'] = $ratio;
                    }
                }

                if(empty($corpModel->min_days)) {
                    $corpData['min_days'] = $days;
                } else {
                    if($corpModel->min_days > $days) {
                        $corpData['min_days'] = $days;
                    }
                }
                if(empty($corpModel->max_days)) {
                    $corpData['max_days'] = $days;
                } else {
                    if($corpModel->max_days < $days) {
                        $corpData['max_days']  = $days;
                    }
                }
                //保存公司信息
                if(!empty($corpData)) {
                    $corpData['id'] = $data['corp_id'];
                    $corpModel->saveBy($corpData);
                }

            }
        });
        if ($result instanceof \Exception) {
            return $this->getError($result->getMessage());
        } else {
            return $this->getSuccess('创建/编辑项目完成', $result);
        }
    }
    /**
    * 保存安全保障信息
    */
    public function saveMeta($corpId,$data)
    {
        if(!is_array($data)) return static::getError('参数传递错误');
        while(list($key,$value) = each($data)) {
            $metaData['item_id'] = $corpId;
            $metaData['item_type'] = 'App\Models\CorpModel';
            $metaData['meta_key'] = $key;
            $metaData['meta_value'] = serialize($value);
            try {
                $this->metaModel->saveMeta($metaData);
            } catch (QueryException $e) {
                return static::getError($e->getMessage());
            }
        }
        return static::getSuccess('创建/修改信息完成');
    }

    /**
     * @param $data
     * @throws \Exception
     * @throws \Throwable
     * 保存任务
     */
    public function saveReceive($data)
    {
        $result = $this->taskReceiveModel->getConnection()->transaction(function() use($data){
            //领取任务减库存
            if($data['status'] == 0) {
                $taskModel = $this->taskModel->find($data['task_id']);
                if($taskModel->nums <=0)
                    throw new \Exception('该投资任务数已超过限定，请联系运营人员');
                $nums = $taskModel->nums - 1;
                $counts = $taskModel->receives->count() + 1;
                $proccess = sprintf('%.2f',($counts/($nums + $counts))) * 100;
                $taskModel->nums = $nums;
                $taskModel->proccess = $proccess;
                $taskModel->save();
            }
            $receiveId = $this->taskReceiveModel->saveBy($data);
            $receiveId  = !empty($data['id']) ? $data['id'] : $receiveId;
            //审核完成、可用金额增加
            if($data['status'] == 1) {
                $receiveModel = $this->taskReceiveModel->find($receiveId);
                $receiveModel->user->money->increment('money',$receiveModel->total);
            }
            //驳回审核,不做任何操作
        });
        if ($result instanceof \Exception) {
            return $this->getError($result->getMessage());
        } else {
            return $this->getSuccess('创建/保存任务完成', $result);
        }
    }


    /**
     * @param $data
     * 保存投资记录信息
     */
    public function saveAchieves($data)
    {
        $result = $this->taskAchieveModel->getConnection()->transaction(function() use($data){
            $this->taskAchieveModel->saveBy($data);
            $receiveModel = $this->taskReceiveModel->find($data['receive_id']);
            $receiveModel->status = 2;
            $receiveModel->commit_time = time();
            //总金额++
            $receiveModel->total = $receiveModel->total + $data['price'];
            //收入金额--
            $receiveModel->income += sprintf('%.2f',$data['price'] * $receiveModel->mratio / 100);
            $receiveModel->save();
        });

        if ($result instanceof \Exception) {
            return $this->getError($result->getMessage());
        } else {
            return $this->getSuccess('提交投标信息完成', $result);
        }
    }

    /**
     * @param $data
     * 删除投资记录
     */
    public function deleteAchieves($id)
    {
        $result = $this->taskAchieveModel->getConnection()->transaction(function() use($id){
            $achieveModel = $this->taskAchieveModel->find($id);
            $receiveModel = $this->taskReceiveModel->find($achieveModel->receive_id);
            //总金额--
            $receiveModel->total -= $achieveModel->price;
            //收入金额--
            $receiveModel->income -= sprintf('%.2f',$achieveModel->price * $receiveModel->mratio / 100);
            //删除提交的任务
            $achieveModel->delete();
            //已经无提交的任务、任务为待提交状态
            if($receiveModel->achieves->count() == 0) {
                $receiveModel->status = 0;
                $receiveModel->commit_time = 0;
            }
            //保存领取任务情况
            $receiveModel->save();

        });

        if ($result instanceof \Exception) {
            return $this->getError($result->getMessage());
        } else {
            return $this->getSuccess('删除投标信息完成', $result);
        }

    }


}