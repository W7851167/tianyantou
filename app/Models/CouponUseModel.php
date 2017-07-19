<?php
namespace App\Models;
use App\Eloquent\Model;

class CouponUseModel extends Model{
    public $table = 'coupon_use';
    protected $primaryKey = 'use_id';

    //添加一条数据进数据库（7-19）
    public function addUse($data){
      return  $this->insertGetId($data);
    }
}