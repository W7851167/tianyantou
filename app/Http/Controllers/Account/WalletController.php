<?php
/*********************************************************************************
 *  资金管理控制器 - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By tianyantou.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:WalletController.php
 * $Author:pzz
 * $Dtime:2016/9/13
 ***********************************************************************************/

namespace App\Http\Controllers\Account;


use App\Http\Controllers\FrontController;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class WalletController extends FrontController
{
    public function __construct(
        UserRepository $userRepository
    )
    {
        parent::__initalize();
        $this->userRepository = $userRepository;
    }

    public function withdraw()
    {
        return view('account.wallet.withdraw');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * 资金流水列表
     */
    public function book(Request $request)
    {
        $page = $request->get('page') ?: 1;
        $type = $request->get('opType');
        $time = $request->get('timespan');
        $where = ['user_id' => $this->user['id']];
        if ($time) {
            switch ($time) {
                case '1w':
                    $where['raw'] = ['created_at>DATE_SUB(NOW(),INTERVAL 1 WEEK)'];
                    break;
                case '1m':
                    $where['raw'] = ['created_at>DATE_SUB(NOW(),INTERVAL 1 MONTH)'];
                    break;
                case '3m':
                    $where['raw'] = ['created_at>DATE_SUB(NOW(),INTERVAL 3 MONTH)'];
                    break;
                case '6m':
                    $where['raw'] = ['created_at>DATE_SUB(NOW(),INTERVAL 6 MONTH)'];
                    break;
            }
        }
        if($type){
            switch($type){
                case 'invest':
                    $where['type'] = 1;
                    break;
                case 'income':
                    $where['type'] = 2;
                    break;
                case 'recharge':
                    $where['type'] = 3;
                    break;
                case 'withdraw':
                    $where['type'] = 4;
                    break;
                case 'other':
                    $where['type'] = 0;
                    break;
            }
        }

        list($count, $lists) = $this->userRepository->getRecordList($where, $this->perpage, $page);
        $pageHtml = $this->pager($count, $page, $this->perpage);
        return view('account.wallet.book', compact('lists', 'pageHtml'));
    }
}