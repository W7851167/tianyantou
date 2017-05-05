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


use App\Exceptions\LimitException;
use App\Models\CorpModel;
use App\Models\CorpTermModel;
use App\Models\ImageModel;
use App\Models\MetaModel;
use App\Models\RecordModel;
use App\Models\TaskAchieveModel;
use App\Models\TaskModel;
use App\Models\TaskReceiveModel;
use App\Models\UserModel;
use Illuminate\Database\QueryException;

class TaskRepository extends BaseRepository
{
    public function __construct(
        TaskModel $taskModel,
        CorpModel $corpModel,
        CorpTermModel $corpTermModel,
        ImageModel $imageModel,
        MetaModel $metaModel,
        TaskReceiveModel $taskReceiveModel,
        TaskAchieveModel $taskAchieveModel,
        RecordModel $recordModel,
        UserModel $userModel
    )
    {
        $this->taskModel = $taskModel;
        $this->corpModel = $corpModel;
        $this->corpTermModel = $corpTermModel;
        $this->imageModel = $imageModel;
        $this->metaModel = $metaModel;
        $this->recordModel = $recordModel;
        $this->taskReceiveModel = $taskReceiveModel;
        $this->taskAchieveModel = $taskAchieveModel;
        $this->userModel = $userModel;
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
        return $this->corpModel->where('ename', $ename)->first();
    }

    /**
     * @param $ename
     * 通过项目id获取项目信息
     */
    public function getTaskById($id)
    {
        return $this->taskModel->where('id', $id)->first();
    }

    /**
     * @param $ename
     * 通过平台id获取平台信息
     */
    public function getCorpById($corp_id)
    {
        return $this->corpModel->where('id', $corp_id)->first();
    }

    /**
     * @param array $where
     * 获取所有项目
     */
    public function getNormalCorps($where = [])
    {
        $fields = ['*'];
        $order['sorts'] = 'desc';
        return $this->corpModel->alls($fields, $where, $order);
    }


