<?php

namespace App\Models;


class MetaModel extends BaseModel
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


    /**
     * 通过meta_key查找
     */
    public function getMeta($data)
    {
        return $this->where('meta_key',$data['meta_key'])
            ->where('item_id',$data['item_id'])
            ->where('item_type',$data['item_type'])
            ->first();
    }

    /**
     * @param $data
     * @return mixed
     * 保存元数据信息
     */
    public function saveMeta($data)
    {
        if($model = $this->getMeta($data)) {
            $model->meta_value = $data['meta_value'];
            return $model->save();
        } else {
            return $this->firstOrCreate($data);
        }
    }
}
