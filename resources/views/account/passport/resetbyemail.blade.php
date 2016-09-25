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
                                    <img id="captcha"
                                         src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJYAAAAtCAMAAAB70mJmAAAAP1BMVEUAAAB8fH5paWtVVVcNDQ+BgYNkZGZ/f4EyMjQKCgx6enwWFhhISEoxMTM4ODptbW8aGhx1dXdbW11iYmRYWFpi+KTkAAAAAXRSTlMAQObYZgAAAr5JREFUeJzsWQ9zoy4QhVVBDE1+8/v+X/IuRkP4d0jTm0RQwaPX3ExfZ8wM4PJ2YZeHrRtUHKf0oT8W2vEn0CqAuowZVXiu30OxzSeza8YkwP0Xu78Xwgcti/4oWqXxQasAK67XetURMmwVy0R9FPXVz5/8yvKGPJQrEJq+04oDiGr7VFMHlBPZdVSrpkzOJrkUpFUSl4kW+2oWIRytrBT5S6jR2yBbBMIEXVQRDbewHRowqoFBkbAvBmgwRrYKy4fprDtcLrGErDsl3U+kz1g98vNbmD4Yj9PzINJ2MRDkfOPnecoDqUbnFzuZMfLSMHIuBISOd85Ofwzf6PDgnjd0NiKJVqNqZ7zvwnY8Taqi3i3vKytajs5hsCqvp06ImbTz+Vp7G4HfFny7rFWkdC6bllipFoaQrouUW/WKbgXrYzNd/HNAs/HjU/fkbhItgzqhUBfw6qltpNswPzdY3efRtPEEqH6u8gD3Q4HJLjS1TEtXg7MZSTZJAdCQWlVaGx9p6rtpi2JbftEe4c5ht+yEkKf2N91fXI4ksnJOiLiSw8avMleNjHQ2qFVY4jroY+DM2cpH+vbQfhyoGk9YXWeBbG7s4aiOpPAywkV0tDRDYMP9q/0FpidzWohbAaJB8r+na4s5TKOryKSdUQAD0/Q8C/HJ1QYl61hRXhE2PE5LH8jkHZf6mqPgI5VxBZuWb+SZlWobH/Me2cTD5x1ZrFbVKZ8mDxr15X0tDEur8ruQr06P2lzZ+f9b4tmzD3tEc1eBNTEFfFq6u2djp5Zf3SkF9NvO6/BnK8cXVKYTvmnl4JtWDl6U1mKBUGnDlrApqdfxSd9OKZpL9zxkLSKlNHGkWGe1+XlhM1oPFvyJAxHlnQuGYvr9ETmL6ENVRDewLd++JhM3I55DS6BCwdrGP/5fjOgFa/NivRu/AgAA//8W9eFdJfH2egAAAABJRU5ErkJggg=="
                                         alt="验证码" class="captcha-img"
                                         style="width: 150px;height: 45px;vertical-align: middle;cursor: pointer;">
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