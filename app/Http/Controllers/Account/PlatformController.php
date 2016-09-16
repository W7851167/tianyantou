<?php
/*********************************************************************************
 *  平台控制器 - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By tianyantou.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:PlatformController.php
 * $Author:pzz
 * $Dtime:2016/9/11
 ***********************************************************************************/


namespace App\Http\Controllers\Account;


use App\Http\Controllers\FrontController;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class PlatformController extends FrontController
{
    public function __construct(
        TaskRepository $tasks
    )
    {
        parent::__initalize();
        $this->tasks = $tasks;
    }

    public function statistic(Request $request)
    {
        $page = $request->get('page') ? (int)$request->get('page') : 1;
        $where = ['status' => 1];
        list($count, $lists) = $this->tasks->getCorpList($where, $this->perpage, $page);

        return view('account.platform.statistic', compact('count','lists'));
    }

    public function analysis()
    {
        return view('account.platform.analysis');
    }

    public function bind()
    {
        return view('account.platform.bind');
    }
}