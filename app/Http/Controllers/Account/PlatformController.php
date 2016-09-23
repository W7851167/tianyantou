<?php
/*********************************************************************************
 *  平台控制器 - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By tianyantou.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:PlatformController.php
 * $Author:pzz
 * $Dtime:2016/9/11
 ***********************************************************************************/


namespace App\Http\Controllers\Account;


use App\Http\Controllers\FrontController;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class PlatformController extends FrontController
{
    public function __construct(
        TaskRepository $tasks
    )
    {
        parent::__initalize();
        $this->tasks = $tasks;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * 平台管理
     */
    public function statistic(Request $request)
    {
        $page = $request->get('page') ? (int)$request->get('page') : 1;
        $where = ['status' => 1];
        $corpIds = $this->tasks->taskReceiveModel->where('user_id', $this->user['id'])->distinct('corp_id')->lists('corp_id')->toArray();

        $openWhere = array_merge($where, ['in' => ['id' => $corpIds]]);
        list($openCount, $openLists) = $this->tasks->getCorpList($openWhere, $this->perpage, $page);
        $pageHtml = $this->pager($openCount, $page, $this->perpage);

        $unopenWhere = array_merge($where, ['not_in' => ['id' => $corpIds]]);
        list($count, $lists) = $this->tasks->getCorpList($unopenWhere, $this->perpage, $page);
        $pageHtml1 = $this->pager($count, $page, $this->perpage);

        return view('account.platform.statistic', compact(
            'count', 'openLists', 'lists', 'openCount', 'count', 'pageHtml', 'pageHtml1'
        ));
    }

    public function analysis()
    {
        return view('account.platform.analysis');
    }
}