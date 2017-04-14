<?php
/*********************************************************************************
 *  H5基础控制器
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:AdminController.php
 * $Author:wyw
 * $Dtime:2017/3/31
 ***********************************************************************************/

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class MobileController extends Controller
{
    protected $perpage = 10;
    protected $user;


    public function __initalize()
    {
        $this->user = Session::get('user.passport');
//        if(!empty($this->user) && $this->user['role'] != '管理员') {
//            return abort(500,'非管理员不能登录超级后台');
//        }
        view()->share('user', $this->user);
        list($menu, $sidebarHtml) = getNavConfig();
        view()->share('menu', $menu);
        view()->share('silderMenu', $sidebarHtml);
    }


    /**
     * 分页数码
     * @param int $count 总数目
     * @param int $每页数目
     * @param string 页数
     */
    public function pager($count, $currentPage = 0, $perPage = 0, $pageUrl = '', $str = '', $ajax = false)
    {
        $currentPage = $currentPage ? $currentPage : Request::input('page');
        $url = $pageUrl ? $pageUrl : url(Request::path());
        $url = trim($url) . $str;
        $limit = $perPage ? $perPage : $this->perpage;
        $pager = app()->make('LibraryManager')->create('page');
        $pageHtml = $pager->pageInit($count, $currentPage, $limit, $url, $ajax)->links();
        if ($count == 0) $pageHtml = '';
        return $pageHtml;
    }


}