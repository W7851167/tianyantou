<?php
/*********************************************************************************
 *  后台基础控制器
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:AdminController.php
 * $Author:pzz
 * $Dtime:2016/9/7
 ***********************************************************************************/

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Request;

class AdminController extends Controller
{
    protected  $perpage = 20;


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