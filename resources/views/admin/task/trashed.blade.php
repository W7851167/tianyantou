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
                    <p><a href="{!! url('task') !!}" >所有</a></p>
                    <p><a href="{!! url('task',['status'=>0]) !!}" >待发布</a></p>
                    <p><a href="{!! url('task',['status'=>1]) !!}" >已发布</a></p>
                    <p><a href="{!! url('task',['status'=>2]) !!}">已结束</a></p>
                    <p><a href="{!! url('task/trashed')!!}" class="at">回收站</a></p>
                </div>
                    <table class="all_shopping" cellspacing="0">
                        <tr>
                            <th width='120'>公司信息</th>
                            <th width="220">标题</th>
                            <th width="65">标总额</th>
                            <th width="80">年收益率</th>
                            <th width="65">赠收益率</th>
                            <th width="65">期限</th>
                            <th width="65">起诉金额</th>
                            <th width="65">限额</th>
                            <th>操作</th>
                        </tr>
                        @if(!empty($lists))
                        @foreach($lists as $tv)
                            <tr>
                                <td>{!! $tv->corp->name or '' !!}</td>
                                <td>{!! $tv->title or '' !!}</td>
                                <td>{!! $tv->total or 0 !!}</td>
                                <td>{!! $tv->ratio or 0!!}</td>
                                <td>{!! $tv->mratio or 0!!}</td>
                                <td>{!! $tv->term or 0!!}</td>
                                <td>{!! $tv->sued or 0!!}</td>
                                <td>{!! $tv->limit or 0!!}</td>
                                <td>
                                    <a href="{!! url('task/untrashed',['id'=>$tv->id]) !!}">还原</a>
                                </td>
                            </tr>
                        @endforeach
                        @endif
                    </table>
            </div>
        </div>
    </div>
@stop
