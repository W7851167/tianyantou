<div class="content-left ">
    <div class="content-left-heaeder ">
        <div class="content-left-header-pic clearfix">
            <a href="javascript:void(0)"><img src="{!! url('admin/images/user-small.png')!!}"/></a>
            <div class="content-left-header-pic-page">
                <span>{!! \Session::get('user.login') !!}</span>
                <p><a href="{!! url('user/password') !!}">修改密码</a></p>
                <p><a href="{!! url('passport/logout') !!}">退出登录</a></p>
            </div>
        </div>
    </div>
    {!!$silderMenu or ''!!}
</div>