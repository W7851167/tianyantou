<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:WithdrawController.php
 * $Author:zxs
 * $Dtime:2016/9/9
 ***********************************************************************************/

namespace App\Http\Controllers\Admin;


use App\Eloquent\Model;
use App\Http\Controllers\AdminController;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class WithdrawController extends AdminController
{

    public function __construct(
        UserRepository $userRepository
    )
    {
        parent::__initalize();
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        $page = !empty($request->get('page')) ? $request->get('page') : 1;
        list($counts, $lists) = $this->userRepository->getWithdrawList([], $this->perpage, $page);
        $pageHtml = $this->pager($counts, $page, $this->perpage);
        return view('admin.withdraw.index', compact('lists', 'pageHtml'));
    }

    /**
     * @param Request $request
     * @param $id
     * 审核操作
     */
    public function create(Request $request, $id)
    {
        $withdraw = $this->userRepository->withdrawModel->find($id);
        if ($request->isMethod('post')) {
            $data = $request->get('data');
            if (!($withdraw->user instanceof Model)) {
                return $this->error('未找到对应账户', null, true);
            }
            if (!($withdraw->user->money instanceof Model)) {
                return $this->error('该账户未有电子钱包', null, true);
            }
            if ($withdraw->user->money->withdraw < $data['price']) {
                return $this->error('提现冻结金额不足，非法提现', null, true);
            }
            $result = $this->userRepository->saveWithdraw($data);
            if ($result['status']) {
                return $this->success('管理员审核用户提现完成', url('withdraw'), true);
            }
            return $this->error('管理员审核操作异常，请联系开发人员');
        }
        return view('admin.withdraw.create', compact('withdraw'));
    }

    /**
     * @param Request $request
     *
     * 提现批量审核
     */
    public function batch(Request $request)
    {
        $ids = explode(',', $request->get('ids'));
        $status = $request->get('status');
        if (!$ids) return $this->error('未选中任何提现记录!');

        $error = 1;
        foreach ($ids as $id) {
            $withdraw = $this->userRepository->withdrawModel->find($id);
            if (!($withdraw->user instanceof Model)) {
                $error++;
                continue;
            }
            if (!($withdraw->user->money instanceof Model)) {
                $error++;
                continue;
            }
            $item = [
                'id' => $id,
                'user_id' => $withdraw->user_id,
                'price' => $withdraw->price,
                'commission' => $withdraw->commission,
                'status' => $status,
                'reason' => '批量操作',
            ];
            $result = $this->userRepository->saveWithdraw($item);
            if (!$result['status']) $error++;
        }

        if ($error > 0) {
            $message = '批量提现审核完成' . (count($ids) - $error) . '条记录,审核失败' . $error . '条记录!';
            return $this->error($message, null, true);
        }

        return $this->success('批量提现审核完成', url('withdraw'), true);
    }
}