@extends('layout.main')
@section('title')网贷选平台行情_网贷选平台特色数据_天眼投精选平台搜索@stop
@section('style')
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/js/lib/laypage//skin/laypage.css !!}" />
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/js/lib/laypage//skin/laypage.css !!}" />
@stop
@section('content')
    <div id="platform" class="wrap">
        <div class="container">
            <img src="{!! config('app.static_url') !!}/images/plan/tianyandun.jpg">
        </div>
    </div>
    <!--内容结束-->
@stop
@section('script')
    <script type="text/javascript" src="{!!config('app.static_url')!!}/js/lib/laypage/laypage.js?ver={!! time() !!}"></script>
    <script type="text/javascript" src="{!!config('app.static_url')!!}/js/plugins/main.js?ver={!! time() !!}"></script>
    <script type="text/javascript" src="{!!config('app.static_url')!!}/js/lib/laypage/laypage.js?ver={!! time() !!}"></script>
    <script type="text/javascript" src="{!!config('app.static_url')!!}/js/lib/jquery.form.min.js"></script>
    <script type="text/javascript" src="{!!config('app.static_url')!!}/js/plugins/form.js?ver={!! time() !!}"></script>
    <script type="text/javascript" src="{!!config('app.static_url')!!}/js/plugins/login.js?ver={!! time() !!}"></script>
@stop