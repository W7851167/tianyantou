<?php

namespace App\Models;


class CorpModel extends BaseModel
{
    public  $table = 'corps';
    protected  $primaryKey = 'id';


    public function logo()
    {
        return $this->morphOne('App\Models\ImageModel', 'item');
    }

    public function tasks()
    {
        return $this->hasMany('App\Models\TaskModel','corp_id');
    }
}
