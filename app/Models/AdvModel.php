<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
class AdvModel extends BaseModel
{
    use SoftDeletes;
    public  $table = 'advs';
    protected  $primaryKey = 'id';
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     * 获取
     */

}
