<?php

namespace App\Models;


class ImageModel extends BaseModel
{
    public  $table = 'images';
    protected  $primaryKey = 'id';

    public function item()
    {
        return $this->morphTo();
    }

}
