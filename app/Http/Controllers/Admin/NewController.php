<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By phpad
 * 文章控制器管理
 *-------------------------------------------------------------------------------
 * $FILE:NewController.php
 * $Author:zxs
 * $Dtime:2016/9/8
 ***********************************************************************************/

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\AdminController;
use App\Repositories\NewRepository;
use Illuminate\Http\Request;

class NewController extends AdminController
{
    public function __construct(
        NewRepository $new
    ) {
        parent::__construct();
        $this->new = $new;
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     *
     * 文章列表视图
     */
    public function index(Request $request)
    {
        $page = $request->page ? (int)$request->page : 1;
        $where = ['id' => $this->user['id']];
        list($count, $news) = $this->new->getNewList($where, $page);
        $silderMenu = $this->getSiderbar();
        $this->pager($count, $page, $this->perpage);
        return view('admin.news.index', compact(
            'news','silderMenu'
        ));
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View|void
     *
     * 发布文章
     */
    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            try {
                $userModel = $this->new->newModel->create(array_merge(
                    $request->all(), ['user_id' => $this->user['id']]
                ));
                if (!empty($userModel)) return $this->success('发布文章成功!');
            } catch (\Exception $e) {
                $e->getMessage();
            }
            return $this->error('发布文章失败');
        }

        return view('admin.news.create');
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\View\View|void
     *
     * 编辑文章
     */
    public function edit($id, Request $request)
    {
        if ($request->isMethod('post')) {
            $data = [
                'title' => $request->get('title'),
                'content' => $request->get('content'),
                'type' => $request->get('type'),
            ];

            try {
                $result = $this->new->newModel->whereId($id)->update($data);
                if (!empty($result)) return $this->success('编辑文章成功!');
            } catch (\Exception $e) {
                $e->getMessage();
            }
            return $this->error('编辑文章失败!');
        }

        $newModel = $this->new->newModel->find($id);
        if (empty($newModel)) return $this->error('该文章不存在或已删除!');

        return view('admin.news.edit', compact('newModel'));
    }

    /**
     * @param $id
     *
     * 删除文章
     */
    public function del($id)
    {
        $newModel = $this->new->newModel->find($id);
        if (empty($newModel)) return $this->error('删除文章失败!');

        try {
            $result = $newModel->delete();
            if (!empty($result)) return $this->success('删除文章成功!');
        } catch (\Exception $e) {
            $e->getMessage();
        }
        return $this->error('删除文章失败!');
    }

    /**
     * 生成自动的左侧菜单信息
     */
    private function getSiderbar()
    {
        $url = \Request::path();
        $url = ltrim($url,'/');
        $categorys = $this->new->getSystemCategorys();
        $sidebarHtml = '';
        $sidebarHtml .= '<ul class="content-left-menu clearfix">';
        foreach ($categorys as $model) {
            $path = 'news/'.$model->page;
            $sidebarHtml .= '<li><a href="' . url($path) . '"';
            if (substr($url, 0,strlen($path)) === $path) {
                $sidebarHtml .= ' class="on"';
            }
            $sidebarHtml .= ' >' . $model->title . '</a></li>';
        }
        $sidebarHtml .= '</ul>';

        return $sidebarHtml;
    }
}