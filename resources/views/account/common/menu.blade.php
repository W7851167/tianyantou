<div class="l-side-menu" style="height: 739px;">
    <ul class="first-menu">
        <li>
            <div class="user-avatar">
                @if(isset($user['avatar']) && $user['avatar'])
                <img src="{!! config('app.static_url'.'/'.$user['avatar']) !!}" alt="" width="100" height="100">
                @else
                <img src="{!! config('app.static_url') !!}/images/user/headerimg2.png" alt="" width="100" height="100">
                @endif
                <span class="user-nickname" title="{!! $user['username'] or '' !!}">
                     {!! $user['username'] or '' !!}
                    <a class="iconfont" style="color: #666;" href="{!! config('app.account_url') !!}/safe.html">&#xe69f;</a>
                </span>
                <p class="accoount-validation mt10">
                    <a href="{!! config('app.account_url') !!}/safe.html" title="身份验证" @if($user['invest'] == 1) class="activated" @endif>
                        <i class="icon-identity"></i>
                    </a>
                    <a href="{!! config('app.account_url') !!}/safe.html" title="手机验证" @if($user['mobile'] == 1) class="activated" @endif>
                        <i class="icon-phoneno"></i>
                    </a>
                    <a href="{!! config('app.account_url') !!}/safe.html" title="邮箱验证" @if($user['email'] == 1) class="activated" @endif>
                        <i class="icon-email"></i>
                    </a>
                    <a href="{!! config('app.account_url') !!}/safe.html" title="银行卡验证" @if($user['bank'] == 1) class="activated" @endif>
                        <i class="icon-bankcard"></i>
                    </a>
                </p>
                <div class="checkin-area">
                    <div class="check-in ">
                        <p>积分：<span>10</span></p>
                    </div>
                    <i>+5</i>
                    <div class="checkin-rules">
                        <p>您已连续签到 <em class="checkin-days">0</em>天，今日签到<em class="check-points">+1</em></p>
                    </div>
                </div>
            </div>
        </li>
        <li><a href="{!!config('app.account_url')!!}/"><i class="iconfont">&#xe61c;</i>我的天眼投</a></li>
        <li><h3><i class="iconfont">&#xe685;</i>投资记录</h3>
            <ul class="second-menu">
                <li><a href="{!!config('app.account_url')!!}/networth/index.html">投资记录</a></li>
            </ul>
        </li>
        <li><h3><i class="iconfont">&#xe612;</i>平台管理<span class="iconfont newicon">&#xe64d;</span></h3>
            <ul class="second-menu">
                <li><a href="{!!config('app.account_url')!!}/platforms/statistic.html">平台统计</a></li>
                <li><a href="{!!config('app.account_url')!!}/platforms/analysis.html">投资明细</a></li>
            </ul>
        </li>
        <li><h3><i class="iconfont">&#xe631;</i>资金管理</h3>
            <ul class="second-menu">
                <li><a href="{!!config('app.account_url')!!}/wallet/withdraw.html">提现</a></li>
                <li><a href="{!!config('app.account_url')!!}/wallet/book.html">资金流水</a></li>
            </ul>
        </li>
        <li><h3><i class="iconfont">&#xe632;</i>账号管理</h3>
            <ul class="second-menu">
                <li><a href="{!!config('app.account_url')!!}/safe.html">安全中心</a></li>
                <li><a href="{!!config('app.account_url')!!}/bankcard.html">银行卡</a></li>
            </ul>
        </li>
        {{--<li>
            <h3><i class="iconfont">&#xe62f;</i>活动专区</h3>
            <ul class="second-menu">
                <li><a href="{!!config('app.account_url')!!}/activity/recommend.html">邀请奖励</a></li>
                <li><a href="{!!config('app.account_url')!!}/shop.html">兑换记录</a></li>
            </ul>
        </li>--}}
        {{--<li><a href="{!!config('app.account_url')!!}/coupon/index.html"><i class="iconfont">&#xe699;</i>理财券</a></li>--}}
        <li class="current">
            <a href="{!!config('app.account_url')!!}/message.html"><i class="iconfont">&#xe62d;</i>消息中心</a>
        </li>
        <li class="active">
            <h3><i class="iconfont" style="background-image:url(/images/menuicon/jifen.png);vertical-align: middle;">&#xe631;</i>我的积分</h3>
            <ul class="second-menu" style="display: block;">
                <li><a href="{!! config('app.account_url') !!}/user/scores.html">积分明细</a></li>
            </ul>
        </li>
    </ul>
</div>