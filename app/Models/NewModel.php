<?php

namespace App\Models;


class NewModel extends BaseModel
{
    public  $table = 'news';
    protected  $primaryKey = 'id';


    public function images()
    {
        return $this->morphMany('App\Models\ImageModel', 'item');
    }
}
