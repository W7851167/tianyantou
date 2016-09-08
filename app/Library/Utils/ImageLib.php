<?php
/**
 * Created by PhpStorm.
 * User: pengzhizhuang
 * Date: 16/6/21
 * Time: 上午10:51
 */

namespace App\Library\Utils;

use Input;

class ImageLib
{
    protected $dir;
    protected $width;
    protected $height;
    protected $original;
    protected $thumn;
    protected $file_name;

    public function __construct()
    {
    }

    /**
     * @param $dir
     * @return string
     *
     * 创建目录
     */
    protected function createDir($dir)
    {
        $date = date('Y-m-d');
        $imgDir = public_path() . '/data/' . $dir . '/' . $date;

        //目录不存在,则创建
        if (!is_dir(public_path() . '/data/' . $dir))
            @mkdir(public_path() . '/data/' . $dir, 0777);

        //目录不存在,则创建
        if (!is_dir($imgDir))
            @mkdir($imgDir, 0777);

        @chmod(public_path() . '/data/' . $dir, 0777);
        @chmod($imgDir, 0777);

        return 'data/' . $dir . '/' . $date;
    }

    /**
     * @param $fileName
     * @param $dir
     * @return bool|string
     *
     * 创建上传图片
     */
    public function uploadeImage($fileName, $dir)
    {
        if (Input::hasFile($fileName)) {
            $file = Input::file($fileName);
            $ext = $file->getClientOriginalExtension();
//            $fileName = $file->getClientOriginalName();

            $imgDir = $this->createDir($dir);
            $imgName = $this->createFileName();

            //移动图片文件到最终图片存放目录
            $file->move(public_path() . '/' . $imgDir, $imgName . '.' . $ext);

            $original = $imgDir . '/' . $imgName . '.' . $ext;
            return $original;
        }
        return false;
    }

    /**
     * @param $fileName
     * @param $dir
     * @param $width
     * @param $height
     * @return bool|string
     *
     * 创建缩略图
     */
    public function makeThumb($original, $prefix, $width, $height)
    {
        if ($original) {
            $uploadImage = public_path() . '/' . $original;
            $row = $this->getOriginalInfo($original);

            $uploadDir = $row['upload_dir'];
            $uploadName = $row['upload_name'];
            $ext = $row['ext'];

            $thumbName = $prefix . $uploadName;

            //生成缩略图
            $img = \Image::make($uploadImage)->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path() . '/' . $uploadDir . '/' . $thumbName . '.' . $ext, 100);
            return $uploadDir . '/' . $thumbName . '.' . $ext;
        }
        return false;
    }

    /**
     * @param $original
     * @return array
     *
     * 获取上传图片的真是路径,名称和扩展名
     */
    protected function getOriginalInfo($original)
    {
        $row = pathinfo($original);

        $uploadDir = $row['dirname'];
        $baseName = $row['basename'];
        $ext = $row['extension'];

        $arr = explode('.', $baseName);
        $uploadName = $arr[0];

        return ['upload_dir' => $uploadDir, 'upload_name' => $uploadName, 'ext' => $ext];
    }

    /**
     * @return string
     *
     * 创建文件名称
     */
    protected function createFileName()
    {
        return md5(uniqid(md5(microtime(true)), true));
    }

    /**
     * @param $original
     *
     * 删除上传图片
     */
    public function deleteUploadImage($original)
    {
        if ($original) {
            @unlink(public_path() . '/' . $original);
        }
    }

}