<?php

namespace App\Models;


class ScoreModel extends BaseModel
{
    public  $table = 'scores';
    protected  $primaryKey = 'id';
    protected $fillable = ['user_id','score','intro'];

    public function user()
    {
        return $this->belongsTo('App\Models\UserModel','user_id');
    }
}
