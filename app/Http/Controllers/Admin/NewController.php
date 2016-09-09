<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By phpad
 * 文章控制器管理
 *-------------------------------------------------------------------------------
 * $FILE:NewController.php
 * $Author:zxs
 * $Dtime:2016/9/8
 ***********************************************************************************/

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\AdminController;
use App\Repositories\NewRepository;
use Illuminate\Http\Request;

class NewController extends AdminController
{
    public function __construct(
        NewRepository $new
    )
    {
        $this->new = $new;
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     *
     * 文章列表视图
     */
    public function index(Request $request)
    {
        $page = $request->page ? (int)$request->page : 1;
        $where = ['id' => $this->user['id']];
        list($count, $news) = $this->new->getNewList($where, $page);

        $this->pager($count, $page, $this->perpage);
        return view('admin.news.index', compact(
            'news'
        ));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {

        }

        return view('admin.news.create');
    }

    public function edit($id, Request $request)
    {
        if ($request->isMethod('post')) {

        }

        return view('admin.news.edit');
    }

    public function del($id)
    {

    }
}