    /**
     * @param array $where
     * @param $limit
     * @param $page
     * @return array
     * 获取投标列表
     */
    public function getTaskList($where = [], $limit, $page, $trashed = 0, $order = [])
    {
        if (empty($order)) {
            $order['sorts'] = 'desc';
        }
        $lists = $this->taskModel->lists(['*'], $where, $order, [], $limit, $page, $trashed);
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
     * @param array $where
     * @param int $limit
     * @param int $page
     * @return array
     *
     * 获取投标列表
     */
    public function getAchievesList($where = [], $limit = 10, $page = 1)
    {
        $order['id'] = 'desc';
        $lists = $this->taskAchieveModel->lists(['*'], $where, $order, [], $limit, $page);
        $counts = $this->taskAchieveModel->countBy($where);
        return [$counts, $lists];
    }

    /**
     * @param array $where
     * @param int $limit
     * @param int $page
     * @return array
     *
     * 获取平台列表
     */
    public function getPlatformList( $where=[], $limit, $page)
    {
        $fields = ['corps.*','tasks.term','tasks.term_unit'];
        $query = $this->corpModel->leftJoin('tasks', 'corps.id','=','tasks.corp_id')->select($fields);
        $query = $this->corpModel->createWhere($query,$where);
        $lists = $query->skip($limit *($page -1))->take($limit)->get();
        $counts = $query->count();
        return [$counts,$lists];
    }

    /**
     * @param
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
            $this->taskModel->saveBy(['id' => $id, 'status' => 0]);
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
        if (!empty($data['avatar'])) {
            $avatar = $data['avatar'];
            unset($data['avatar']);
        }
        $result = $this->corpTermModel->getConnection()->transaction(function () use ($data, $avatar) {
            $termId = $this->corpTermModel->saveBy($data);
            $termId = !empty($data['id']) ? $data['id'] : $termId;
            if (!empty($avatar)) {
                $imageData['item_id'] = $termId;
                $imageData['item_type'] = 'App\Models\CorpTermModel';
                $imageData['name'] = $avatar;
                $this->imageModel->saveImage($imageData, true);
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
    public function deleteCorpTerm($corpId, $id)
    {
        try {
            $term = $this->corpTermModel->find($id);
            if ($corpId != $term->corp_id)
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
            $result = $this->taskModel->getConnection()->transaction(function () use ($id) {
                $taskModel = $this->taskModel->find($id);
                $receives = $taskModel->receives->count();
                if ($receives > 0)
                    throw new LimitException('该项目已有人领取，不能删除');

                $corpModel = $taskModel->corp;
                $this->initCorp($corpModel);
                $taskModel->delete();

            });
        }catch (\Exception $e) {
            return $this->getError($e->getMessage());
        }
        if ($result instanceof \Exception) {
            return $this->getError($result->getMessage());
        } else {
            return $this->getSuccess('删除项目完成', $result);
        }
    }


    /**
     * @param $data
     * @return array
     * 保存编辑项目
     */
    public function saveTask($data)
    {
        $result = $this->corpTermModel->getConnection()->transaction(function () use ($data) {
            //保存项目
            $this->taskModel->saveBy($data);
            $corpModel = $this->corpModel->find($data['corp_id']);
            if (!empty($data['corp_id']) && $data['status'] == 1) {
                $ratio = (float)$data['ratio'];
                $mratio = (float)$data['mratio'];
                $this->setCorp($corpModel, $mratio, $ratio);
            }
            if ($data['status'] == 0 || $data['status'] == 2) {
                $this->initCorp($corpModel);
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
    public function saveMeta($corpId, $data)
    {
        if (!is_array($data)) return static::getError('参数传递错误');
        while (list($key, $value) = each($data)) {
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
        try {
            $result = $this->taskReceiveModel->getConnection()->transaction(function () use ($data) {
                $taskModel = $this->taskModel->find($data['task_id']);
                if ($taskModel->nums <= 0)
                    throw new \Exception('该投资任务数已超过限定，请联系运营人员');
                $nums = $taskModel->nums - 1;
                $counts = $taskModel->receives->count() + 1;
                $proccess = sprintf('%.2f', ($counts / ($nums + $counts))) * 100;
                $taskModel->nums = $nums;
                $taskModel->proccess = $proccess;
                $taskModel->save();
                $this->taskReceiveModel->saveBy($data);
            });
        }catch (\Exception $e) {
            return $this->getError($e->getMessage());
        }
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
        $result = $this->taskAchieveModel->getConnection()->transaction(function () use ($data) {
            $receiveModel = $this->taskReceiveModel->find($data['receive_id']);

            if ($data['status'] == 0) {
                $data['income'] = getIncome(
                    $receiveModel->task->term,
                    $receiveModel->task->term_unit,
                    $receiveModel->mratio,
                    $data['price']
                );
                $receiveModel->nums += 1;
                $receiveModel->save();
            }

            $achieveId = $this->taskAchieveModel->saveBy($data);
            $achieveId = !empty($data['id']) ? $data['id'] : $achieveId;

            //审核完成、可用金额增加
            if ($data['status'] == 1) {
                $achieveModel = $this->taskAchieveModel->find($achieveId);
                $achieveModel->user->money->increment('money', $achieveModel->income);
                $achieveModel->user->money->increment('total', $achieveModel->income);
                //记录资金流水
                $recordData['type'] = 1;
                $recordData['user_id'] = $achieveModel->user_id;
                $recordData['income'] = $achieveModel->income;
                $recordData['account'] = $achieveModel->user->money->money;
                $recordData['remark'] = $achieveModel->task->title . '，收益' . $achieveModel->income . '元';
                $this->recordModel->saveBy($recordData);

                //派发奖励
                if (!empty($receiveModel->user->invite)) {
                    //启动了领取奖励
                    if ($achieveModel->task->is_reward == 1) {
                        $rewardUser = $this->userModel->where('mobile', $achieveModel->user->invite)->first();
                        $where = ['user_id' => $achieveModel->user_id, 'status' => 1];
                        $count = $this->taskAchieveModel->countBy($where);
                        $key = $count == 0 ? 'first_reward' : 'second_reward';
                        $rewardModel = $this->metaModel->system()->where('meta_key', $key)->first();
                        if (!empty($rewardUser) && $count < 2 && !empty($rewardModel)) {
                            $reward = unserialize($rewardModel->meta_value);
                            $rewardUser->money->increment('money', $reward);
                            $rewardUser->money->increment('total', $reward);
                            //记录资金流水
                            $recordData['type'] = 3;
                            $recordData['user_id'] = $rewardUser->id;
                            $recordData['income'] = $reward;
                            $recordData['account'] = $rewardUser->money->money;
                            $recordData['remark'] = sprintf('您邀请用户%s第%d投资，您获取奖励%.2f元',
                                $achieveModel->user->username,
                                $count,
                                $reward);
                            $this->recordModel->saveBy($recordData);
                        }
                    }
                }
            }

            //驳回审核,不做任何操作
        });

        if ($result instanceof \Exception) {
            return $this->getError($result->getMessage());
        } else {
            return $this->getSuccess('提交投标信息完成', $result);
        }
    }

    public function saveBatchAchieves($data)
    {
        $result = $this->taskAchieveModel->getConnection()->transaction(function () use ($data) {
            $errors = 0;
            foreach ($data['ids'] as $id) {
                $achieveModel = $this->taskAchieveModel->find($id);
                if (empty($achieveModel)) {
                    $errors++;
                    continue;
                }
                if ($data['status'] == 1) {
                    $achieveModel->status = 1;
                    if ($achieveModel->save()) {
                        $achieveModel->user->money->increment('money', $achieveModel->income);
                        $achieveModel->user->money->increment('total', $achieveModel->income);
                        //记录资金流水
                        $recordData['type'] = 1;
                        $recordData['user_id'] = $achieveModel->user_id;
                        $recordData['income'] = $achieveModel->income;
                        $recordData['account'] = $achieveModel->user->money->money;
                        $recordData['remark'] = $achieveModel->task->title . '，收益' . $achieveModel->income . '元';
                        $this->recordModel->saveBy($recordData);

                        //派发奖励
                        if (!empty($achieveModel->user->invite)) {
                            //启动了领取奖励
                            if ($achieveModel->task->is_reward == 1) {
                                $rewardUser = $this->userModel->where('mobile', $achieveModel->user->invite)->first();
                                $where = ['user_id' => $achieveModel->user_id, 'status' => 1];
                                $count = $this->taskAchieveModel->countBy($where);
                                $key = $count == 0 ? 'first_reward' : 'second_reward';
                                $rewardModel = $this->metaModel->system()->where('meta_key', $key)->first();
                                if (!empty($rewardUser) && $count < 2 && !empty($rewardModel)) {
                                    $reward = unserialize($rewardModel->meta_value);
                                    $rewardUser->money->increment('money', $reward);
                                    $rewardUser->money->increment('total', $reward);
                                    //记录资金流水
                                    $recordData['type'] = 3;
                                    $recordData['user_id'] = $rewardUser->id;
                                    $recordData['income'] = $reward;
                                    $recordData['account'] = $rewardUser->money->money;
                                    $recordData['remark'] = sprintf('您邀请用户%s第%d投资，您获取奖励%.2f元',
                                        $achieveModel->user->username,
                                        $count,
                                        $reward);
                                    $this->recordModel->saveBy($recordData);
                                }
                            }
                        }
                    } else {
                        $errors++;
                        continue;
                    }
                }
                if ($data['status'] == 2) {
                    $achieveModel->status = 2;
                    $achieveModel->remark = '提交任务失败';
                    if (!$achieveModel->save()) {
                        $errors++;
                        continue;
                    }
                }
            }
            return ['errors' => $errors];
        });

        if ($result instanceof \Exception) {
            return static::getError($result->getMessage(), $result);
        }
        return static::getSuccess('审核记录数据完成', $result);
    }

    /**
     * @param $data
     * 删除投资记录
     */
    public function deleteAchieves($id)
    {
        $result = $this->taskAchieveModel->getConnection()->transaction(function () use ($id) {
            $achieveModel = $this->taskAchieveModel->find($id);
            $receiveModel = $this->taskReceiveModel->find($achieveModel->receive_id);
            $achieveModel->delete();
            $receiveModel->nums -= 1;
            $receiveModel->save();

        });

        if ($result instanceof \Exception) {
            return $this->getError($result->getMessage());
        } else {
            return $this->getSuccess('删除投标信息完成', $result);
        }

    }

    /**
     * @param $where
     * @param $userId
     * @return array
     *
     * 获取开通的平台
     */
    public function getOpenPlatform($where, $userId)
    {
        $corps = $this->corpModel->createWhere($this->corpModel, $where)->get();
        $count = $this->corpModel->countBy($where);
        foreach ($corps as $c) {
            $c->census = $this->corpsCensus($c->id, $userId);
        }
        return [$count, $corps];
    }

    /**
     * @param $corpId
     * @param $userId
     * @return mixed
     *
     * 统计平台
     */
    public function corpsCensus($corpId, $userId)
    {
        $census['count'] = $this->taskAchieveModel->where('user_id', $userId)->where('corp_id', $corpId)->count();
        $census['total'] = $this->taskAchieveModel->where('user_id', $userId)->where('corp_id', $corpId)->sum('price');
        $census['income'] = $this->taskAchieveModel->where('user_id', $userId)->where('corp_id', $corpId)->sum('income');
        $total = $this->taskAchieveModel->where('user_id', $userId)->sum('price');
        $census['proportion'] = sprintf('%.2f', $census['total'] / $total * 100);
        $receiveIds = $this->taskAchieveModel->where('user_id', $userId)->where('corp_id', $corpId)->lists('id')->toArray();
        $term = $this->taskAchieveModel->whereIn('receive_id', $receiveIds)->avg('term');
        $census['term'] = sprintf('%.1f', $term);
        return $census;
    }


    /**
     * @param $corpModel
     * 初始化平台信息
     */
    private function initCorp($corpModel)
    {
        if (empty($corpModel->tasks))
            return $this->setCorp($corpModel, 0, 0);
        $minMratio = 0;
        $maxMratio = 0;
        $minRatio = 0;
        $maxRatio = 0;
        foreach ($corpModel->tasks as $task) {
            if ($task->status != 1) continue 1;
            if ($minMratio == 0)
                $minMratio = $task->mratio;
            if ($maxMratio == 0)
                $maxMratio = $task->mratio;
            if ($minRatio == 0)
                $minRatio = $task->ratio;
            if ($maxRatio)
                $maxRatio = $task->ratio;
            $minRatio = $minRatio > $task->ratio ? $task->ratio : $minRatio;
            $maxRatio = $maxRatio > $task->ratio ? $maxRatio : $task->ratio;
            $minMratio = $minMratio > $task->mratio ? $task->mratio : $minMratio;
            $maxMratio = $maxMratio > $task->mratio ? $maxMratio : $task->mratio;
        }

        $corpModel->max_myield = $maxMratio;
        $corpModel->min_myield = $minMratio;
        $corpModel->min_yield = $minRatio;
        $corpModel->max_yield = $maxRatio;
        return $corpModel->save();
    }

    /**
     * @param $corpModel
     * @param $startTime
     * @param $endTime
     * @param $ratio
     * 重新设置投资转化率
     */
    private function setCorp($corpModel, $mratio, $ratio)
    {
        $ratio = (float)$ratio;
        $mratio = (float)$mratio;
        if ($corpModel->min_yield == 0) {
            $corpModel->min_yield = $ratio;
        } else {
            if ($corpModel->min_yield > $ratio) {
                $corpModel->min_yield = $ratio;
            }
        }
        if ($corpModel->max_yield == 0) {
            $corpModel->max_yield = $ratio;
        } else {
            if ($corpModel->max_yield < $ratio) {
                $corpModel->max_yield = $ratio;
            }
        }

        if (empty($corpModel->min_myield)) {
            $corpModel->min_myield = $mratio;
        } else {
            if ($corpModel->min_myield > $mratio) {
                $corpModel->min_myield = $mratio;
            }
        }
        if (empty($corpModel->max_myield)) {
            $corpModel->max_myield = $mratio;
        } else {
            if ($corpModel->max_myield < $mratio) {
                $corpModel->max_myield = $mratio;
            }
        }
        return $corpModel->save();
    }
}