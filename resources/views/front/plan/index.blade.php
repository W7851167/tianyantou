@extends('layout.main')
@section('title')天眼盾用户保障计划_天眼投投资平台@stop
@section('style')
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/js/lib/laypage//skin/laypage.css !!}" />
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/js/lib/laypage//skin/laypage.css !!}" />
@stop
@section('content')
    <div id="platform" class="wrap">
        <div class="container" style="margin-top: 30px;">
            <img src="{!! config('app.static_url') !!}/images/plan/tianyandun.jpg">
        </div>
    </div>
@stop
@section('script')
    <script type="text/javascript" src="{!!config('app.static_url')!!}/js/lib/laypage/laypage.js?ver={!! time() !!}"></script>
    <script type="text/javascript" src="{!!config('app.static_url')!!}/js/plugins/main.js?ver={!! time() !!}"></script>
    <script type="text/javascript" src="{!!config('app.static_url')!!}/js/lib/laypage/laypage.js?ver={!! time() !!}"></script>
@stop