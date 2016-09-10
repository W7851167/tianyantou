<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

class ImageModel extends BaseModel
{
    use SoftDeletes;
    public  $table = 'images';
    protected  $primaryKey = 'id';

    public function item()
    {
        return $this->morphTo();
    }

    /**
     * @param $data
     * @param bool|false $isSignle 是否为一对一的修改
     * 保存信息
     */
    public function saveImage($data, $isSignle=false){
        $model = $this;
        $data = $data ? $data : Request::all();
        $data = array_except($data, ['_token', '_url', 's']);
        //传递主键
        if(!empty($data[$this->primaryKey])) {
            $model = $this->findOrNew($data[$this->primaryKey]);
            $model = $model ? $model : $this;
            $this->setModelData($model, $data);
            return $model->save();
        }
        //单一修改
        if($isSignle) {
            if(!empty($data['item_id']) && !empty($data['item_type'])) {
                $model = $this->where('item_id', $data['item_id'])->where('item_type',$data['item_type'])->first();
                $model = $model ? $model : $this;
                $this->setModelData($model, $data);
                return $model->save();
            }
        }
        return $this->query()->insertGetId($data);
    }

    /**
     * @param $itemId
     * @param $itemType
     * 通过item_id和item_type删除图片信息
     */
    public function deleteImage($itemId, $itemType) {
        return $this->where('item_id',$itemId)
            ->where('item_type',$itemType)
            ->delete();
    }

}
