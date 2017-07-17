<?php

namespace App\Models;

use App\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ShareModel extends Model
{
    public $table = 'share';
    protected $primaryKey = 'user_id';

    public function index()
    {

    }
    public function userAdd($data){
        $return = DB::update("insert into ad_share(user_id,login_number,moneys) values('$data','1','0.00') on DUPLICATE KEY UPDATE login_number=login_number+1");
    }
}