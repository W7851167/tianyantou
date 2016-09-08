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

/**
 * @param $url
 * 获取html菜单
 */
function getNavConfig($url) {
    $nav = config('menu.nav');
    $sidebar = config('menu.sidebar');
    $navHtml = '';
    foreach($nav as $key=>$value) {
        $navHtml .= '<div class="header-nav-inner">';
        $navHtml .= '<a href="' . url($value['url']) . '"';
        $navHtml .= ($url == $value['page']) ? ' class="at"' : '';
        $navHtml .= '>' . $value['name'] . '</a>';
        if ($value['page'] != 'index') {
            $navHtml .= '<ul class="menu rule-menu">';
            foreach ($sidebar[$value['page']] as $k => $v) {
                    $navHtml .= '<li><a href="' . $v['url'] . '">' . $v['name'] . '</a></li>';
            }
            $navHtml .= '</ul>';
        }
        $navHtml .= '</div>';
    }
}