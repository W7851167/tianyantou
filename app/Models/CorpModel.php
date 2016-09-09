<?php

namespace App\Models;


class CorpModel extends BaseModel
{
    public  $table = 'corps';
    protected  $primaryKey = 'id';


    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     * 获取
     */
    public function images()
    {
        return $this->morphMany('App\Models\ImageModel', 'item');
    }

    /**
     * 获取scheme数据信息
     */
    public function metas()
    {
        return $this->morphOne('App\Models\MetaModel', 'item');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * 获取项目任务
     */
    public function tasks()
    {
        return $this->hasMany('App\Models\TaskModel','corp_id');
    }
}
