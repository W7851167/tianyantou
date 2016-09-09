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
    ) {
        $this->taskModel = $taskModel;
        $this->corpModel = $corpModel;
    }

    /**
     * @param $search
     * @param $limit
     * @param $page
     * 获取公司列表
     */
    public function getCorpList($where=[], $limit, $page)
    {
        $lists = $this->corpModel->lists(['*'],$where,[],[], $limit, $page);
        $counts = $this->corpModel->countBy($where);
        return [$counts, $lists];
    }

    /**
     * @param array $where
     * @param $limit
     * @param $page
     * @return array
     * 获取投标列表
     */
    public function getTaskList($where=[], $limit,$page)
    {
        $lists = $this->taskModel->lists(['*'],$where,[],[], $limit, $page);
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


}