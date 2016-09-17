<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

class NewModel extends BaseModel
{
    use SoftDeletes;
    public $table = 'news';
    protected $primaryKey = 'id';


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
        return $this->belongsTo('App\Models\CategoryModel', 'category_id');
    }

    /**
     * @param $categoryId
     * @return string
     *
     * 获取分类名称
     */
    public function categoryName($categoryId)
    {
        $category = \App\Models\CategoryModel::find($categoryId);
        return !empty($category) ? $category->title : '无';
    }


    /**
     * @param $page
     * @return string
     *
     * 获取文章详情url
     */
    public function url($page)
    {
        return config('app.url') . '/' . $page . '/' . $this->id . '.html';
    }

    /**
     * @param $path
     * @return string
     *
     * 返回图片地址
     */
    public function imageUrl($path)
    {
        return config('app.static_url') . '/' . $path;
    }
}
