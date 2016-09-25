@extends('layout.main')
@section('style')
    <meta name="csrf-token" content="{!! csrf_token() !!}">
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css" />
@stop
@section('content')
<div class="wrap user-center">
    <div class="container clearfix">
        <input type="hidden" id="status" value="333">
        <div class="reset-password">
            <!-- 找回密码步骤 start-->
            <div class="tab click-tab">
                <ul class="tab-nav"><li><a href="{!! config('app.account_url') !!}/findpassword/resetByPhone.html">手机找回</a></li><li class="active"><a href="javascript:void(0);">邮箱找回</a></li>        </ul>
                <div class="tab-main">
                    <div class="">
                        <ul class="process-state via-phone clearfix">
                            <li class="passed">
                                <i class="step-1"></i>
                                <span>确认账号</span>
                            </li>
                            <li class="passed">
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
                            <li class="passed">
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
                <!-- 通过邮箱第2步 -->
                <div class="step-content">
                    <h6><i class="iconfont"></i>邮件已发送，请查收</h6>
                    <div class="form-group">
                        <div class="process-reminder">已向邮箱zhuxishun@cw100.com发送邮件，请点击邮件中的链接完成登录邮箱验证操作。
                            如未收到，请点击<a href="{!! config('app.account_url') !!}/findpassword/resetByEmail.html" class="send-again">重新发送</a>
                            <p><a href="javascript:;" class="btn-blue btn-l btn-submit">下一步</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('script')
    <script type="text/javascript" src="{!! config('app.static_url') !!}m/js/plugins/findpassword.js"></script>
@stop
