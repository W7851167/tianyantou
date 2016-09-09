@extends('admin.common.layout')
@section('title') 公司信息 @stop
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
                        <a href="{!! url('task') !!}">公司列表</a>
                    </div>
                </div>

                <div class="content-right-tit clearfix">
                    <p><a href="javascript:void(0)" class="at">公司列表</a></p>
                    <p><a href="javascript:void(0)"></a></p>
                    <a href="{!!url('corp/create')!!}" class="buttonA">创建公司</a>
                </div>
                    <table class="all_shopping" cellspacing="0">
                        <tr>
                            <th width='120'>LOGO</th>
                            <th width="150">平台名称</th>
                            <th width="150">公司名称</th>
                            <th width="250">地址</th>
                            <th width="60">项目数</th>
                            <th width="60">状态</th>
                            <th>操作</th>
                        </tr>
                           @if(!empty($lists))
                               @foreach($lists as $cv)
                            <tr>
                                <td>
                                    <img src="{!! !empty($cv->logo) ? config('app.img_url') . $cv->logo : '/admin/images/user-small.png' !!}" style="width: 80px; margin-left: -20px; margin-top: 20px;">
                                </td>
                                <td>{!! $cv->platform !!}</td>
                                <td>{!! $cv->name !!}</td>
                                <td>{!! $cv->province !!}  {!! $cv->city !!}</td>
                                <td>{!! $cv->tasks->count() !!}</td>
                                <td>{!! $cv->status ? '正常' : '暂停'!!}</td>
                                <td>
                                    <a href="{!! url('corp/create',['id'=>$cv->id]) !!}">编辑</a>
                                    <a href="{!! url('corp/manage',['id'=>$cv->id]) !!}">管理</a>
                                </td>
                            </tr>
                            @endforeach
                           @endif
                    </table>
                <ul class="page_info page">
                    {!! $pageHtml !!}
                </ul>
            </div>
        </div>
    </div>
@stop
