<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 单独模块
 *-------------------------------------------------------------------------------
 * $FILE:PublicRepository.php
 * $Author:zxs
 * $Dtime:2016/9/13
 ***********************************************************************************/
namespace App\Repositories;

use App\Models\AdvModel;
use App\Models\ImageModel;
use App\Models\LinkModel;
use Illuminate\Database\QueryException;

class XdataRepository extends  BaseRepository {
    public function __construct(
        AdvModel $advModel,
        ImageModel $imageModel,
        LinkModel $linkModel
    ) {
        $this->advModel = $advModel;
        $this->imageModel = $imageModel;
        $this->linkModel = $linkModel;
    }

       /**
     * @param array $where
     * @param $limit
     * @param $page
     * @return array
     * 获取广告列表
     */
    public function getAdvList($where = [], $limit, $page, $trashed=0)
    {
        $order['sorts'] = 'desc';
        $lists = $this->advModel->lists(['*'], $where, $order, [], $limit, $page,$trashed);
        $counts = $this->advModel->countBy($where);
        return [$counts, $lists];
    }


    /**
     * @param array $where 查询条件
     * @param $limit       每页展示多少
     * @param $page        页码
     * @return array
     * 获取友情链接信息
     */
    public function getLinkList($where = [], $limit, $page)
    {
        $order['sorts'] = 'desc';
        $lists = $this->linkModel->lists(['*'], $where, $order, [], $limit, $page);
        $counts = $this->linkModel->countBy($where);
        return [$counts, $lists];
    }


    /**
     * @param $data
     * 保存信息
     */
    public function saveLink($data)
    {
        try {
            $this->linkModel->saveBy($data);
            return static::getSuccess('创建或编辑友情链接成功');
        } catch (QueryException $e) {
            return static::getError($e->getMessage());
        }
    }
    public function deleteLink($id)
    {
        try {
            $term = $this->LinkModel->find($id);
            $term->delete();
            $this->linkModel->deleteLink($id, 'App\Models\LinkModel');
            return static::getSuccess('删除链接信息完成');
        } catch (QueryException $e) {
            return static::getError($e->getMessage());
        }


        if ($result instanceof Exception) {
            return $this->getError($result->getMessage());
        } else {
            return $this->getSuccess('success', $result);
        }
    }


    /**
     * @param $data
     * 保存广告信息
     */
    public function saveAdv($data)
    {

        $result = $this->advModel->getConnection()->transaction(function() use($data){
            if(!empty($data['img'])) {
                $img = $data['img'];
                unset($data['img']);
            }
            $advId = $this->advModel->saveBy($data);
            $advId = !empty($data['id']) ? $data['id'] : $advId;
            if(!empty($img)) {
                $imageData['item_id'] = $advId;
                $imageData['item_type'] = 'App\Models\AdvModel';
                $imageData['name'] = $img;
                $this->imageModel->saveImage($imageData,true);
            }
        });
        if ($result instanceof \Exception) {
            return $this->getError($result->getMessage());
        } else {
            return $this->getSuccess('创建/编辑广告信息完成', $result);
        }
    }

    /**
     * @param $id
     * 删除广告信息
     */
    public function deleteAdv($id)
    {
        try {
            $term = $this->advModel->find($id);
            $term->delete();
            $this->imageModel->deleteImage($id, 'App\Models\AdvModel');
            return static::getSuccess('删除广告信息完成');
        } catch (QueryException $e) {
            return static::getError($e->getMessage());
        }
    }
}