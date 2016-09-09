<!-- BEGIN HEADER BEGIN -->
<div class="header-all">
    <!-- BEGGIN TOP-HEADER -->
    <div class="header">
        <div class="head-top">
            <div class="header-logo clearfix">
                <p class="header-logo-pg">系统管理中心</p>

                <div class="header-right">
                    <img src="/admin/images/user-small.png"/>

                    <div class="header-right-administrator">
                        <a href="">管理员</a>

                        <div class="header-right-triangle"></div>
                        <div class="header-right-menu">
                            <ul>
                                <li><a href="{!! url('passport/password') !!}">修改密码</a></li>
                                <li><a href="{!! url('passport/logout') !!}">退出</a></li>
                            </ul>
                        </div>
                    </div>
                    <a href="{!! config('app.url') !!}" target="_blank">访问前端</a>
                </div>
            </div>
        </div>
        <div class="header-nav clearfix">
            {!! $menu or '' !!}
        </div>
    </div>
    <!-- END TOP_HEADER -->
</div>
<!-- END HEADER -->