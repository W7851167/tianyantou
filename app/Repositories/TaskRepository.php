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
use App\Models\TaskModel;
use Illuminate\Database\QueryException;

class TaskRepository extends  BaseRepository
{
    public function __construct(
        TaskModel $taskModel,
        CorpModel $corpModel,
        CorpTermModel $corpTermModel,
        ImageModel $imageModel
    )
    {
        $this->taskModel = $taskModel;
        $this->corpModel = $corpModel;
        $this->corpTermModel = $corpTermModel;
        $this->imageModel = $imageModel;
    }

    /**
     * @param $search
     * @param $limit
     * @param $page
     * 获取公司列表
     */
    public function getCorpList($where = [], $limit, $page)
    {
        $lists = $this->corpModel->lists(['*'], $where, [], [], $limit, $page);
        $counts = $this->corpModel->countBy($where);
        return [$counts, $lists];
    }

    /**
     * @param array $where
     * 获取所有项目
     */
    public function getNormalCorps($where = [])
    {
        $fields = ['*'];
        return $this->corpModel->alls($fields, $where);
    }


    /**
     * @param array $where
     * @param $limit
     * @param $page
     * @return array
     * 获取投标列表
     */
    public function getTaskList($where = [], $limit, $page, $trashed=0)
    {
        $lists = $this->taskModel->lists(['*'], $where, [], [], $limit, $page,$trashed);
        $counts = $this->taskModel->countBy($where);
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
        try {
            $termId = $this->corpTermModel->saveBy($data);
            $termId = !empty($data['id']) ? $data['id'] : $termId;
            if(!empty($avatar)) {
                $imageData['item_id'] = $termId;
                $imageData['item_type'] = 'App\Models\CorpTermModel';
                $imageData['name'] = $avatar;
                $this->imageModel->saveImage($imageData,true);
            }
            return static::getSuccess('创建公司团队成功');
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
        try {
            $this->taskModel->saveBy($data);
            return static::getSuccess('创建/编辑项目完成');
        }catch (QueryException $e) {
            return static::getError($e->getMessage());
        }
    }


}