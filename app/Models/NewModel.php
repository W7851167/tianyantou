<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewModel extends Model
{
    public  $table = 'news';
    protected  $primaryKey = 'id';


    public function images()
    {
        return $this->morphMany('App\Models\ImageModel', 'item');
    }
}
