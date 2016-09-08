<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 帮助函数集合
 *-------------------------------------------------------------------------------
 * $FILE:helper.php
 * $Author:zxs
 * $Dtime:2016/9/8
 ***********************************************************************************/
use Illuminate\Support\Facades\Request;

/**
 * @param $url
 * 获取html菜单
 */
function getNavConfig($url=null) {
    $url = $url ? $url : Request::path();
    $url = ltrim($url,'/');
    $nav = config('menu.nav');
    $navHtml = '';
    $sidebarHtml = '';
    $urls = [];
    foreach($nav as $key=>$value) {
        $navHtml .= '<div class="header-nav-inner">';
        $navHtml .= '<a href="' . url($value['url']) . '"';
        if(!empty($value['page'])) {
            $urls = array_pluck($value['page'],'url');
        }
        if($url == $value['url'] || in_array($url,$urls)) {
            $navHtml .= ' class="at"';
            $sidebarHtml .= '<ul class="content-left-menu clearfix">';
            if (!empty($value['page'])) {
                foreach ($value['page'] as $sidebar) {
                    $sidebarHtml .= '<li><a href="' . url($sidebar['url']) . '"';
                    if ($url == $sidebar['url']) {
                        $sidebarHtml .= ' class="on"';
                    }
                    $sidebarHtml .= ' >' . $sidebar['name'] . '</a></li>';
                }
                $sidebarHtml .= '</ul>';
            }
        }
        $navHtml .= '>' . $value['name'] . '</a>';
        $navHtml .= '</div>';
    }

    return [$navHtml,$sidebarHtml];
}