<?php
/*********************************************************************************
 *  文章逻辑代码仓库
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By phpad
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:BaseModel.php
 * $Author:pzz
 * $Dtime:2016/9/7
 ***********************************************************************************/

namespace App\Repositories;


use App\Models\CategoryModel;
use App\Models\NewModel;

class NewRepository extends BaseRepository
{
    public function __construct(
        NewModel $newModel,
        CategoryModel $categoryModel
    )
    {
        $this->newModel = $newModel;
        $this->categoryModel = $categoryModel;
    }

    /**
     * @param $where
     * @param int $page
     * @param int $limit
     * @return array
     *
     * 返回文章列表
     */
    public function getNewList($where, $page = 1, $limit = 10)
    {
        $orderBy = ['id' => 'desc'];
        $lists = $this->newModel->lists("*", $where, $orderBy, [], $limit, $page);
        $count = $this->newModel->countBy($where);
        return [$count, $lists];
    }

    /**
     * @return mixed
     * 获取系统消息
     */
    public function getSystemCategorys($where)
    {
        return $this->categoryModel->alls(['id','title','created_at','parent_id','page'],$where);
    }

}
