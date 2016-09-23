<?php
/*********************************************************************************
 *  资金管理控制器 - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By tianyantou.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:WalletController.php
 * $Author:pzz
 * $Dtime:2016/9/21
 ***********************************************************************************/

namespace App\Http\Controllers\Account;


use App\Http\Controllers\FrontController;
use App\Repositories\UserRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class BookController extends FrontController
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
     * 记账列表
     */
    public function index(Request $request)
    {
        $page = $request->get('page') ?: 1;
        $where = ['user_id' => $this->user['id']];
        list($count, $lists) = $this->userRepository->getBookList($where, $this->perpage, $page);
        $pageHtml = $this->pager($count, $page, $this->perpage);
        return view('account.book.index', compact('lists', 'pageHtml'));
    }

    /**
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     *
     * 添加记账记录
     */
    public function create(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->get('data');
            try {
                $result = $this->userRepository->bookModel->saveBy($data);
                if ($result) return '记录成功!';
            } catch (QueryException $e) {
                $e->getMessage();
            }
            return '记录失败';
        }
        if ($id) {
            $book = $this->userRepository->bookModel->find($id);
        }
        return view('account.book.create', compact('book'));
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     *
     * 删除记账记录
     */
    public function delete($id)
    {
        try {
            $result = $this->userRepository->bookModel->find($id)->delete();
        } catch (QueryException $e) {
            $e->getMessage();
        }
        return redirect('book.html');
    }
}