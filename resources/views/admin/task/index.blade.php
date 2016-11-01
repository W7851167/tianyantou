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
                    <p><a href="{!! url('task') !!}" @if(!isset($status))class="at" @endif>所有</a></p>
                    <p><a href="{!! url('task',['status'=>0]) !!}" @if(isset($status) && $status == 0)class="at" @endif>待发布</a></p>
                    <p><a href="{!! url('task',['status'=>1]) !!}" @if(!empty($status) && $status == 1)class="at" @endif>已发布</a></p>
                    <p><a href="{!! url('task',['status'=>2]) !!}" @if(!empty($status) && $status == 2) class="at" @endif>已结束</a></p>
                    <p><a href="{!! url('task/trashed')!!}">回收站</a></p>
                    <a href="{!!url('task/create')!!}" class="buttonA">创建项目</a>
                </div>
                <div class="comment-search clearfix">
                    <form action="{!! url('task') !!}" id="filterForm" method="GET">
                        <div class="comment-search-inner">
                            <div class="comment-search-goods">
                                <p>平台名称<input type="text" name="name" value="{!! Input::get('name') !!}" /></p>
                            </div>
                            <div class="comment-search-person">
                                <p>任务标题<input type="text" name="title" value="{!! Input::get('title') !!}" /></p>
                            </div>
                            <button class="comment-search-btn" id="search">搜索</button>
                            <input type="reset" value="重置" onclick="location='/task'">
                        </div>
                    </form>
                </div>
                <table class="all_shopping" cellspacing="0">
                        <tr>
                            <th width='100'>平台名称</th>
                            <th width="180">任务标题</th>
                            <th width="60">位置</th>
                            <th width="60">库存</th>
                            <th width="60">领取</th>
                            <th width="60">完成</th>
                            <th width="60">年收益</th>
                            <th width="65">赠收益</th>
                            <th width="65">期限</th>
                            @if(!isset($status))
                            <th width="65">状态</th>
                            @endif
                            <th width="65">限额</th>
                            <th>操作</th>
                        </tr>
                        @if(!empty($lists))
                        @foreach($lists as $tv)
                            <tr>
                                <td>{!! $tv->corp->name or '' !!}</td>
                                <td>{!! str_limit($tv->title,20) !!}</td>
                                <td>{!! $tv->position == 1 ? '首页':'其它' !!}</td>
                                <td>{!! $tv->nums or 0!!}</td>
                                <td>{!! $tv->receives->where('status',0)->count() !!}</td>
                                <td>{!! $tv->receives->where('status',1)->count() !!}</td>
                                <td>{!! $tv->ratio or 0!!}</td>
                                <td>{!! $tv->mratio or 0!!}</td>
                                <td>{!! $tv->term or 0!!}{!! $tv->term_unit == 0 ? '天' : ($tv->term_unit == 1 ? '个月' : '年')!!}</td>
                                @if(!isset($status))
                                <td>{!! $tv->status == 0 ? '待发布':($tv->status == 1 ? '已发布' : '已结束')!!}</td>
                                @endif
                                <td>{!! $tv->limit or 0!!}</td>
                                <td>
                                    <a href="{!! url('task/create',['id'=>$tv->id]) !!}">编辑</a>
                                    @if(isset($status) && ($status == 0 || $status == 2))
                                        <a href="{!! url('task/delete',['id'=>$tv->id]) !!}">删除</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        @endif
                    </table>
                <ul class="page_info page">
                    {!! $pageHtml or '' !!}
                </ul>
            </div>
        </div>
    </div>
@stop
