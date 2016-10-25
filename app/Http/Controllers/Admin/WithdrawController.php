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
        $where = [];
        if ($request->hold_name) {
            $userids = $this->userRepository->bankModel->where('hold_name', $request->hold_name)->lists('user_id')->all();
            $where['in'] = ['user_id' => $userids];
        }
        if ($request->cardno) {
            $userids = $this->userRepository->bankModel->where('cardno', $request->cardno)->lists('user_id')->all();
            $where['in'] = ['user_id' => $userids];
        }
        list($counts, $lists) = $this->userRepository->getWithdrawList($where, $this->perpage, $page);
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
        $data['ids'] = explode(',', $request->get('ids'));
        $data['status'] = $request->get('status');
        if (!$data['ids']) return $this->error('未选中任何提现记录!');

        $result = $this->userRepository->saveWithdraws($data);
        if ($result['status']) {
            $message = '批量提现审核完成' . (count($data['ids']) - $result['data']) . '条记录,审核失败' . $result['data'] . '条记录 !';
            return $this->success($message, url('withdraw'), true);
        }
        return $this->error('批量提现审核失败!', null, true);
    }
}