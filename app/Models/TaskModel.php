<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
    public  $table = 'tasks';
    protected  $primaryKey = 'id';


    public function images()
    {
        return $this->morphMany('App\Models\ImageModel', 'item');
    }
}
