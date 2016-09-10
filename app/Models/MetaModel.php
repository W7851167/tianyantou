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
     * @param $data
     * 保存元数据信息
     */
    public static function saveMeta($data){
        $model = new static;
        $data = $data ? $data : Request::all();
        $data = array_except($data, ['_token', '_url', 's']);

        if(!empty($data['meta_key']) && !empty($data['item_id']) && !empty($data['item_type'])) {
            $model = static::where('meta_key',$data['meta_key'])
                            ->where('item_id',$data['item_id'])
                            ->where('item_type',$data['item_type'])
                            ->first();
            static::setModelData($model, $data);
            return $model->save();
        }
        return static::query()->insertGetId($data);
    }

    /**
     * 通过meta_key查找
     */
    public static  function getMeta($metaKey,$itemId,$itemType)
    {
        $model = static::where('meta_key',$metaKey)
            ->where('item_id',$itemId)
            ->where('item_type',$itemType)
            ->first();
        if(empty($model)) return null;
        $model->meta_value = unserialize($model->meta_value);
        return $model;
    }
}
