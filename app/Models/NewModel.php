<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

class NewModel extends BaseModel
{
    public  $table = 'news';
    protected  $primaryKey = 'id';


    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     * 对应主图
     */
    public function image()
    {
        return $this->morphOne('App\Models\ImageModel', 'item');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     * 对应内容
     */
    public function article()
    {
        return $this->morphOne('App\Models\ArticleModel', 'item');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * 获取分类信息
     */
    public function category()
    {
        return $this->belongsTo('App\Models\CategoryModel','category_id');
    }
}
