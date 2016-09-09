<div class="content-left ">
    <div class="content-left-heaeder ">
        <div class="content-left-header-pic clearfix">
            <?php $user = \Session::get('user.passport'); ?>
            <a href="javascript:void(0)"><img src="{!! config('app.img_url') . (isset($user['avatar']) ? $user['avatar'] : url('admin/images/user-small.png'))!!}"/></a>
            <div class="content-left-header-pic-page">
                <span>{!! $user['username'] !!}</span>
                <p><a href="{!! url('passport/password') !!}">修改密码</a></p>
                <p><a href="{!! url('passport/logout') !!}">退出登录</a></p>
            </div>
        </div>
    </div>
    {!!$silderMenu or ''!!}
</div>