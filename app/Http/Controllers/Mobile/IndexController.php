<?php
/*********************************************************************************
 *  PhpStorm - tianyantou
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:MIndexController.php
 * $Author:wyw
 * $Dtime:2017/4/13
 ***********************************************************************************/

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\MobileController;
use App\Repositories\CensusRepository;
use App\Repositories\TaskRepository;
use App\Repositories\UserRepository;
use App\Repositories\NewRepository;
use App\Repositories\XdataRepository;
use Illuminate\Http\Request;
use App\Models\TaskReceiveModel;
use App\Models\TaskModel;
use Cache;

class IndexController extends MobileController
{
	public function __construct(
			XdataRepository $xdata,
			NewRepository $news,
			TaskRepository $taskRepository,
			CensusRepository $census
	)
	{
		parent::__initalize();
		$this->xdata = $xdata;
		$this->news = $news;
        $this->taskRepository = $taskRepository;
		$this->census = $census;
	}

	/**
	 * @return View
	 *
	 * H5首页控制器
	 */
    public function index(Request $request)
    {
       list($counts, $advs) = $this->xdata->getAdvList([], 5, 1);
		//系统公告
		$where['category_id'] = 10;
		list($counts, $notices) = $this->news->getNewList($where, 1, 5);
		//最新动态
		$where['category_id'] = 11;
		list($counts, $latests) = $this->news->getNewList($where, 1, 4);
		//投资攻略
		$where['category_id'] = 12;
		list($counts, $strategys) = $this->news->getNewList($where, 1, 6);
		//已上线项目
		unset($where);
		$where['status'] = 1;
		$where['position'] = 1;
		list($counts, $tasks) = $this->taskRepository->getTaskList($where, 12, 1);
		//links
		list($counts, $links) = $this->xdata->getLinkList([], 15, 1);
		$stats = $this->census->getHomeStats();
		return view('mobile.index.index', compact('advs', 'notices', 'tasks', 'latests', 'strategys', 'links','stats'));
    }

	/**
	 * 用户投资记录提交
	 * @return View
	 */
	public function userInvestInfo(Request $request)
	{
		if ($request->isMethod('post')) {
			$data = $request->get('data');

			$tasks = $this->taskRepository->getTaskById($data['task_id']);

			if (empty($data['task_id']))
				return $this->error(' 请输入理财平台', null, true);
			if (empty($data['term']))
				return $this->error(' 请添加投资标期', null, true);
			if (empty($data['mobile']))
				return $this->error('请添加投资人手机号码', null, true);
			if (empty($data['price'])) {
				return $this->error('请添加投资金额', null, true);
			}
			if (!is_phone($data['mobile'])) {
				return $this->error('请填写真实的手机号码或固定电话', null, true);
			}
			if (!is_money($data['price'])) {
				return $this->error('投资金额必须为数字.', null, true);
			}
//			if ($receiveModel->corp->limit <= $receiveModel->achieves->count()) {
//				return $this->error('该平台每标限定投资' . $receiveModel->corp->limit . '次', null, true);
//			}
			//获取客户端ip
			$clientIp = $request->getClientIp();
			$sendNum  = (int)Cache::get($clientIp);
			if($sendNum>50){
				return $this->error('提交次数过多，请稍等', null, true);
			}
			$receives['task_id'] = $tasks->id;
			$receives['corp_id'] = $tasks->corp_id;
			$receives['user_id'] = $this->user['id'];
			$receives['ratio'] = $tasks->ratio;
			$receives['mratio'] = $tasks->mratio;
			$data['task_id'] = $tasks->id;
			$data['user_id'] = $this->user['id'];
			$data['corp_id'] = $tasks->corp_id;
			$data['status'] = 0;
			$receiveModel = new TaskReceiveModel();
			$data['receive_id'] = $receiveModel->adtask($receives);
			$result = $this->taskRepository->saveAchieves($data);

			if ($result['status']) {
			    if($sendNum>0){
			        $num = $sendNum+1;
                }else{
			        $num = 1;
                }
                Cache::put($clientIp,$num,60);
				return $this->success($result['message'], url('/'), true);
			}
			return $this->error($result['message'], null, true);
		}

        $where['status'] = 1;
		$model = new TaskModel();
		$tasks = $model->taskslist($where);
        //list($counts, $tasks) = $this->taskRepository->getTaskList($where, 12, 1);

		return view('mobile.index.submit',compact( 'tasks'));
	}

	//测试展示效果
	public function show()
	{
		return view('mobile.index.index');
	}
	
	public function companyDetail()
	{
		echo "welcome to company Detail!";
	}




}
