<div class="content-left ">
    <div class="content-left-heaeder ">
        <div class="content-left-header-pic clearfix">
            <a href="javascript:void(0)"><img src="{!! url('admin/images/user-small.png')!!}"/></a>
            <div class="content-left-header-pic-page">
                <span>{!! $userInfo['username'] or ''!!}</span>
                <p><a href="{!! url('/logout') !!}">退出登录</a></p>
                <p><a href="{!! url('/account/create') !!}">创建账户</a></p>
            </div>
        </div>
    </div>
    {!!$silderMenu or ''!!}
</div>