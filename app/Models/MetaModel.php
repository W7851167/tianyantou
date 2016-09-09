<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetaModel extends Model
{
    protected  $table = 'metas';
    protected  $primaryKey ='id';
    public  $timestamps = false;
    public  $fillable = ['item_id','item_type','meta_key','meta_value'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     * 获取信息
     */
    public function item()
    {
        return $this->morphTo();
    }
}
