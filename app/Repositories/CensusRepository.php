<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 统计说明
 *-------------------------------------------------------------------------------
 * $FILE:CensusRepository.php
 * $Author:zxs
 * $Dtime:2016/9/15
 ***********************************************************************************/
namespace App\Repositories;


use App\Models\ArticleModel;
use App\Models\CategoryModel;
use App\Models\ImageModel;
use App\Models\NewModel;
use Illuminate\Database\QueryException;

class CensusRepository extends BaseRepository
{
    /**
     * @param $userId
     * @param $startTime
     * @param $endTime
     * 查询投资统计
     */
    public function getIncomesStats($userId,$startTime, $endTime)
    {

    }
}