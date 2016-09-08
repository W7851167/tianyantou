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


}