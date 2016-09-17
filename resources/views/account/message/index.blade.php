@extends('layout.main')
@section('title')消息中心@stop
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
                        <a href="{!! config('app.account_url') !!}/message/deleteAll.html" class="action related-link"
                           data-method="post" data-confirm="确定要删除所有消息吗？">全部删除</a>
                        <a href="{!! config('app.account_url') !!}/message/readAll.html" class="action related-link"
                           data-method="post">标记为已读</a>
                    </h1>
                    <div class="cont-bd">
                        @if(count($lists) > 0)
                        @foreach($lists as $mv)
                        <dl class="message-group">
                            <dt><strong>{!! $mv->title or '' !!}</strong></dt>
                            <dd>{!! $mv->created_at or '' !!}</dd>
                            <dd>{!! $nv->body !!}</dd>
                        </dl>
                        @endforeach
                        @endif
                        <div class="pagination">{!! $pageHtml !!}</div>
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