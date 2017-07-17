<?php
 namespace App\Models;
 use App\Eloquent\Model;
 use Illuminate\Support\Facades\DB;
 class CouponModel extends Model
 {
     public $table = 'corp_coupon';
     protected $primaryKey = 'coupon_id';
     //手机前端获取红包数据
     public function getCoupon($userid){
        //$return = $this->where('get_user','not like',"'%44%'")->get();
        $coupon = DB::select("Select ad_corp_coupon.*,a.name From ad_corp_coupon INNER JOIN ad_corps a on ad_corp_coupon.corp_id=a.id 
                              Where get_user not like '%$userid%' and (user_id='$userid' or user_id=0)");
        return $coupon;
     }

     //管理后台获取红包列表
     public function getCoupon_corp(){
        return $this->get();
     }

 }