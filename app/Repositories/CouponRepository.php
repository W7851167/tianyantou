<?php

namespace App\Repositories;


use App\Models\CorpModel;
use App\Models\CouponModel;

class CouponRepository extends BaseRepository
{
        function __construct(
            CouponModel $CouponModel,
            CorpModel $corpModel
        )
        {
            $this->CouponModel = $CouponModel;
            $this->CorpModel = $corpModel;
        }
        //获取单条红包信息（xie2017/7/24）
        function firstCoupon($coupon_id)
        {
            $coupon = $this->CouponModel->where('coupon_id', $coupon_id)->first();
            if (empty($coupon)) {
                return $this->getError('参数错误');
            }
            if ($coupon->pertinence == 0) {
                $name= $this->CorpModel->where('id', $coupon->corp_id)->select('name')->first();
                $coupon['corp_name'] = $name->name;
                $coupon['pertinence_name'] = '无限制';
            } else {
               $corp = $this->CorpModel->corpName([$coupon->corp_id ,$coupon->pertinence]);
               $for = array();
               foreach ($corp as $value){
                   $for[$value->id] = $value->name;
               }
                $coupon['corp_name'] = $for[$coupon->corp_id];
                $coupon['pertinence_nmae'] = $for[$coupon->pertinence];
            }
           ;
            return $this->getSuccess($coupon);

        }

}