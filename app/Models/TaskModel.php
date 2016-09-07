<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
    public  $table = 'tasks';
    protected  $primaryKey = 'id';
    protected  $touches = ['corp'];


    public function images()
    {
        return $this->morphMany('App\Models\ImageModel', 'item');
    }

    public function corp()
    {
        return $this->belongsTo('App\Models\CorpModel');
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\UserModel');
    }
}
