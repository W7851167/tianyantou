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

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Repositories\CensusRepository;
use App\Repositories\TaskRepository;
use App\Repositories\UserRepository;

class IndexController extends ApiController
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
	 echo "this is api input";
//        $where['status'] = 1;
//        $data = $this->census->getUserRocordStats($this->user['id']);
//        list($counts, $data['corps']) = $this->tasks->getCorpList($where, 8, 1);
//        $data['userModel'] = $this->userRepository->userModel->find($this->user['id']);
//        return view('welcome');
    }

	//测试展示效果
	public function show()
	{
		echo "测试展示";
	}
	
	public function companyDetail()
	{
		echo "welcome to company Detail!";
	}




}
