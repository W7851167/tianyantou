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


use App\Models\ArticleModel;
use App\Models\CategoryModel;
use App\Models\ImageModel;
use App\Models\NewModel;
use Illuminate\Database\QueryException;

class NewRepository extends BaseRepository
{
    public function __construct(
        NewModel $newModel,
        CategoryModel $categoryModel,
        ArticleModel $articleModel,
        ImageModel $imageModel
    )
    {
        $this->newModel = $newModel;
        $this->categoryModel = $categoryModel;
        $this->articleModel = $articleModel;
        $this->imageModel = $imageModel;
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
        return $this->categoryModel->alls(['id', 'title', 'created_at', 'parent_id', 'page'], $where);
    }

    /**
     * @param $itemId
     * @param $itemType
     * @param $content
     */
    public function saveArticle($data)
    {
        try {
            $this->articleModel->saveBy($data);
            return static::getSuccess('保存文章内容完成');
        } catch (QueryException  $e) {
            return static::getError($e->getMessage());
        }
    }

    /**
     * @param $data
     * @return array
     * @throws \Exception
     * @throws \Throwable
     *
     * 保存多图文信息
     */
    public function saveMultiNew($data)
    {
        $result = $this->newModel->getConnection()->transaction(function () use ($data) {
            $logo = $data['logo'];
            $content = $data['content'];
            $data = array_except($data, ['logo', 'content']);

            $id = $this->newModel->saveBy($data);
            $id = !empty($data['id']) ? $data['id'] : $id;
            $isSingle = !empty($data['id']) ? true : false;
            $saveData = ['item_id' => $id, 'item_type' => 'App\Models\NewModel'];
            if (!empty($logo)) {
                $this->imageModel->saveImage(array_merge($saveData,
                    ['name' => $logo]), $isSingle);
            }
            if (!empty($content)) {
                $this->articleModel->saveArticle(array_merge($saveData,
                    ['content' => $content]), $isSingle);
            }
        });
        if ($result instanceof Exception) {
            return $this->getError($result->getMessage());
        } else {
            return $this->getSuccess('success', $result);
        }
    }

    /**
     * @param $id
     * 删除新闻内容
     */
    public function deleteNews($id)
    {
        $result = $this->newModel->getConnection()->transaction(function () use ($id) {
            $this->newModel->find($id)->delete();
            $this->articleModel->deleteArticle($id, 'App\Models\NewModel');
            $this->imageModel->deleteImage($id, 'App\Models\NewModel');
        });

        if ($result instanceof Exception) {
            return $this->getError($result->getMessage());
        } else {
            return $this->getSuccess('success', $result);
        }
    }
}
