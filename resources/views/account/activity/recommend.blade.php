@extends('layout.main')
@section('style')
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css" />
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/js/lib/fullcalendar/fullcalendar.min.css" />
@stop

@section('content')
<div class="wrap user-center">
        <div class="container clearfix">
            @include('account.common.menu')
            <div class="main tworow" style="height: 1343px;">
                <div class="main tworow invite" style="height: 1343px;">
                    <div class="main-inner">
                        <h1 class="section-title">邀请好友</h1>
                        <div class="content-unit ">
                            <div class="unit-bd unit-3 ">
                                <dl>
                                    <dt>已获邀请奖励（元）</dt>
                                    <dd>0.00</dd>
                                </dl>
                                <dl>
                                    <dt>累计邀请好友（人）</dt>
                                    <dd>0</dd>
                                </dl>
                                <dl class="last-item">
                                    <dt>未激活理财券（张）</dt>
                                    <dd>0</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="cont-box-wrap">
                            <div class="tab click-tab">
                                <ul class="tab-nav">
                                    <li class="active"><a
                                                href="https://account.touzhijia.com/activity/recommend.html">邀请奖励</a></li>
                                    <li><a href="https://account.touzhijia.com/activity/recommendlist.html">邀请记录</a></li>
                                </ul>
                                <div class="tab-main">
                                    <div class="active">
                                        <div class="invite-reward">
                                            <img src="./投之家 - 个人中心_files/invite-reward.jpg" alt="">
                                            <a href="http://topics.touzhijia.com/newregister.html" target="_blank"
                                               class="btn btn-blue btn-l">查看详情</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cont-box-wrap">
                            <div class="tab click-tab" style="border:0">
                                <ul class="tab-nav" style="border-top:0">
                                    <li style="border-bottom:2px solid #2AA3CE"><a style="padding:0 20px"
                                                                                   href="javascript:void(0);">邀请方式</a></li>
                                </ul>
                                <div class="tab-main" style="border:1px solid #E2E2E2;border-top:0">
                                    <div class="active">
                                        <ul class="invite-method">
                                            <li style="width:210px;height:210px;">
                                                <span class="invite-link">复制注册链接<br>发给好友即可哦~</span>
                                                <a href="javascript:;" class="btn btn-blue btn-m"
                                                   data-url="https://account.touzhijia.com/register.html?uid=2616033"
                                                   id="copy-link">复制链接</a>
                                            </li>
                                            <li style="width:210px;height:210px;">
                                                <span class="invite-wechat">微信邀请</span>
                                                <p>扫描二维码后将链接发给好友</p>
                                                <div id="invite-qrcode"
                                                     data-url="http://m.touzhijia.com/account/register?uid=2616033&amp;tel=150****9522">
                                                    <canvas width="90" height="90"></canvas>
                                                </div>
                                            </li>
                                            <li style="width:210px;height:210px;">
                                                <span class="invite-code">邀请码邀请</span>
                                                <p>好友注册时候可以填写您的<br>手机号码作为推荐码</p>
                                                <em>15072309522</em>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tip tab-rules">
                            <h3 class="title-indent">温馨提示</h3>
                            <div class="tip-main">
                                <ul class="tab-content">
                                    <li>1. 所有红包、投资券及加息券请在“个人中心-理财劵”中查看，购买投之家定期产品时可以使用；</li>
                                    <li>2. 请将上方的推广链接发送给您的好友，或者您好友在注册投之家账号的时候，填写您的手机号码；</li>
                                    <li>3. 根据活动情况，获得投之家邀请奖励会有所变化，具体相关活动请关注网站活动公告。</li>
                                </ul>
                            </div>
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
@stop
