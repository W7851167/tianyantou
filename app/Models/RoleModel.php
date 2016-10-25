<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

class RoleModel extends BaseModel
{
    use SoftDeletes;
    protected $table = 'roles';
    protected $primaryKey = 'id';

    public function users()
    {
        return $this->hasMany('App\Models\UserModel','roles','id');
    }

    public function setRolesAttribute($value){
        $this->attributes['roles'] = implode(',',$value);
    }

    public function getRolesAttribute($value)
    {
        return explode(',', $value);
    }
}
