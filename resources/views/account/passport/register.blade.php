@extends('layout.main')
@section('style')
    <meta name="csrf-token" content="{!! csrf_token() !!}">
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css" />
@stop
@section('content')
<div class="wrap user-center">
    <div class="container clearfix">
        <div class="main">
            <div id="register-bg">
                <div id="register-box" class="form-group">
                    <h2>会员注册<br /><span>注册天眼投账户，开启网贷之旅</span><p>已有<em>2,499,046</em>人加入天眼投</p></h2>
                    <div class="side-area">
                        <p>已有账号？<a href="{!! config('app.account_url') !!}/signin.html">直接登录</a></p>
                        <div class="event-img">
                            <a href="#"><img src="{!! config('app.static_url') !!}/images/ads/register_award.jpg" style="margin-top:62px;"></a>
                        </div>
                    </div>
                    <form id="register" data-toggle="ajaxForm" method="post">
                        {!! csrf_field() !!}
                        <div class="msg-wrap"></div>
                        <div class="input-box">
                            <label for="reg-username">用户名：</label>
                            <input id="reg-username" name="username" class="input-style input-size" type="text" placeholder="请输入用于注册的用户名"/>
                            <i class="iconfont">&#xe61e;</i>
                            <div class="error" id="username-error"></div>
                        </div>
                        <div class="input-box">
                            <label for="log-captcha">图形验证码：</label>
                            <input id="log-captcha" name="captcha" class="input-style input-size" type="text" placeholder="验证码" style="width: 134px;margin-right: 13px;"/>
                            {{--<input type="hidden" name="captcha_token" value="6e716278656f74786565326c68796668" />--}}
                            {{--<img id="captcha" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJYAAAAtCAMAAAB70mJmAAAAP1BMVEUAAADtz+MgAhYuECQnCR0rDSEgAhYpCx8jBRkhAxcvESUfARUhAxcsDiIkBhouECQsDiIkBhoeABQfARUgAhZ/l4pNAAAAAXRSTlMAQObYZgAAAdlJREFUeJzUWP9ygjAMToXNZje3Q9//EdWb26244Vxb/APoD5paoXx3ckcJydckTSIlgxyxmpuAHWVyjYXzyfNP//7iVsKmCyICiFDZCYMowlnZvFU2KcmQsQPYW7xVPiDfCNjpn0mrAb+3sMIHMerA4pm0MYzbAz1ggtPEqep1bs2aR1bs1SXTKp8pLRVEFAi8NpNAZ6tA6wNTXkkLUin30kJeS8uiqI6DRyttoLKYkSuiHMqL6vwNaUjdbCtVRt/EF22hdrzYGPE/rhO5StNyGeYtUaed+t1Y4Ziq0o4UCDmlnHqTimcYkTvgH5RD9BdNS7Iwcs4NAcxrLByevV3JylBE9hoDbm/VyLz5ezFyUrK6cJWMlNHSvvmCwbXQzRlZv0c3jKsVLIfm2xVcGYVLLTDuOrokMNaWwVs17NuBK5PlaJhbqvqawm0htWiJpDUmQUj5dMi0Jy6VFqY68yQ87n/i69cdLztobbo3n+Nq1sbKE8DvYOkczGph3pob/la9CYhfMLYAh1DZ6by1VZdQXp0C4f4CND06tHwTXkpUATLTVfnD7VeF8JrhJIb0/mha/i8R9w5dVlo8oYE4ZFpOlzrYzINMad372e1tTOAUpTbTlP8PAAD//6pPaFyPXV4CAAAAAElFTkSuQmCC" alt="验证码" class="captcha-img" style="vertical-align: middle;">--}}
                            <img id="captcha" src="{!!url('signin/captcha')!!}" class="img" onclick="this.src='{!!url("signin/captcha?")!!}'+Math.random();" style="vertical-align: middle;" />
                            <div class="error" id=""></div>
                        </div>
                        {{--<div class="input-box">
                            <label for="reg-captcha">验证码：</label>
                            <input id="reg-captcha" name="verifyCode" class="input-style input-size" type="text" placeholder="请输入验证码" />
                            <a href="javascript:;" class="btn-captcha code-btn-size" data-toggle="verifyCode" data-action="register" data-tel="#reg-telephone">发送短信验证码</a>
                            <div class="error" id="captcha-error"></div>
                        </div>--}}
                        <div class="input-box">
                            <label for="reg-password">密&nbsp;&nbsp;&nbsp;码：</label>
                            <input id="reg-password" name="password" class="input-style input-size" type="password" placeholder="请输入登录密码"/>
                            <i class="iconfont">&#xe603;</i>
                            <div class="error" id="pwd-error"></div>
                        </div>
                        <div class="input-box">
                           <label for="reg-confirm-password">确认密码：</label>
                           <input id="reg-confirm-password" name="password_confirmation" class="input-style input-size" type="password" placeholder="请输入登录密码"/>
                           <i class="iconfont">&#xe603;</i>
                           <div class="error" id="rpwd-error"></div>
                         </div>
                        <div class="input-box">
                            <label>推荐码：</label>
                            <input name="r_popid" class="input-style input-size" type="text" placeholder="选填(手机号，邀请好友注册，得50元红包)" value=""/>
                        </div>
                        <p class="submit-box">
                            <span id="is-check">点击注册即同意天眼投&nbsp;<a id="user-agreement" href="{!! config('app.account_url') !!}/register/protocol.html" target="blank">《用户协议》</a></span>
                        </p>
                        <div class="btn-box">
                            <input type="button" class="btn-blue button-size" value="立即注册">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('script')
    <script type="text/javascript" src="http://static.phpad.net/js/lib/jquery.form.min.js"></script>
    <script type="text/javascript" src="http://static.phpad.net/js/plugins/ucenter.js"></script>
    <script type="text/javascript" src="http://static.phpad.net/js/plugins/pagination.js"></script>
    <script type="text/javascript" src="http://static.phpad.net/js/plugins/actions.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/login-frontend.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/login.js"></script>
@stop
