@extends('admin.common.layout')
@section('title') 红包信息 @stop
@section('style')
    {!!HTML::style('admin/css/lists.css')!!}
@stop
@section('content')
    <div class="content-all">
        <div class="content clearfix">
            @include('admin.common.sidebar')
            <div class="content-right">
                <div class="content-right-header clearfix">
                    <div class="content-right-header clearfix">
                        <img src="{!!url('admin/images/u5.png')!!}"/>
                        <a href="{!! url('coupon') !!}">项目管理&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                        <a href="{!! url('coupon') !!}">红包列表</a>
                    </div>
                </div>

                <div class="content-right-tit clearfix">
                    <p><a href="{!! url('coupon') !!}" @if(!isset($status))class="at" @endif>无限制红包</a></p>
                    <p><a href="{!! url('coupon',['status'=>1]) !!}" @if(isset($status) && $status == 1)class="at" @endif>指定平台红包</a></p>
                    <p><a href="{!! url('coupon',['status'=>2]) !!}" @if(!empty($status) && $status ==2) class="at" @endif>私人红包</a></p>

                    <p><a href="javascript:void(0)"></a></p>
                    <a href="{!!url('coupon/create')!!}" class="buttonA">创建红包</a>
                </div>
                <table class="all_shopping" cellspacing="0">
                    <tr>
                        <th width='90'>红包ID</th>
                        <th width="140">平台名称</th>
                        <th width="60">金额</th>
                        @if($status==1)<th width="80">私人Id</th>@endif
                        <th width="100">红包要求</th>
                        @if($status!=null)<th width="140">针对平台</th>@endif
                        <th width="80">开始时间</th>
                        <th width="100">结束时间</th>
                        <th>操作</th>
                    </tr>
                   @if(!empty($coupon))
                    @foreach($coupon as $value)
                        <tr class="js_reply_all">
                            <th>{!! $value->coupon_id !!}</th>
                            <th>{!! $value->name !!}</th>
                            <th>{!! $value->moneys !!}</th>
                            @if($status==1)<th>{!! $value->user_id !!}</th>@endif
                            <th>{!! $value->month !!}月,{!! $value->sum !!}元</th>
                            @if($status!=null)<th>{!! $value->pertinence !!}</th>@endif
                            <th>{!! $value->start_time !!}</th>
                            <th>{!! $value->over_time !!}</th>
                            <th><a href="coupon/create/{!! $value->coupon_id !!}">修改</a></th>
                        </tr>
                        @endforeach
                    @endif
                </table>
                <ul class="page_info page">

                </ul>
            </div>
        </div>
    </div>
@stop
