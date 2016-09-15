@extends('layout.main')
@section('style')
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css"/>
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/js/lib/fullcalendar/fullcalendar.min.css"/>
@stop

@section('content')
    <div class="wrap user-center">
        <div class="container clearfix">
            @include('account.common.menu')
            <div class="main tworow" style="height: 741px;">
                <div class="main-inner">
                    <h1 class="section-title clearfix">
                        <span>消息中心</span>
                        <a href="https://account.touzhijia.com/message/deleteAll.html" class="action related-link"
                           data-method="post" data-confirm="确定要删除所有消息吗？">全部删除</a>
                        <a href="https://account.touzhijia.com/message/readAll.html" class="action related-link"
                           data-method="post">标记为已读</a>
                    </h1>

                    <div class="cont-bd">
                        <dl class="message-group">
                            <dt><strong>送券</strong></dt>
                            <dd>2016-09-09 17:56:13</dd>
                            <dd>恭喜您，参与新人注册三重好礼活动获得投之家投资券100元，详细的使用规则可以前往个人中心-理财券查看。</dd>
                        </dl>
                        <dl class="message-group">
                            <dt><strong>送券</strong></dt>
                            <dd>2016-09-09 17:56:13</dd>
                            <dd>恭喜您，参与新人注册三重好礼活动获得投之家投资券50元，详细的使用规则可以前往个人中心-理财券查看。</dd>
                        </dl>
                        <dl class="message-group">
                            <dt><strong>送券</strong></dt>
                            <dd>2016-09-09 17:56:13</dd>
                            <dd>恭喜您，参与新人注册三重好礼活动获得投之家投资券30元，详细的使用规则可以前往个人中心-理财券查看。</dd>
                        </dl>
                        <dl class="message-group">
                            <dt><strong>送券</strong></dt>
                            <dd>2016-09-09 17:56:12</dd>
                            <dd>恭喜您，参与新人注册三重好礼活动获得投之家投资券8元，详细的使用规则可以前往个人中心-理财券查看。</dd>
                        </dl>
                        <div class="pagination"></div>
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