<?php

namespace App\Models;


class TaskAchieveModel extends BaseModel
{
    public $table = 'task_achieves';
    protected $primaryKey = 'id';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * 任务模型
     */
    public function task()
    {
        return $this->belongsTo('App\Models\TaskModel','task_id');
    }

    /**
     * 接收任务模型
     */
    public function receive()
    {
        return $this->belongsTo('App\Models\TaskReceiveModel','receive_id');
    }
}
