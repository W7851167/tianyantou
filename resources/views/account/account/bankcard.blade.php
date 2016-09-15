@extends('layout.main')
@section('style')
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css" />
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/js/lib/fullcalendar/fullcalendar.min.css" />
@stop

@section('content')
<div class="wrap user-center">
        <div class="container clearfix">
            @include('account.common.menu')
            <div class="main tworow" style="height: 831px;">
                <div class="main-inner">
                    <h1 class="section-title">绑定银行卡</h1>
                    <div class="tips">请先进行<a class="link" href="https://account.touzhijia.com/safe.html">实名认证</a>后再绑定银行卡
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop