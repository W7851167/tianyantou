<?php
/*********************************************************************************
 *  前台分页类
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:Paginate.php
 * $Author:pzz
 * $Dtime:2016/9/7
 ***********************************************************************************/

namespace App\Library\Utils;

class Paginate
{

    protected $count;
    protected $currentPage;
    protected $perPage;
    protected $lastPage;
    protected $url;
    protected $pageUrl;
    protected $ajax;


    /**
     * @param $count 总条数
     * @param $currentPage  当前页
     * @param $perPage  每页显示
     * @param bool $ajax 是否是ajax
     * @param null $pageUrl 拼接路由
     * @return $this
     */
    public function pageInit($count, $currentPage, $perPage, $ajax = false, $pageUrl = null)
    {
        $this->count = (int)$count;
        $this->perPage = (int)$perPage;
        $this->lastPage = ceil($this->count / $this->perPage);
        $this->pageUrl = $pageUrl;
        $this->ajax = $ajax;
        $currentPage = (int)$currentPage;
        $this->currentPage = ($currentPage > $this->lastPage) ? $this->lastPage : (($currentPage < 1) ? 1 : $currentPage);
        $this->url = strpos($this->pageUrl, '?') ? $this->pageUrl . '&' : $this->pageUrl . '?';

        return $this;
    }


    /**
     * @return string
     */
    public function links()
    {
        if ($this->count > $this->perPage) {
            return $this->render();
        } else {
            return '';
        }
    }

    /**
     * @return string 生成主要分页队列代码li元素
     */
    private function render()
    {
        //如果总页面数小于13 则直接全部显示
        if ($this->lastPage < 13) {
            $content = $this->rangePage(1, $this->lastPage);
        } //如果总页面数大于或等于13
        else {
            $content = $this->sliderPage();
        }
        $html = '';
        if ($this->currentPage != 1) $html .= $this->prev();
        return $html . $content . $this->next();
    }

    private function sliderPage()
    {
        $str = '';
        if ($this->lastPage <= 10) {
            for ($i = 1; $i < $this->page + 1; $i++) {
                $str = $str . $this->makepg($i, $this->currentPage);
            }
        } else {
            if ($this->currentPage <= 5) {
                for ($i = 1; $i < 10; $i++) {
                    $str = $str . $this->makepg($i, $this->currentPage);
                }
            } else {
                if (6 + $this->currentPage <= $this->lastPage) {
                    for ($i = $this->currentPage - 4; $i < $this->currentPage + 6; $i++) {
                        $str = $str . $this->makepg($i, $this->currentPage);
                    }
                } else {
                    for ($i = $this->currentPage - 4; $i < $this->lastPage + 1; $i++) {
                        $str = $str . $this->makepg($i, $this->currentPage);
                    }
                }
            }
        }
        return $str;
    }

    private function makepg($i, $pg)
    {
        if ($i == $pg) {
            return $this->active($pg);
        } else {
            return $this->pageLink($i, $i);
        }
    }

    /**
     * @param $start
     * @param $end
     * @return string 按顺序显示一组分页信息
     */
    private function rangePage($start, $end)
    {
        $pageLink = '';
        for ($page = $start; $page <= $end; $page++) {
            if ($page == $this->currentPage) {
                $pageLink .= $this->active($page);
            } else {
                $pageLink .= $this->pageLink($page, $page);
            }
        }
        return $pageLink;
    }

    /**
     * @param $text
     * @param $page
     * @param $cls
     * @param $rel
     * @return string 显示正常分页的链接信息
     */
    private function pageLink($text, $page)
    {
        if ($this->ajax) {
            return '<a href="javascript:;" data-ci-pagination-page="' . $page . '">' . $text . '</a>';
        } else {
            return '<a href="' . $this->url . 'page=' . $page . '" data-ci-pagination-page="' . $page . '">' . $text . '</a>';
        }
    }

    /**
     * @return string 显示上一页按钮
     */
    private function prev()
    {
        $prevPage = $this->currentPage > 1 ? $this->currentPage - 1 : 1;
        if ($this->ajax) {
            return '<a href="javascript:;" data-ci-pagination-page="'
            . $prevPage . '"><span class="next">&#xe65f;</span></a>';
        } else {
            return '<a href="' . $this->url . 'page=' . $prevPage . '" data-ci-pagination-page="'
            . $prevPage . '"><span class="next">&#xe65f;</span></a>';
        }
    }

    /**
     * @return string 显示下一页按钮
     */
    private function next()
    {
        $nextPage = $this->currentPage < $this->lastPage ? $this->currentPage + 1 : $this->lastPage;
        if ($this->ajax) {
            return '<a href="javascript:;" data-ci-pagination-page="'
            . $nextPage . '"><span class="next">&#xe660;</span></a>';
        } else {
            return '<a href="' . $this->url . 'page=' . $nextPage . '" data-ci-pagination-page="'
            . $nextPage . '"><span class="next">&#xe660;</span></a>';
        }
    }

    /**
     * @param $page
     * @return string 显示当前页
     */
    private function active()
    {
        return '<a class="curr">' . $this->currentPage . '</a>';
    }
}