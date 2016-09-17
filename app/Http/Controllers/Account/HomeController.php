<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:IndexController.php
 * $Author:zxs
 * $Dtime:2016/9/11
 ***********************************************************************************/

namespace App\Http\Controllers\Account;


use App\Http\Controllers\FrontController;
use App\Repositories\TaskRepository;
use App\Repositories\UserRepository;

class HomeController extends FrontController
{
    public function __construct(
        UserRepository $userRepository,
        TaskRepository $tasks
    )
    {
        parent::__initalize();
        $this->userRepository = $userRepository;
        $this->tasks = $tasks;
    }

    public function index()
    {
        $where['status'] = 1;
        list($counts, $corps) = $this->tasks->getCorpList($where, 8, 1);

        return view('account.index.index', compact(
            'corps'
        ));

    }

}