<?php
/*********************************************************************************
 *  后台登陆控制器
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:BaseModel.php
 * $Author:pzz
 * $Dtime:2016/9/7
 ***********************************************************************************/

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\AdminController;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class PassportController extends AdminController
{
    public function __construct(
        UserRepository $userRepository
    )
    {
        parent::__construct();
        $this->userRepository = $userRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View|void
     *
     * 验证登陆
     */
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {

            $username = $request->username;
            $password = $request->password;
            $remember = $request->remember;

            if (!$username || !$password) return $this->error('用户名或密码错误1!', '', true);

            $result = $this->userRepository->checkLogin($username, $password, true, $remember);

            if ($result['status']) {
                return $this->success('登陆成功!', url('dashboard'), true);
            }

            return $this->error($result['message'], '', true);
        }

        if ($this->user) return redirect('dashboard');

        return view('admin.passport.index');
    }

    /**
     * @return string
     * 退出系统
     */
    public function logout()
    {
        if ($this->userRepository->logout()) {
            return redirect(url('passport/login'));
        }
    }

    public function password(Request $request)
    {
        if ($request->isMethod('post')) {
            $old = $request->get('old');
            $new = $request->get('new');
            $confirmation = $request->get('confirmation');
            if ($new !== $confirmation)
                return back()->with('errors', '两次密码不正确!');

            $userModel = $this->userRepository->userModel->find($this->user['id']);
            if (!password_verify($old, $userModel->password ?: ''))
                return back()->with('errors', '原密码不正确!');

            try {
                $result = $this->userRepository->userModel->whereId($this->user['id'])
                    ->update(['password' => \Hash::make($new)]);
                if ($result) {
                    $this->userRepository->logout();
                    return redirect('passport/login');
                }
            } catch (\Exception $e) {
                $e->getMessage();
            }
            return back()->with('errror', '修改密码失败!');
        }

        return view('admin.passport.forget_password');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     *
     * 通过flash插件上传图片
     */
    public function uploadImg(Request $request)
    {
        $path = $request->input('path') ? $request->input('path') : 'imgs';

        $path = base_path('static/uploads/' . $path . '/');
        if (!file_exists($path)) mkdir($path, 0755, true);

        $upload = app()->make('LibraryManager')->create('Upload');
        $upload->maxSize = 2097152;// 设置附件上传大小
        $upload->exts = array('jpg', 'jpeg', 'png');// 设置附件上传类型
        $upload->rootPath = $path; // 设置附件上传目录
        // 上传文件
        $info = $upload->upload();
        if (!$info) {
            $this->error($upload->getError(), '', true);
        }
        // 上传成功
        $src['name'] = $info['Filedata']['name'];
        $openUrl = $upload->rootPath . $info['Filedata']['savepath'] . $info['Filedata']['savename'];
        $src['master'] = str_replace(base_path('static/uploads'), '', $openUrl);
        $src['master_url'] = config('app.static_url') . str_replace(base_path('static/uploads'), '', $openUrl);

        $image = app()->make('LibraryManager')->create('Image');
        for ($i = 0; $i < 5; $i++) {
            $image->open($openUrl);
            if (request('width' . $i) && request('height' . $i)) {
                $dir = $upload->rootPath . $info['Filedata']['savepath'] . request('width' . $i) . request('height' . $i);
                if (!file_exists($dir))
                    mkdir($dir, 0755, true);

                $file = preg_replace('/(\.\w+$)/i', '.jpg', $dir . '/' . $info['Filedata']['savename']);
                $image->thumb(request('width' . $i), request('height' . $i), request('type' . $i, 1))->save($file, 'jpg');
                $file = str_replace(base_path('static/uploads'), '', $file);
                $file = ltrim($file, '\\');
                $file = ltrim($file, '/');
                $src[request('width' . $i) . request('height' . $i)] = config('app.static_url') . '/' . $file;
            }
        }
        return $this->success($src, '', true);
    }
}
