<?php
/**
 * Created by PhpStorm.
 * User: pengzhizhuang
 * Date: 16/9/16
 * Time: 上午10:16
 */

namespace App\Library\Utils;


class Captcha
{
    private $charset = 'abcdefghkmnprstuvwxyzABCDEFGHKMNPRSTUVWXYZ23456789';//随机因子
    private $code;//验证码
    private $codelen = 4;//验证码长度
    private $width = 85;//宽度
    private $height = 35;//高度
    private $img;//图形资源句柄
    private $font;//指定的字体
    private $fontsize = 20;//指定字体大小
    private $fontcolor;//指定字体颜色

    //构造方法初始化
    public function __construct()
    {
        $this->font = base_path('static/fonts/OCR-a___.ttf');//注意字体路径要写对，否则显示不了图片
    }

    //生成随机码
    private function createCode()
    {
        $_len = strlen($this->charset) - 1;
        for ($i = 0; $i < $this->codelen; $i++) {
            $this->code .= $this->charset[mt_rand(0, $_len)];
        }
    }

    //生成背景
    private function createBg()
    {
        $this->img = imagecreatetruecolor($this->width, $this->height);
        $color = imagecolorallocate($this->img, 255, 255, 255);
        imagefilledrectangle($this->img, 0, $this->height, $this->width, 0, $color);
    }

    //生成文字
    private function createFont()
    {
        $_x = $this->width / $this->codelen;
        for ($i = 0; $i < $this->codelen; $i++) {
            $this->fontcolor = imagecolorallocate($this->img, 0, 0, 0);
            imagettftext($this->img, $this->fontsize, mt_rand(-30, 30), $_x * $i + mt_rand(1, 5), $this->height / 1.4, $this->fontcolor, $this->font, $this->code[$i]);
        }
    }

    //输出
    private function outPut()
    {
        header('Content-type:image/png');
        imagepng($this->img);
        imagedestroy($this->img);
    }

    //对外生成
    public function doimg()
    {
        $this->createBg();
        $this->createCode();
        $this->createFont();
        $this->outPut();
    }

    //获取验证码
    public function getCode()
    {
        return strtolower($this->code);
    }
}