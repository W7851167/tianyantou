<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

class TaskModel extends BaseModel
{
    use SoftDeletes;
    public  $table = 'tasks';
    protected  $primaryKey = 'id';
    protected  $touches = ['corp'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     * 图片信息
     */
    public function images()
    {
        return $this->morphMany('App\Models\ImageModel', 'item');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * 公司信息
     */
    public function corp()
    {
        return $this->belongsTo('App\Models\CorpModel','corp_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * 领取任务用户信息
     */
    public function receives()
    {
        return $this->hasMany('App\Models\TaskReceiveModel','task_id');
    }

}
