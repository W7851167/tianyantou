<?php

namespace App\Models;


class RecordModel extends BaseModel
{
    protected $table = 'records';
    protected  $primaryKey = 'id';
    protected $fillable = ['user_id','type','income','cost','account','remark'];

    public function user()
    {
        return $this->belongsTo('App\Models\UserModel');
    }


}
