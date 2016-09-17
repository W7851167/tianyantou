<?php
/*********************************************************************************
 * 帮助中心控制器
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By phpad
 * 帮助中心内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:AboutController.php
 * $Author:pzz
 * $Dtime:2016/9/7
 ***********************************************************************************/

namespace App\Http\Controllers\Front;


use App\Http\Controllers\FrontController;
use App\Repositories\NewRepository;
use Illuminate\Http\Request;

class AboutController extends FrontController
{
    public function __construct(
        NewRepository $new
    )
    {
        parent::__initalize();
        $this->new = $new;

        $where = ['is_system' => 1, 'parent_id' => 0];
        $categorys = $this->new->getSystemCategorys($where);
        view()->share('categorys', $categorys);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     *
     * 重定向到关于我们页面
     */
    public function about()
    {
        return redirect('about/company.html');
    }

    /**
     * @param $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     *
     * 关于我们中心
     */
    public function index($page)
    {
        $category = $this->new->categoryModel->wherePage($page)->first();
        if (empty($category)) return redirect('adbout/company.html');
        view()->share('category', $category);

        if ($category->theme == 0)
            return $this->multi($category);
        if ($category->theme == 1)
            return $this->single($category);
        if ($category->theme == 2)
            return $this->help($category);
        if ($category->theme == 3)
            return $this->notice($category);
        if ($category->theme == 4)
            return $this->monthly($category);

        return redirect('about/company.html');
    }

    /**
     * @param Request $request
     * @param $page
     * @param $id
     * 详情页面
     */
    public function detail(Request $request, $page, $id)
    {
        $category = $this->new->getCategoryByPage($page);
        $news = $this->new->getNewInfo(['id' => $id]);
        $first = $this->new->getNewInfo(['id <' => $id, 'category_id' => $category->id]);
        $next = $this->new->getNewInfo(['id >' => $id, 'category_id' => $category->id]);
        return view('front.about.detail', compact('category', 'news', 'first', 'next'));
    }

    /**
     * 但分类文章
     */
    private function single($category)
    {
        return view('front.about.' . $category->page);
    }

    /**
     * 多图文章列表
     */
    private function multi($category)
    {
        $page = \Request::get('page') ? (int)\Request::get('page') : 1;
        $where = ['category_id' => $category->id];
        list($count, $lists) = $this->new->getNewList($where, $page);
        return view('front.about.' . $category->page, compact(
            'lists'
        ));
    }

    /**
     * 帮助中心
     */
    private function help($category)
    {
        $where = ['is_system' => 1, 'parent_id' => 7, 'theme' => 0];
        $hCategorys = $this->new->getSystemCategorys($where);
        return view('front.about.' . $category->page, compact(
            'hCategorys'
        ));
    }

    /**
     * 公告/事件
     */
    private function notice($category)
    {

        $page = \Request::get('page') ? (int)\Request::get('page') : 1;
        $where = ['category_id' => $category->id];
        list($count, $lists) = $this->new->getNewList($where, $page);

        return view('front.about.' . $category->page, compact('lists'));
    }

    /**
     * 月度报告
     */
    private function monthly($category)
    {
        return view('front.about.' . $category->page);
    }
}