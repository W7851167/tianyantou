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
                            <form action="{!! config('app.account_url') !!}/findpassword/checkEmailRegisted.html" data-toggle="ajaxForm" method="post">
                                <div class="control-group">
                                    <label for="binded-email">已绑定邮箱：</label>
                                    <input type="text" class="input-style" id="binded-email" name="email">
                                </div>
                                <div class="control-group">
                                    <label for="email-captcha">验证码：</label>
                                    <input id="log-captcha" name="captcha" class="input-style input-size" type="text" placeholder="验证码">
                                    <input type="hidden" name="captcha_token" value="6a666e796c746b613477783074777869">
                                    <img id="captcha" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJYAAAAtCAMAAAB70mJmAAAAP1BMVEUAAAANrbYhwcoZucI01N1C4usvz9gKqrM62uMlxc4gwMkQsLkhwcoszNUFpa5D4+wYuMEx0doWtr8Do6wQsLkvC0+ZAAAAAXRSTlMAQObYZgAAAlhJREFUeJzUl4uWmjAQhgcSwFNB7fu/Y7t1BbnGBuRoSSY3iMb+e3ZXMzD5SGYmAz3CJyoODQBQImPhsUqMKzzWnv9IMmN1L0BZCKEyY3Wv50JEtdZrXndJYvIRmae5WQPNLjUFopxsvaNHQe2PNS5i6GmNm6oj61u4bqOCtFpzVwwV5LjpAAzi3riFJqVrborh0KvW+LIBxkaadVRnYgPtC1D+1UFtGrFw6kS5/J5WUZfAHKtGqZsUckoJYqGnhnIJWz8O3aa/2BmHqCfj1YqNjK8Uj/ix9na/5FLa8Eq3v7Q17JrlLLwWRND/hjNWtWWxnc4aHXl1QmP+Wgjj37iHYv5/90O/pKekirqlGr/b7B5umh/NgXaOQe6n4qVTUW0cpT98BKXzLeNTsrQTYvbrVAzMC5TXxibnuZVaxrugYRiWA377rRIyrV2Rd8P8+9RKLEqRolbCUX8AVrrCvvSvtOT3EJZ9H6CZ0iQREymbo0+RslxkEGxRgi8vb2zwRL3zypbL6flZtNa5fP3kp8IOjO+fDxd8B4kdllYUg+LDpT607BU7bPhTPWBUjSHgHUR2lFg0vaIYkypUOeStk6ez5iEIyc6bO71RTZE5duy6pSX54IUKaPTH6cTQi3gLh9uq7lih8G/VqBQLX+Ivu28TQbux8cDttmyKS/Bj6esxTE1TuehDYwvH2kPg2BI3cf6u6O/fJhErLM1D/1VsBdebsdSN61LGuiW/V2852gvL60Ssxxt85gFivUQsqaFgQeLPtIljE8rcuOxrjHryF5yJPlz+DQAA///FKIsLWBGZkgAAAABJRU5ErkJggg==" alt="验证码" class="captcha-img" style="width: 150px;height: 45px;vertical-align: middle;cursor: pointer;">
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
