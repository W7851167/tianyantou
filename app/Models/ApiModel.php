<?php

namespace App\Models;


class ApiModel extends BaseModel
{
    public  $table = 'apis';
    public $primaryKey = 'id';
    protected $casts = [
        'options' => 'array',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * 公司信息
     */
    public function corp()
    {
        return $this->belongsTo(CorpModel::class,'corp_id');
    }

}
