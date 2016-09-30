<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

class RoleModel extends BaseModel
{
    use SoftDeletes;
    protected $table = 'roles';
    protected $primaryKey = 'id';

}
