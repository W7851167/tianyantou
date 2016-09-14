<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

class LinkModel extends BaseModel
{
    use SoftDeletes;
    public  $table = 'links';
    protected  $primaryKey = 'id';
    
    public function  image()
    {
        return $this->morphOne('App\Models\ImageModel','item');
    }
}
