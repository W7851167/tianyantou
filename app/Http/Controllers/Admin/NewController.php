<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By phpad
 * 文章控制器管理
 *-------------------------------------------------------------------------------
 * $FILE:NewController.php
 * $Author:pzz
 * $Dtime:2016/9/8
 ***********************************************************************************/

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\AdminController;
use App\Http\Requests\NewCreateRequest;
use App\Repositories\NewRepository;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class NewController extends AdminController
{
    public function __construct(
        NewRepository $new,
        TaskRepository $task
    )
    {
        parent::__initalize();
        $this->new = $new;
        $this->task = $task;
    }

    /**
     * @param Request $request
     * 多图文管理列表页面
     */
    public function index(Request $request)
    {
        $where = [
            'is_system' => 1,
            'parent_id' => 0,
            'theme' => 0,
        ];
        $categorys = $this->new->getSystemCategorys($where);

        $page = $request->page ? (int)$request->page : 1;
        $categoryIds = array_column($categorys->toArray(), 'id');
        $nWhere['in'] = ['category_id' => $categoryIds,];
        if ($request->get('category'))
            $nWhere = ['category_id' => $request->get('category')];

        list($count, $lists) = $this->new->getNewList($nWhere, $page);

        $page = $this->pager($count, $page, $this->perpage);

        return view('admin.news.multi', compact(
            'lists', 'categorys', 'page'
        ));
    }

    /**
     * @param NewCreateRequest $request
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     *
     * 多图文文章管理
     */
    public function createmulti(NewCreateRequest $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->fillData();
            $result = $this->new->saveMultiNew($data);
            if ($result['status']) return $this->success('发布文章成功!', url('news/multi'), true);
            return $this->error('发布文章失败', null, true);
        }

        $where = [
            'is_system' => 1,
            'parent_id' => 0,
            'theme' => 0,
        ];
        $categorys = $this->new->getSystemCategorys($where);
        $corps = $this->task->getNormalCorps(['status' => 1]);

        if ($id) {
            $new = $this->new->newModel->find($id);
            if (empty($new)) return $this->error('该文章不存在或已删除!');
        }

        return view('admin.news.multicreate', compact(
            'categorys', 'corps', 'new'
        ));
    }

    /**
     * 单文章管理情况
     */
    public function single(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $item = [
                'item_id' => $id,
                'item_type' => 'App\Models\CategoryModel',
            ];
            $content = $request->get('content');
            try {
                $model = $this->new->articleModel->firstOrCreate($item);
                $model->content = $content;
                $model->save();
                return $this->success('编辑单分类文章完成!', url('news/single'));
            } catch (\Exception $e) {
                $e->getMessage();
            }
            return $this->error('编辑单分类文章失败!');
        }

        $where['is_system'] = 1;
        $where['parent_id'] = 0;
        $where['theme'] = 1;
        $lists = $this->new->getSystemCategorys($where);

        if ($id) {
            $category = $this->new->categoryModel->find($id);
            if (empty($category)) return $this->error('此分类不存在!');
            return view('admin.news.singlecreate', compact('category'));
        }

        return view('admin.news.single', compact('lists'));
    }

    /**
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * 帮助中心列表列表管理
     */
    public function help(Request $request, $id = null)
    {
        $where = [
            'is_system' => 1,
            'parent_id' => 7,
            'theme' => 0,
        ];
        $categorys = $this->new->getSystemCategorys($where);

        $page = $request->page ? (int)$request->page : 1;
        $categoryIds = array_column($categorys->toArray(), 'id');
        $nWhere['in'] = [
            'category_id' => $categoryIds,
        ];
        if ($request->get('category')) {
            $nWhere = ['category_id' => $request->get('category')];
        }
        list($count, $lists) = $this->new->getNewList($nWhere, $page);
        $page = $this->pager($count, $page, $this->perpage);

        return view('admin.news.help', compact(
            'categorys', 'lists', 'page'
        ));
    }

    /**
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     *
     *  帮助中心文章信息管理
     */
    public function helpcreate(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->get('data');
            $result = $this->new->saveHelpNew($data);
            if ($result['status']) return $this->success('发布文章成功!', url('news/help'), true);
            return $this->error('发布文章失败', null, true);
        }

        $where = [
            'is_system' => 1,
            'parent_id' => 7,
            'theme' => 0,
        ];
        $categorys = $this->new->getSystemCategorys($where);

        if ($id) {
            $new = $this->new->newModel->find($id);
            if (empty($new)) return $this->error('该文章不存在或已删除!');
        }
        return view('admin.news.helpcreate', compact('categorys', 'new'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * 公告/事件列表管理
     */
    public function notice(Request $request)
    {
        $page = $request->page ? (int)$request->page : 1;
        $where = ['category_id' => 0];
        list($count, $lists) = $this->new->getNewList($where, $page);

        $page = $this->pager($count, $page, $this->perpage);

        return view('admin.news.notice', compact('lists', 'page'));
    }

    /**
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     *
     * 公告/事件信息管理
     */
    public function noticecreate(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->get('data');
            $result = $this->new->saveHelpNew($data);
            if ($result['status']) return $this->success('发布公告成功!', url('news/notice'), true);
            return $this->error('发布公告失败', null, true);
        }

        if ($id) {
            $new = $this->new->newModel->find($id);
            if (empty($new)) return $this->error('该公告不存在或已删除!');
        }
        return view('admin.news.noticecreate', compact('new'));
    }

    /**
     * @param $id
     *
     * 删除文章
     */
    public function del($id)
    {
        $result = $this->new->deleteNews($id);

        if ($result['status']) return $this->success('删除文章成功!');

        return $this->error('删除文章失败!');
    }
}