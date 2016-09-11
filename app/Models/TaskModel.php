<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

class TaskModel extends BaseModel
{
    use SoftDeletes;
    public  $table = 'tasks';
    protected  $primaryKey = 'id';
    protected  $touches = ['corp'];


    public function images()
    {
        return $this->morphMany('App\Models\ImageModel', 'item');
    }

    public function corp()
    {
        return $this->belongsTo('App\Models\CorpModel','corp_id');
    }

}
