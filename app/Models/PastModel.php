<?php

namespace App\Models;



class PastModel extends BaseModel
{
    protected  $table = 'pasts';
    protected $primaryKey = 'id';
    protected  $fillable = ['user_id','days'];


}
