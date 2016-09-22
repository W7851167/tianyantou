<?php
/*********************************************************************************
 * 前台基础控制器
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:FrontController.php
 * $Author:pzz
 * $Dtime:2016/9/7
 ***********************************************************************************/

namespace App\Http\Controllers;


use App\Models\PastModel;

class FrontController extends Controller
{
    protected $user;
    protected $perpage = 10;


    public function __initalize()
    {
        $this->user = \Session::get('user.passport');
        if(!empty($this->user)) {
            $action = \Route::current()->getActionName();
            list($class, $method) = explode('@', $action);
            $class = str_replace('controller','', strtolower(substr(strrchr($class,'\\'),1)));
            view()->share('controller',$class);
            view()->share('method', $method);
            $pass = PastModel::find($this->user['id']);
            view()->share('sign', getPast($pass));
        }
        view()->share('user', $this->user);
    }

    /**
     * 分页数码
     * @param int $count 总数目
     * @param int $每页数目
     * @param string 页数
     */
    public function pager($count, $currentPage = 1, $perPage = 10, $ajax = false, $pageUrl = '')
    {
        $pager = app()->make('LibraryManager')->create('paginate');
        $url = $pageUrl ? $pageUrl : url(\Request::path());
        $pageHtml = $pager->pageInit($count, $currentPage, $perPage, $ajax, $url)->links();

        return $pageHtml;
    }
}