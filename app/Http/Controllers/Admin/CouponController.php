<?php
namespace App\Http\Controllers\Admin;
use App\Http\Requests\Request;
use App\Models\CouponModel;
use App\Http\Controllers\AdminController;
class CouponController extends AdminController
{
    public function __construct(

    ) {
        parent::__initalize();

    }
    public function index(Request $request)
    {

        $model = new CouponModel();
        $return = $model->getCoupon_corp();
        switch ($status){

        }
        return view('admin.Coupon.index')->with();
    }
}