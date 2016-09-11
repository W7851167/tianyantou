<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Request;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * 操作错误跳转的快捷方法
     * @access protected
     * @param string $message 错误信息
     * @param string $jumpUrl 页面跳转地址
     * @param mixed $ajax 是否为Ajax方式 当数字时指定跳转时间
     * @return void
     */
    protected function error($message = '', $jumpUrl = '', $ajax = false)
    {
        return $this->dispatchJump($message, 0, $jumpUrl, $ajax);
    }

    /**
     * 操作成功跳转的快捷方法
     * @access protected
     * @param string $message 提示信息
     * @param string $jumpUrl 页面跳转地址
     * @param mixed $ajax 是否为Ajax方式 当数字时指定跳转时间
     * @return void
     */
    protected function success($message = '', $jumpUrl = '', $ajax = false)
    {
        return $this->dispatchJump($message, 1, $jumpUrl, $ajax);
    }

    /**
     * 默认跳转操作 支持错误导向和正确跳转
     * 调用模板显示 默认为public目录下面的success页面
     * 提示页面为可配置 支持模板标签
     * @param string $message 提示信息
     * @param Boolean $status 状态
     * @param string $jumpUrl 页面跳转地址
     * @param mixed $ajax 是否为Ajax方式 当数字时指定跳转时间
     * @access private
     * @return void
     */
    private function dispatchJump($message, $status = 1, $jumpUrl = '', $ajax = false)
    {
        if (true === $ajax || Request::ajax()) {// AJAX提交
            $data = is_array($ajax) ? $ajax : array();
            $data['info'] = $data['message'] = $message;
            $data['status'] = $status;
            $data['url'] = $jumpUrl;
            return $this->ajaxReturn($data);
        }
        if (is_int($ajax)) $response['waitSecond'] = $ajax;

        if (!empty($jumpUrl)) $response['jumpUrl'] = $jumpUrl;

        // 提示标题
        $response['msgTitle'] = $status ? '成功' : '失败';

        //如果设置了关闭窗口，则提示完毕后自动关闭窗口
        //if(isset($response['closeWin']))    $response['jumpUrl'] = 'javascript:window.close();';

        $response['status'] = $status;   // 状态
        //保证输出不受静态缓存影响
        $response['t'] = time();
        if ($status) { //发送成功信息
            $response['message'] = $message;// 提示信息
            // 成功操作后默认停留1秒
            if (!isset($response['waitSecond'])) $response['waitSecond'] = 3;
            // 默认操作成功自动返回操作前页面
            if (!isset($response['jumpUrl'])) $response['jumpUrl'] = Request::server('HTTP_REFERER');;
        } else {
            $response['error'] = $message;// 提示信息
            //发生错误时候默认停留3秒
            if (!isset($response['waitSecond'])) $response['waitSecond'] = '3';
            // 默认发生错误的话自动返回上页
            if (!isset($response['jumpUrl'])) $response['jumpUrl'] = "javascript:history.back(-1);";
        }

        return view('errors.template', $response);

        exit;
    }

    /**
     * Ajax方式返回数据到客户端
     * @access protected
     * @param mixed $data 要返回的数据
     * @param String $type AJAX返回数据格式
     * @return void
     */
    protected function ajaxReturn($data, $type = '')
    {
        if (empty($type)) $type = 'JSON';
        return response()->json($data);
        switch (strtoupper($type)) {
            case 'JSON' :
                // 返回JSON数据格式到客户端 包含状态信息
                header('Content-Type:application/json; charset=utf-8');
                exit(json_encode($data));
            case 'XML'  :
                // 返回xml格式数据
                header('Content-Type:text/xml; charset=utf-8');
                exit(xml_encode($data));
            case 'JSONP':
                // 返回JSON数据格式到客户端 包含状态信息
                header('Content-Type:application/json; charset=utf-8');
                $handler = request('callback') ? request('callback') : 'jsonpReturn';
                exit($handler . '(' . json_encode($data) . ');');
            case 'EVAL' :
                // 返回可执行的js脚本
                header('Content-Type:text/html; charset=utf-8');
                exit($data);
        }
    }
}
