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
                            <li class="last passed">
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
                            <li class="passed">
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
                <!-- 通过邮箱第3步 -->
                <div class="step-content">
                    <h6><i class="iconfont"></i>设置您的新密码</h6>
                    <div class="form-group">
                        <form action="{!! config('app.account_url') !!}/findpassword/doResetPasswordEmail.html" method="post">
                            <div class="control-group">
                                <label for="new-password">新密码：</label>
                                <input type="password" class="input-style" id="password" name="password">
                            </div>
                            <div class="control-group">
                                <label for="repeat-password">重复密码：</label>
                                <input type="password" class="input-style" id="repeat_password" name="confirm_password">
                                <input type="hidden" name="token" value="PJ4K75">
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
    <script type="text/javascript" src="{!! config('app.static_url') !!}m/js/plugins/findpassword.js"></script>
@stop