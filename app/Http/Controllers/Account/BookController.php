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

            $result = $this->userRepository->saveBook($data);
            if ($result['status']) {
                return $this->success('记录成功!', url('book.html'), true);
            }
            return $this->error('记录失败', null, true);
        }
        if ($id) {
            $book = $this->userRepository->bookModel->find($id);
        } else {
            $where = ['user_id' => $this->user['id'], 'is_template' => 1];
            list($count, $lists) = $this->userRepository->getBookList($where, $this->perpage, 1);
        }
        return view('account.book.create', compact('book', 'lists'));
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

    /**
     * @param $id
     *
     * 删除记账模板
     */
    public function deletetemplate($id)
    {
        try {
            $model = $this->userRepository->bookModel->find($id);
            $model->template_name = '';
            $model->is_template = 0;
            $model->save();
            return '删除记账模板成功';
        } catch (QueryException $e) {
            $e->getMessage();
        }
        return '删除记账模板失败';
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * 返回模板记账
     */
    public function template($id)
    {
        $book = $this->userRepository->bookModel->find($id);

        return view('account.book.templatebook', compact('book'));
    }
}