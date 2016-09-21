<?php

namespace App\Models;



class PastModel extends BaseModel
{
    protected  $table = 'pasts';
    protected $primaryKey = 'id';

    /**
     * @param $userId
     * 用户签到
     */
    public function record($userId)
    {

        $sql = "UPDATE ad_pasts SET days = ";
        $sql .= "CASE WHEN TO_DAYS(updated_at) = TO_DAYS(now()) - 1 THEN (days + 1) MOD 7 ";
        $sql .= "ELSE 0 END WHERE user_id = ?";
        return $this->getConnection()->update($sql,[$userId]);
    }

}
