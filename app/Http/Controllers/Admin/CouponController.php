<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\CouponModel;
use App\Models\CorpModel;
use App\Http\Controllers\AdminController;
class CouponController extends AdminController
{
    public function __construct(

    )
    {
        parent::__initalize();

    }

    public function index(Request $request, $status = null)
    {
        $page = !empty($request->get('page')) ? $request->get('page') : 1;
        $couponModel = new CouponModel();
        if($status==1){
            $where = "user_id=0 and pertinence!=0";
        }elseif ($status==2){
            $where = "user_id!=0";
        }else{
            $where = "user_id=0 and pertinence=0";
        }
        list($coupon,$count) = $couponModel->getCoupon_corp($where);
        if($status!=null){
            $returnFor = array();
            foreach ($coupon as $k=>$v){
                $v->pertinence==0 ? '' : $returnFor[]= $v->pertinence;
            }
            $corp = new CorpModel();
            $var = $corp->corpName(array_unique($returnFor));
            $array['0'] = '无限制';
            foreach ($var as $value){
                $array[$value->id] = $value->name;
            }
            foreach ($coupon as $value){
                $value->pertinence = $array[$value->pertinence];
            }
        }
        return view('admin.Coupon.index',compact('status','coupon'));
    }

    public function create(Request $request,$id=null){
        $couponModel = new CouponModel();
        if($request->isMethod('post')) {
            $data = $request->get('coupon');
            if (empty($data['corp_id']) or empty($data['moneys']) or empty($data['month']) or empty($data['sum']) ) return $this->error('请填写完整数据', null, 'true');
            $coupon_id = $request->get('coupon_id');
            if (empty($coupon_id)) {
                if ($couponModel->insert($data)) {
                    return $this->success('添加成功', '/coupon', 'true');
                } else {
                    return $this->error('添加失败', null, 'ture');
                }
            }else{
                if($couponModel->where('coupon_id',$coupon_id)->update($data)){
                    return $this->success('修改成功', '/coupon', 'true');
                } else {
                    return $this->error('修改失败', null, 'ture');
                }
            }
        }
        $corpModel = new CorpModel();
        $where['status'] = '1';
        $corp = $corpModel->corp($where);
        if(!empty($id)){
            $coupon = $couponModel->where('coupon_id', $id)->first();
            if(empty($coupon)){
                return $this->error('参数错误','.coupon');
            }
            return view('admin.Coupon.create',compact('corp','coupon'));
        }
        return view('admin.Coupon.create',compact('corp'));
    }
}