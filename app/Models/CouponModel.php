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

     //提交任务时使用红包(7-16)
     public function submitCoupon($user_id,$corp_id,$month,$sum,$time){
         return DB::select("Select * From ad_corp_coupon Where (user_id=? or user_id=0) and (pertinence=? or pertinence=0) and sum<? and month<? and start_time <'$time'<over_time and get_user not like '%$user_id%' and nature=0",[$user_id,$corp_id,$sum,$month]);
     }
     //管理后台获取红包列表
     public function getCoupon_corp($where){

        $sql = DB::select("Select ad_corp_coupon.*,a.name From ad_corp_coupon INNER JOIN ad_corps a on ad_corp_coupon.corp_id=a.id Where $where");
        $count = DB::select("Select count(1) as zs From ad_corp_coupon Where $where");

        $count= $count[0]->zs;
        return [$sql,$count];
     }
     //添加使用记录(7-19)
     public function UseCoupon($user_id,$corp_id){
        DB::update("Update ad_corp_coupon set get_user=concat_ws(',',get_user,$user_id)where coupon_id=?",[$corp_id]);
     }

 }