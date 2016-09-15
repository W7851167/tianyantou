<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

class CorpModel extends BaseModel
{
    use SoftDeletes;
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
        return $this->morphMany('App\Models\MetaModel', 'item');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * 获取项目任务
     */
    public function tasks()
    {
        return $this->hasMany('App\Models\TaskModel','corp_id');
    }

    /**
     * 文章内容
     */
    public function article()
    {
        return $this->morphOne('App\Models\ArticleModel', 'item');
    }

    public function terms()
    {
        return $this->hasMany('App\Models\CorpTermModel','corp_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * 新闻动态
     */
    public function news() {
        return $this->hasMany('App\Models\NewModel','corp_id');
    }
}
