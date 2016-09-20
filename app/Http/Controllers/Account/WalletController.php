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
        $where = ['user_id' => $this->user['id']];
        list($count, $lists) = $this->userRepository->getRecordList($where, $this->perpage, $page);
        $pageHtml = $this->pager($count, $page, $this->perpage);
        return view('account.wallet.book', compact('lists', 'pageHtml'));
    }
}