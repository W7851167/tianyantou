<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

class TaskModel extends BaseModel
{
    use SoftDeletes;
    public  $table = 'tasks';
    protected  $primaryKey = 'id';
    protected  $touches = ['corp'];
	protected $casts = [
        'packet' => 'array',
		'plat_reward'=>'array',
    ];

    /**
     *获取任务列表(17-6-29xie)
     */
    public function taskslist($where){
        return $this->where($where)->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     * 图片信息
     */
    public function images()
    {
        return $this->morphMany(ImageModel::class, 'item');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * 公司信息
     */
    public function corp()
    {
        return $this->belongsTo(CorpModel::class,'corp_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * 领取任务用户信息
     */
    public function receives()
    {
        return $this->hasMany(TaskReceiveModel::class,'task_id');
    }

}
