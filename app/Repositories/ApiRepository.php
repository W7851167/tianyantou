<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:ApiRepository.php
 * $Author:zxs
 * $Dtime:2016/11/9
 ***********************************************************************************/

namespace App\Repositories;


use App\Models\ApiModel;

class ApiRepository extends  BaseRepository
{
    public function __construct(ApiModel $apiModel)
    {
        $this->apiModel = $apiModel;
    }


    /**
     * @param array $where
     * @param $limit
     * @param $page
     * @param int $trashed
     * @return array
     */
    public function getApiList($where = [], $limit, $page, $trashed = 0)
    {
        $order['updated_at'] = 'desc';
        $lists = $this->apiModel->lists(['*'], $where, $order, [], $limit, $page, $trashed);
        $counts = $this->apiModel->countBy($where);
        return [$counts, $lists];
    }

}