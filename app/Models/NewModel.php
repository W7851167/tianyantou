<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

class NewModel extends BaseModel
{
    use SoftDeletes;
    public  $table = 'news';
    protected  $primaryKey = 'id';


    public function images()
    {
        return $this->morphMany('App\Models\ImageModel', 'item');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\CategoryModel','category_id');
    }
}
