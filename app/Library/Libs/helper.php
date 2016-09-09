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
function getNavConfig($url = null)
{
    $url = $url ? $url : Request::path();
    $url = ltrim($url, '/');
    $nav = config('menu.nav');
    $navHtml = '';
    $sidebarHtml = '';
    $urls = [];
    foreach ($nav as $key => $value) {
        $navHtml .= '<div class="header-nav-inner">';
        $navHtml .= '<a href="' . url($value['url']) . '"';
        if (!empty($value['page'])) {
            $urls = array_pluck($value['page'], 'url');
        }
        if ($url == $value['url'] || in_array($url, $urls)) {
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

    return [$navHtml, $sidebarHtml];
}

//将内容进行UNICODE编码，编码后的内容格式：\u56fe\u7247 （原始：图片）
function unicodeToEncode($name)
{
    $name = iconv('UTF-8', 'UCS-2', $name);
    $len = strlen($name);
    $str = '';
    for ($i = 0; $i < $len - 1; $i = $i + 2) {
        $c = $name[$i];
        $c2 = $name[$i + 1];
        if (ord($c) > 0) {    // 两个字节的文字
            $str .= '\u' . base_convert(ord($c), 10, 16) . base_convert(ord($c2), 10, 16);
        } else {
            $str .= $c2;
        }
    }
    return $str;
}

// 将UNICODE编码后的内容进行解码，编码后的内容格式：\u56fe\u7247 （原始：图片）
function unicodeToDecode($name)
{
    // 转换编码，将Unicode编码转换成可以浏览的utf-8编码
    $pattern = '/([\w]+)|(\\\u([\w]{4}))/i';
    preg_match_all($pattern, $name, $matches);
    if (!empty($matches)) {
        $name = '';
        for ($j = 0; $j < count($matches[0]); $j++) {
            $str = $matches[0][$j];
            if (strpos($str, '\\u') === 0) {
                $code = base_convert(substr($str, 2, 2), 16, 10);
                $code2 = base_convert(substr($str, 4), 16, 10);
                $c = chr($code) . chr($code2);
                $c = iconv('UCS-2', 'UTF-8', $c);
                $name .= $c;
            } else {
                $name .= $str;
            }
        }
    }
    return $name;
}