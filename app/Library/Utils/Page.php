<?php
namespace App\Library\Utils;

class Page
{

    protected $count;
    protected $currentPage;
    protected $perPage;
    protected $lastPage;
    protected $pageUrl;
    protected $ajax;

    /**
     * @param $count
     * @param $currentPage
     * @param $perPage
     */
    public function pageInit($count, $currentPage, $perPage, $pageUrl = null, $ajax = false)
    {
        $this->count = (int)$count;
        $this->perPage = (int)$perPage;
        $this->lastPage = ceil($this->count / $this->perPage);
        $this->pageUrl = $pageUrl;
        $this->ajax = $ajax;
        $currentPage = (int)$currentPage;
        $this->currentPage = ($currentPage > $this->lastPage) ? $this->lastPage : (($currentPage < 1) ? 1 : $currentPage);

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


    public function admin_links()
    {
        if ($this->count > $this->perPage) {
            if ($this->lastPage < 13) {
                $content = $this->rangePage(1, $this->lastPage);
            } else {
                $content = $this->sliderPage();
            }
            return ['html' => $this->prev() . $content . $this->next(), 'pages' => $this->totalPage(), 'count' => $this->count, 'perpage' => $this->perPage];
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
        return $this->firstPageButton() . $this->prev() . $content . $this->next() . $this->totalPage() . $this->directedPage();
    }

    /**
     * @return string 生成一个首页按钮
     */
    private function firstPageButton()
    {
        if ($this->currentPage == 1) {
            return '<li class="disabled first"><span>首页</span></li>';
        } else {
            $url = strpos($this->pageUrl, '?') ? $this->pageUrl . '&' : $this->pageUrl . '?';
            return '<li class="first no_f"><a class="ajax-a" href="' . $url . 'page=1' . '">首页</a></li>';
        }
    }

    /**
     * @return string
     */
    private function totalPage()
    {
        $last = !empty($this->lastPage) ? $this->lastPage : 0;
        return '<p>共<span class="total-page">' . $this->lastPage . '</span>页<p>';
    }

    /**
     * @return string
     */
    private function directedPage()
    {
        return '<p>到第<input type="text" value="' . $this->currentPage . '" id="dir-page">页</p>'
        . '<a class="content-list-table-page-det" href="javascript:void(0)">确定</a>';
    }

    /**
     * @return string
     */
//    private function sliderPage()
//    {
//        $window = 6;
//        //如果当前页面小于6,则当前页面在整个分页列表左侧
//        //10 + 3 模式
//        if ($this->currentPage <= $window) {
//            $ending = $this->end();
//            return $this->rangePage(1, $window + 4) . $ending;
//        }
//        //当前页面大于6,且当前页面和最末页的间距小于等于6
//        //3 + 10 模式
//        elseif ($this->currentPage >= $this->lastPage - $window) {
//            $start = $this->lastPage - 9;
//            $content = $this->rangePage($start, $this->lastPage);
//            return $this->start() . $content;
//        } //当前页面在整个分页队列的中间部分,和左侧 右侧间距都大于6
//        else {
//            $content = $this->rangePage($this->currentPage - 3, $this->currentPage + 3);
//            return $this->start() . $content . $this->end();
//        }
//    }
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
//        if ($i == $pg) {
//            return " <font class='" . $this->style . "'>" . $i . "</font>";
//        } else {
//            return " <a href=" . Pager::replacepg($this->url, 5, $i) . " class='" . $this->style . "'><u>" . $i . "</u></a>";
//        }
        if ($i == $pg) {
            return $this->active($pg);
        } else {
            return $this->pageLink($i, $i, 'ajax-a', '');
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
                $pageLink .= $this->pageLink($page, $page, 'ajax-a', '');
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
    private function pageLink($text, $page, $cls, $rel)
    {
        if (!$this->ajax) {
            $url = strpos($this->pageUrl, '?') ? $this->pageUrl . '&' : $this->pageUrl . '?';
            if (empty($rel)) {
                return '<li><a class="' . $cls . '" href="' . $url . 'page=' . $page . '">' . $text . '</a></li>';
            } else {
                return '<li class="' . $rel . '"><a class="' . $cls . '" href="' . $url . 'page=' . $page . '">' . $text . '</a></li>';
            }
        } else {
            if (empty($rel)) {
                return '<li><a class="' . $cls . '" href="javascript:void(0);" data-page="' . $page . '">' . $text . '</a></li>';
            } else {
                return '<li class="' . $rel . '"><a class="' . $cls . '" href="javascript:void(0);" data-page="' . $page . '">' . $text . '</a></li>';
            }
        }

    }

    /**
     * @param $text
     * @param $cls
     * @return string 显示禁止分页链接信息
     */
    private function disabledText($text, $cls)
    {
        return '<li class="disabled ' . $cls . '"><span>' . $text . '</span></li>';
    }

    /**
     * @return string 显示上一页按钮
     */
    private function prev()
    {
        $text = "上一页";
        if ($this->currentPage > 1) {
            $page = $this->currentPage - 1;
            return $this->pageLink($text, $page, 'ajax-a', 'first no_f');
        } else {
            return $this->disabledText($text, 'first');
        }
    }

    /**
     * @return string 显示下一页按钮
     */
    private function next()
    {
        $text = "下一页";
        if ($this->currentPage < $this->lastPage) {
            $page = $this->currentPage + 1;
            return $this->pageLink($text, $page, 'ajax-a', 'last');
        } else {
            return $this->disabledText($text, 'last');
        }
    }

    /**
     * @return string 显示省略号按钮
     */
    private function dots()
    {
        $text = '...';
        return $this->disabledText($text, '');
    }

    /**
     * @param $page
     * @return string 显示当前页
     */
    private function active($page)
    {
        return '<li class="on"><span>' . $page . '</span></li>';
    }

    /**
     * @return string 显示1,2...,开始页面
     */
    private function start()
    {
        return $this->rangePage(1, 2) . $this->dots();
    }

    /**
     * @return string
     */
    private function end()
    {
        return $this->dots() . $this->rangePage($this->lastPage - 1, $this->lastPage);
    }
}