<?php
/*********************************************************************************
 *  基础代码仓库
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:BaseModel.php
 * $Author:pzz
 * $Dtime:2016/9/7
 ***********************************************************************************/

namespace App\Repositories;

use Illuminate\Database\QueryException;

class BaseRepository
{
    /**
     * @param $status
     * @param $message
     * @param mixed $data
     *
     * 业务逻辑统一结果输出
     */
    public static function getResult($status, $message, $data=null) {
        if ($data)
            return ['status'=>$status, 'message'=>$message, 'data'=>$data];
        return ['status'=>$status, 'message'=>$message];
    }

    /**
     * @param $message
     * @param $data
     * @return array
     *
     * 返回异常异常结果
     */
    public static function getError($message) {
        return static::getResult(0, $message);
    }

    /**
     * @param $message
     * @param mixed $data
     * @return array
     *
     * 返回正常结果集合
     */
    public static function getSuccess($message, $data=null) {
        return static::getResult(1,$message, $data);
    }


}