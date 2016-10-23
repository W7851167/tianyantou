@extends('admin.common.layout')
@section('title') 项目信息 @stop
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
                        <a href="{!! url('task') !!}">项目管理&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                        <a href="{!! url('task') !!}">项目列表</a>
                    </div>
                </div>

                <div class="content-right-tit clearfix">
                    <p><a href="{!! url('achieve') !!}" @if(!isset($status))class="at" @endif>所有</a></p>
                    <p><a href="{!! url('achieve',['status'=>0]) !!}" @if(isset($status) && $status == 0)class="at" @endif>已领取</a></p>
                    <p><a href="{!! url('achieve',['status'=>2]) !!}" @if(!empty($status) && $status == 2)class="at" @endif>待审核</a></p>
                    <p><a href="{!! url('achieve',['status'=>1]) !!}" @if(!empty($status) && $status == 1) class="at" @endif>已审核</a></p>
                    <p><a href="{!! url('achieve',['status'=>3]) !!}" @if(!empty($status) && $status == 3) class="at" @endif>已驳回</a></p>
                    <p><a href="{!! url('achieve',['status'=>4]) !!}" @if(!empty($status) && $status == 4) class="at" @endif>已完成</a></p>
                    <a href="{!! config('app.admin_url') !!}/achieve/export" class="buttonA">数据导出</a>
                </div>
                <div class="comment-search clearfix">
                    <form action="{!! url('achieve') !!}" id="filterForm" method="GET">
                        <div class="comment-search-inner">
                            <div class="comment-search-goods">
                                <p>投资者<input type="text" name="realname" value="{!! Input::get('realname') !!}" /></p>
                            </div>
                            <div class="comment-search-person">
                                <p>投资手机号<input type="text" name="mobile" value="{!! Input::get('mobile') !!}" /></p>
                            </div>
                            <button class="comment-search-btn" id="search">搜索</button>
                            <input type="reset" value="重置" onclick="location='/achieve'">
                        </div>
                    </form>
                </div>
                    <table class="all_shopping" cellspacing="0">
                        <tr>
                            <th width='100'>平台名称</th>
                            <th width='280'>任务名称</th>
                            <th width="100">投资人</th>
                            <th width="100">投资金额</th>
                            @if(!isset($status))
                            <th width="100">状态</th>
                            @endif
                            <th>操作</th>
                        </tr>
                        @if(!empty($lists))
                        @foreach($lists as $rv)
                            <tr>
                                <td>{!! $rv->corp->name!!}}</td>
                                <td>{!! $rv->task->title or '' !!}</td>
                                <td>{!! $rv->user->username or '' !!}</td>
                                <td>{!! $rv->total or 0 !!}元</td>
                                @if(!isset($status))
                                <td>
                                    @if($rv->status == 0) 已领取 @endif
                                    @if($rv->status == 2) 待审核 @endif
                                    @if($rv->status == 1) 已审核 @endif
                                    @if($rv->status == 3) 已驳回 @endif
                                    @if($rv->status == 4) 已完成 @endif
                                </td>
                                @endif
                                <td>

                                </td>
                            </tr>
                        @endforeach
                        @endif
                    </table>
            </div>
        </div>
    </div>
@stop
