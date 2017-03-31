@extends('layout.main')
@section('title')提现@stop
@section('style')
    <meta name="csrf-token" content="{!! csrf_token() !!}">
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css" />
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/js/lib/fullcalendar/fullcalendar.min.css" />
@stop

@section('content')
    <div class="wrap user-center">
        <div class="container clearfix">
            @include('account.common.menu')
            <div class="main tworow" style="height: 872px;">
                <div class="main-inner">
                    <div class="tips">您还未绑定银行卡，请先<a href="{!! config('app.account_url') !!}/bankcard.html" class="link">绑定银行卡</a>再进行提现操作</div></div>
            </div>
        </div>
    </div>
@stop