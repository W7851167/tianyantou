<div class="content-left ">
    <div class="content-left-heaeder ">
        <div class="content-left-header-pic clearfix">
            <?php $user = \Session::get('user.passport'); ?>
            <a href="javascript:void(0)">
                @if(!empty($user['avatar']))
                <img src="{!! config('app.static_url') . $user['avatar']!!}">
                @else
                <img src="{!!url('admin/images/user-small.png')!!}"/>
               @endif
            </a>
            <div class="content-left-header-pic-page">
                <span>{!! $user['username'] !!}</span>
                <p><a href="{!! url('passport/password') !!}">修改密码</a></p>
                <p><a href="{!! url('passport/logout') !!}">退出登录</a></p>
            </div>
        </div>
    </div>
    {!!$silderMenu or ''!!}
</div>