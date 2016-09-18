<?php
/*********************************************************************************
 *  消息控制器 - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By tianyantou.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:MessageController.php
 * $Author:pzz
 * $Dtime:2016/9/13
 ***********************************************************************************/

namespace App\Http\Controllers\Account;


use App\Http\Controllers\FrontController;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class MessageController extends FrontController
{
    public function __construct(
        UserRepository $userRepository
    )
    {
        parent::__initalize();
        $this->userRepository = $userRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * 消息列表
     */
    public function index(Request $request)
    {
        $page = $request->get('page') ? (int)$request->get('page') : 1;
        $where = ['owner_id' => $this->user['id']];
        list($count, $lists) = $this->userRepository->getMessageList($where, $this->perpage, $page);
        $pageHtml = $this->pager($count, $page, $this->perpage);

        return view('account.message.index', compact('lists', 'pageHtml'));
    }

    public function readAll()
    {

    }

    public function deleteAll()
    {

    }
}