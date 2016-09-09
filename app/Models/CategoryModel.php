<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryModel extends BaseModel
{
    use SoftDeletes;
    public  $table = 'categorys';
    protected  $primaryKey = 'id';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * 资讯列表
     */
    public function news()
    {
        return $this->hasMany('App\Models\NewModel','category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     * 获取内容
     */
    public function article()
    {
        return $this->morphOne('App\Models\ArticleModel', 'item');
    }
}
