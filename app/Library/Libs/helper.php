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
use Illuminate\Support\Facades\Route;

/**
 * @param $url
 * 获取html菜单
 */
function getNavConfig()
{
    $routeName = \Route::currentRouteName();
    $routeName = explode('.', $routeName);
    $one = isset($routeName['0']) ? $routeName[0] : '';
    $two = isset($routeName['1']) ? $routeName[1] : '';

    $nav = config('menu.menu');

    $navHtml = $sidebarHtml = '';

    foreach ($nav as $key => $value) {
        $navHtml .= '<div class="header-nav-inner">';
        $navHtml .= '<a href="' . url($value['url']) . '"';

        if ($one == $value['tag']) {
            $navHtml .= ' class="at"';
            $sidebarHtml .= '<ul class="content-left-menu clearfix">';
            if (!empty($value['child'])) {
                foreach ($value['child'] as $sidebar) {
                    $tag = explode('.', $sidebar['tag']);
                    $sidebarHtml .= '<li><a href="' . url($sidebar['url']) . '"';
                    if (isset($tag[1]) && ($two == $tag[1])) {
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

/**
 * 金钱格式
 */

function tmoney_format($number, $fractional=false) {
    if ($fractional) {
        $number = sprintf('%.2f', $number);
    }
    while (true) {
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
        if ($replaced != $number) {
            $number = $replaced;
        } else {
            break;
        }
    }
    return $number;
}


/**
 * @param $startTime
 * @param $endTime
 * @return float
 * 计算时间差
 */
function getDiffTime($startTime,$endTime)
{
    return round(abs($endTime-$startTime)/60/60/24);
}

/**
 * @param $day
 * 格式化日期信息
 */
function dateFormat($day)
{
    if($day <= 30) {
        return $day . '天';
    }
    if($day >30 && $day < 365) {
        return ceil(abs($day / 30)) . '个月';
    }

    if($day > 365) {
        return round(abs($day / 365)). '年';
    }
}

/**
 * @param $thumb
 * 获取实际图片
 */
function getRealThumb($thumb)
{
    $lists = parse_url($thumb);
    $patshs = explode('/', $lists['path']);
    unset($patshs[count($patshs)-2]);
    return $lists['scheme'] .'://'. $lists['host'] . implode('/', $patshs);
}

/**
 * @param $phone
 * @return bool
 * 验证手机号码
 */
function is_phone($phone) {
    $isMobile="/^1[3-5,8]{1}[0-9]{9}$/";
    $isPhone="/^([0-9]{3,4}-)?[0-9]{7,8}$/";
    if(!preg_match($isMobile,$phone) && !preg_match($isPhone,$phone)) {
      return false;
    }
    return true;
}

/**
 * @param $money
 * @return bool
 * 验证金额
 */
function is_money($money) {
    $isMoney = "#^[0-9]+\.?[0-9]{2}?#";
    if(!preg_match($isMoney, $money)) {
        return false;
    }
    return true;
}
