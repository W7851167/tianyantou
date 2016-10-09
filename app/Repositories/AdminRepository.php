<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:AdminRepository.php
 * $Author:zxs
 * $Dtime:2016/10/1
 ***********************************************************************************/

namespace App\Repositories;


use App\Models\RoleModel;

class AdminRepository extends  BaseRepository
{
    public function __construct(RoleModel $roleModel)
    {
        $this->roleModel = $roleModel;
    }

    public function getRoleList($where,  $limit = 10,$page = 1)
    {
        $orderBy = ['created_at' => 'desc'];
        $lists = $this->roleModel->lists("*", $where, $orderBy, [], $limit, $page);
        $count = $this->roleModel->countBy($where);
        return [$count, $lists];
    }

    /**
     * @param $data
     * 保存角色信息
     */
    public function saveRole($data)
    {
        return $this->roleModel->saveBy($data);
    }

}