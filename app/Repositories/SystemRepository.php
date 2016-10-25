<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/28/028
 * Time: 22:32
 */

namespace App\Repositories;


use App\Models\MetaModel;
use Illuminate\Database\QueryException;

class SystemRepository extends BaseRepository
{
    public function  __construct(MetaModel $metaModel)
    {
        $this->metaModel = $metaModel;
    }

    /**
     * @param $data
     * @return array
     * 保存系统配置信息
     */
    public function saveSystemMeta($data){
        if(!is_array($data)) return static::getError('参数传递错误');
        while(list($key,$value) = each($data)) {
            $metaData['item_id'] = 0;
            $metaData['item_type'] = 'system';
            $metaData['meta_key'] = $key;
            $metaData['meta_value'] = serialize($value);
            try {
                $this->metaModel->saveMeta($metaData);
            } catch (QueryException $e) {
                return static::getError($e->getMessage());
            }
        }
        return static::getSuccess('创建/修改信息完成');
    }

    /**
     * 获取所有配置信息
     */
    public function getSystemMetas($keys=[])
    {
        if(!is_array($keys))
            return false;
        if(empty($keys)) {
            $models = $this->metaModel->system()->get();
        } else if(count($keys) == 1) {
            $models[] = $this->metaModel->system()->where('meta_key',$keys[0])->first();
        } else {
            $models = $this->metaModel->system()->whereIn('meta_key',$keys)->get();
        }
        return getMetas($models,$keys,false);
    }










}