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
use App\Models\TaskModel;

class TaskRepository extends  BaseRepository
{
    public function __construct(
        TaskModel $taskModel,
        CorpModel $corpModel
    )
    {
        $this->taskModel = $taskModel;
        $this->corpModel = $corpModel;
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
        return $this->corpModel->saveBy($data);
    }

    /**
     * @param $id
     *  还原回收站数据
     */
    public function untrashed($id)
    {
        $this->taskModel->withTrashed()->find($id)->restore();
        return $this->taskModel->saveBy(['id'=>$id,'status'=>0]);
    }


}