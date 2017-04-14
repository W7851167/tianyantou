<?php
/*********************************************************************************
 *  PhpStorm - tianyantou
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:MIndexController.php
 * $Author:wyw
 * $Dtime:2017/3/31
 ***********************************************************************************/

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\MobileController;
use App\Repositories\CensusRepository;
use App\Repositories\TaskRepository;
use App\Repositories\UserRepository;

class MIndexController extends MobileController
{
//    public function __construct(
//        UserRepository $userRepository,
//        TaskRepository $tasks,
//        CensusRepository $census
//    )
//    {
//        parent::__initalize();
//        $this->userRepository = $userRepository;
//        $this->tasks = $tasks;
//        $this->census = $census;
//    }

    public function index()
    {
//        $where['status'] = 1;
//        $data = $this->census->getUserRocordStats($this->user['id']);
//        list($counts, $data['corps']) = $this->tasks->getCorpList($where, 8, 1);
//        $data['userModel'] = $this->userRepository->userModel->find($this->user['id']);
        return view('welcome');
    }

}