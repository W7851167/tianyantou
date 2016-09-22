<?php

namespace App\Models;



class PastModel extends BaseModel
{
    protected  $table = 'pasts';
    protected $primaryKey = 'user_id';
    protected  $fillable = ['user_id'];


}
