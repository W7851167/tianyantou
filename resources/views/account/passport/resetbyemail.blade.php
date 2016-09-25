@extends('layout.main')
@section('style')
    <meta name="csrf-token" content="{!! csrf_token() !!}">
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css"/>
@stop
@section('title') 用户登录 @stop
@section('content')
    <div class="wrap user-center">
        <div class="container clearfix">
            <input type="hidden" id="status" value="333">
            <div class="reset-password">
                <!-- 找回密码步骤 start-->
                <div class="tab click-tab">
                    <ul class="tab-nav">
                        <li><a href="{!! config('app.account_url') !!}/findpassword.html">手机找回</a></li>
                        <li class="active"><a href="javascript:void(0);">邮箱找回</a></li>
                    </ul>
                    <div class="tab-main">
                        <div class="">
                            <ul class="process-state via-phone clearfix">
                                <li class="passed">
                                    <i class="step-1"></i>
                                    <span>确认账号</span>
                                </li>
                                <li class="">
                                    <i class="step-2"></i>
                                    <span>重置密码</span>
                                </li>
                                <li class="last ">
                                    <i class="step-3"></i>
                                    <span>完成</span>
                                </li>
                            </ul>
                        </div>
                        <div class="active">
                            <ul class="process-state via-email clearfix">
                                <li class="passed">
                                    <i class="step-1"></i>
                                    <span>确认账号</span>
                                </li>
                                <li class="">
                                    <i class="step-2"></i>
                                    <span>安全验证</span>
                                </li>
                                <li class="">
                                    <i class="step-3"></i>
                                    <span>重置密码</span>
                                </li>
                                <li class="last ">
                                    <i class="step-4"></i>
                                    <span>完成</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- 找回密码步骤 end-->
                <!-- 找回密码流程内容 start-->
                <div class="process-form">
                    <!-- 通过邮箱第一步 -->
                    <div class="step-content">
                        <h6><i class="iconfont"></i>请输入您绑定的邮箱账号</h6>
                        <div class="form-group">
                            <form action="{!! config('app.account_url') !!}/findpassword/checkEmailRegisted.html"
                                  data-toggle="ajaxForm" method="post">
                                <div class="control-group">
                                    <label for="binded-email">已绑定邮箱：</label>
                                    <input type="text" class="input-style" id="binded-email" name="email">
                                </div>
                                <div class="control-group">
                                    <label for="email-captcha">验证码：</label>
                                    <input id="log-captcha" name="captcha" class="input-style input-size" type="text"
                                           placeholder="验证码">
                                    <input type="hidden" name="captcha_token" value="7473676c646f6468326d757373387335">
                                    <img id="captcha" src="{!!url('signin/captcha')!!}" class="img" onclick="this.src='{!!url("signin/captcha?")!!}'+Math.random();" style="vertical-align: middle;" />
                                </div>
                                <input type="submit" class="btn-blue btn-l btn-submit">
                            </form>
                        </div>
                    </div>
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
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/base64encode.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/login.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/wxLogin.js"></script>
@stop