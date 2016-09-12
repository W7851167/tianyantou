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

namespace App\Http\Front;


use App\Http\Controllers\FrontController;
use App\Repositories\NewRepository;

class AboutController extends FrontController
{
    public function __construct(
        NewRepository $new
    )
    {
        parent::__initalize();
        $this->new = $new;
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
        if (empty($category)) return redirect('adbout/help.html');

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

        return redirect('about/help.html');
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
        return view('front.about.' . $category->page);
    }

    /**
     * 帮助中心
     */
    private function help($category)
    {
        return view('front.about.' . $category->page);
    }

    /**
     * 公告/事件
     */
    private function notice($category)
    {
        return view('front.about.' . $category->page);
    }

    /**
     * 月度报告
     */
    private function monthly($category)
    {
        return view('front.about.' . $category->page);
    }
}