<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:TestController.php
 * $Author:zxs
 * $Dtime:2016/9/23
 ***********************************************************************************/

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Library\Traits\SmsTrait;
use App\Repositories\CensusRepository;

class TestController extends  Controller
{
    use SmsTrait;
    public function __construct(CensusRepository $census)
    {
        $this->census = $census;
    }

    public function index()
    {
        $result = $this->sendSms();
        var_dump($result);
        $data = 'i7CJYL4qadNUi16Al7E350BYnq4BH85qFetXgJ810cs101LIDrD8Vzyx7pNP3qBKfJCHNYNd38CpZ3OreVOD7xbgbMxmPkPtO1HlRIOZGn442LXK9TWJQZRkwymm5YcIMCJRYxaVt8hAsG%252F%252FJImFVB77kNvuDkQ3YFtdkNesTgk%253D';
        //$query = 'access_token%3Dae9f121192835254bdf62e2ec05d607ad78e56acb158e415d6dfbbe62acb87196f0d023109babd16%3B%20Domain%3Dwww.91wangcai.com%3B%20Expires%3DFri%2C%2023-Sep-2016%2016%3A54%3A45%20GMT%3B%20Path%3D/%0Atinfo%3D79e349278a3bd70615d23c575601d09fee9979ad1a90f41634771cce077243018c58d026ec87ebefcf570134a8f1f48d89825c88ac1c799c1a6e34ab2073b626e28de21697b43acb3dae15e4e7f62791e637d6917b75cae011cd866b1238b3d00c06911954b2241fd3f2513b6ad8c9f6a98070b6624c01358d6ebee7dd2006baeaeea542dd4d511f6eb9510c0087dbb4%3B%20Domain%3Dwww.91wangcai.com%3B%20Path%3D/%0Abinfo%3De73aef4c32921a90b31c00dfffe87e2ddbb1e2735df4f4043324709ff75937a2800845ba19ebc3464e1b421b92e7428bdbc70d67b83c30440ea9870b43e16632%3B%20Domain%3Dwww.91wangcai.com%3B%20Path%3D/%0Aclient_id%3D91wangcai%3B%20Domain%3Dwww.91wangcai.com%3B%20Path%3D/%0Awallet_token%3D4b7e74bc-a1fa-3181-907d-01e0ebbfc839%3B%20Domain%3Dwww.91wangcai.com%3B%20Path%3D/%0Aadw_nm%3Dtzjzhuxishun%3B%20Domain%3Dwww.91wangcai.com%3B%20Path%3D/%0Aadvisor_simg%3D%22%22%3B%20Domain%3Dwww.91wangcai.com%3B%20Path%3D/%0Aadvisor_name%3D%22%22%3B%20Domain%3Dwww.91wangcai.com%3B%20Path%3D/%0Aadvisor_id%3D%22%22%3B%20Domain%3Dwww.91wangcai.com%3B%20Path%3D/%0Aadvisor_phone%3D%22%22%3B%20Domain%3Dwww.91wangcai.com%3B%20Path%3D/%0ABUID%3DwKgFAlflWtGkw36oBdyBAg%3D%3D%3B%20expires%3DThu%2C%2011-Apr-19%2016%3A39%3A45%20GMT%3B%20domain%3D91wangcai.com%3B%20path%3D/%0A__jsluid%3Df671fe31a23c3da9449b27b063b4a062%3B%20max-age%3D31536000%3B%20path%3D/%3B%20HttpOnly';
        //dd(urldecode($query));
        $info = 'e73aef4c32921a90b31c00dfffe87e2ddbb1e2735df4f4043324709ff75937a2800845ba19ebc3464e1b421b92e7428bdbc70d67b83c30440ea9870b43e16632';

        dd(crc32($info));
    }

}