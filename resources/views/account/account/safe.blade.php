@extends('layout.main')
@section('title')安全中心@stop
@section('style')
    <meta name="csrf-token" content="{!! csrf_token() !!}">
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css" />
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/js/lib/fullcalendar/fullcalendar.min.css" />
@stop

@section('content')
<div class="wrap user-center">
        <div class="container clearfix">
            @include('account.common.menu')
            <div class="main tworow" style="height: 831px;">
                <div class="main-inner">
                    <h1 class="section-title">安全中心</h1>
                    @if(empty($userinfo->nickname))
                    <div class="validation-group valid-nickname">
                        <dl class="validation-status clearfix">
                            <dt>
                                <i class="s-icon"></i>
                                <span class="validation-name">用户名修改</span>
                            </dt>
                            <dd>
                                <span class="valid-value"></span>
                                <a href="{!! config('app.account_url') !!}/safe/changeNickname.html"
                                   class="inline-modify modify-btn" data-target="#nickname-panel">修改用户名</a>
                            </dd>
                        </dl>
                        <div class="validation-process hidden" id="nickname-panel"></div>
                    </div>
                    @endif
                    <div class="validation-group valid-telephone">
                        <dl class="validation-status clearfix">
                            <dt>
                                <i class="s-icon"></i>
                                <span class="validation-name">手机验证</span>
                                @if($userinfo->mobile)<i class="iconfont verified">&#xe61b;</i>@endif
                            </dt>
                            <dd>
                                <span class="valid-value">@if($userinfo->mobile){!! substr_replace($userinfo->mobile,'****',3,4) !!}@else未验证@endif</span>
                                <a href="{!! config('app.account_url') !!}/safe/changeTelephone.html"
                                   class="inline-modify modify-btn" data-target="#telephone-panel">@if($userinfo->mobile)通过原手机修改@else验证手机@endif</a>
                                <a href="{!! config('app.account_url') !!}/safe.html" class="modify-btn"></a>
                            </dd>
                        </dl>
                        <div class="validation-process hidden" id="telephone-panel"></div>
                    </div>
                    <div class="validation-group valid-email">
                        <dl class="validation-status clearfix">
                            <dt>
                                <i class="s-icon"></i>
                                <span class="validation-name">邮箱验证</span>
                                @if($userinfo->email)<i class="iconfont verified">&#xe61b;</i>@endif
                            </dt>
                            <dd>
                                <span class="valid-value">@if($userinfo->email){!! substr_replace($userinfo->email,'******',1,6) !!}@else 未验证 @endif</span>
                                @if(empty($userinfo->email))
                                    <a href="{!! config('app.account_url') !!}/safe/validateEmail.html"
                                       class="inline-modify modify-btn" data-target="#email-panel">验证</a>
                                @else
                                    <a href="{!! config('app.account_url') !!}/safe/validateEmail.html" class="inline-modify modify-btn" data-target="#email-panel">通过原邮箱修改</a>
                                    <a href="{!! config('app.account_url') !!}/safe/changeEmailByTelephone.html" class="inline-modify modify-btn" data-target="#email-panel">通过手机修改</a>
                                @endif
                            </dd>
                        </dl>
                        <div class="validation-process hidden" id="email-panel"></div>
                    </div>
                    {{--<div class="validation-group valid-id_card">
                        <dl class="validation-status clearfix">
                            <dt>
                                <i class="s-icon"></i>
                                <span class="validation-name">实名认证</span>
                            </dt>
                            <dd>
                                <span class="valid-value">未认证</span>
                                <a href="{!! config('app.account_url') !!}/safe/validIdCard.html"
                                   class="inline-modify modify-btn" data-target="#id_card-panel">认证</a>
                            </dd>
                        </dl>
                        <div class="validation-process hidden" id="id_card-panel"></div>
                    </div>--}}
                    <div class="validation-group valid-bank_id">
                        <dl class="validation-status clearfix">
                            <dt>
                                <i class="s-icon"></i>
                                <span class="validation-name">绑定银行卡</span>
                                @if(!empty($userinfo->bank))<i class="iconfont verified">&#xe61b;</i>@endif
                            </dt>
                            <dd>
                                <span class="valid-value">@if(!empty($userinfo->bank))已绑定@else未绑定@endif</span>
                                <a href="{!! config('app.account_url') !!}/bankcard.html" class="modify-btn">@if(!empty($userinfo->bank))绑定@else 修改 @endif</a>
                            </dd>
                        </dl>
                        <div class="validation-process hidden" id="bank_id-panel"></div>
                    </div>
                    <div class="validation-group valid-password">
                        <dl class="validation-status clearfix">
                            <dt>
                                <i class="s-icon"></i>
                                <span class="validation-name">登录密码</span>
                                @if($userinfo->password)<i class="iconfont verified">&#xe61b;</i>@endif
                            </dt>
                            <dd>
                                <span class="valid-value">已设置</span>
                                <a href="{!! config('app.account_url') !!}/safe/changePassword.html"
                                   class="inline-modify modify-btn" data-target="#password-panel">修改</a>
                            </dd>
                        </dl>
                        <div class="validation-process hidden" id="password-panel"></div>
                    </div>
                    <div class="validation-group valid-dealpassword">
                        <dl class="validation-status clearfix">
                            <dt>
                                <i class="s-icon"></i>
                                <span class="validation-name">交易密码</span>
                                @if($userinfo->money->password)<i class="iconfont verified">&#xe61b;</i>@endif
                            </dt>
                            <dd>
                                <span class="valid-value">@if($userinfo->money->password)已设置@else未设置@endif</span>
                                @if($userinfo->money->password)
                                <a href="{!! config('app.account_url') !!}/safe/finddealpassword.html"
                                   class="inline-modify modify-btn" data-target="#dealpassword-panel">找回交易密码</a>
                                <a href="{!! config('app.account_url') !!}/safe/changeDealPassword.html"
                                   class="inline-modify modify-btn" data-target="#dealpassword-panel">修改</a>
                                @else
                                <a href="{!! config('app.account_url') !!}/safe/setDealPassword.html"
                                   class="inline-modify modify-btn" data-target="#dealpassword-panel">设置</a>
                                @endif
                            </dd>
                        </dl>
                        <div class="validation-process hidden" id="dealpassword-panel"></div>
                    </div>
                    {{--<div class="validation-group valid-security_question">
                        <dl class="validation-status clearfix">
                            <dt>
                                <i class="s-icon"></i>
                                <span class="validation-name">密保问题</span>
                            </dt>
                            <dd>
                                <span class="valid-value">未设置</span>
                                <a href="{!! config('app.account_url') !!}/safe/setSecurityQuestion.html"
                                   class="inline-modify modify-btn" data-target="#security_question-panel">设置</a>
                            </dd>
                        </dl>
                        <div class="validation-process hidden" id="security_question-panel"></div>
                    </div>--}}
                </div>

            </div>
        </div>
    </div>
@stop

@section('script')
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/lib/jquery.form.min.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/ucenter.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/pagination.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/actions.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/form.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/safe.js"></script>
    <script>
        $('.valid-security_question').on('change','select',function(){
            var thisQ = this.selectedOptions[0].innerHTML;
            var otherQ = $(this).parent().siblings().find('select option:selected');
            for(var i = 0;i < otherQ.length;i++){
                if(thisQ === otherQ[i].innerHTML){
                    console.log(1);
                    layer.msg('密保问题不能重复',{icon:5,time:3000});
                    this.selectedIndex = 0;
                }
            }
        });

        $(function(){
            var anchor,
                    targetPanelMap = [
                        'valid-nickname',
                        'valid-telephone',
                        'valid-email',
                        'valid-id_card',
                        'valid-bank_id',
                        'valid-password',
                        'valid-dealpassword',
                        'valid-security_question'
                    ];
            if (location.hash) {
                anchor = location.hash.substring(1);
                if ($.inArray(anchor, targetPanelMap) != -1) {
                    $('.validation-group.' + anchor).find('dd a')[0].click();
                }
            }
        });
    </script>
@stop
