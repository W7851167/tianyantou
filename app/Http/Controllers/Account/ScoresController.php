<?php
/*********************************************************************************
 *  积分控制器 - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By tianyantou.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:ScoresController.php
 * $Author:pzz
 * $Dtime:2016/9/11
 ***********************************************************************************/

namespace App\Http\Controllers\Account;


use App\Http\Controllers\FrontController;
use App\Repositories\CensusRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class ScoresController extends FrontController
{
    public function __construct(
        UserRepository $userRepository,
        CensusRepository $censusRepository
    )
    {
        parent::__initalize();
        $this->userRepository = $userRepository;
        $this->censusRepository = $censusRepository;
    }

    public function index(Request $request)
    {
        $page = $request->get('page') ? (int)$request->get('page') : 1;
        $where = ['user_id' => $this->user['id']];
        list($count, $lists) = $this->userRepository->getScoreList($where, $this->perpage, $page);
        $census = $this->censusRepository->getUserScoreTotal($this->user['id']);
        $pageHtml = $this->pager($count, $page, $this->perpage);
        return view('account.scores.index', compact('lists', 'count', 'census', 'pageHtml'));
    }
}