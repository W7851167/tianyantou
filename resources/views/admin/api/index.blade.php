@extends('admin.common.layout')
@section('title')Api接口@stop
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
                        <a href="javascript">Api接口</a>
                    </div>
                </div>

                <div class="content-right-tit clearfix">
                    <p><a href="javascript:void(0)" class="at">Api接口列表</a></p>
                    <a href="{!!url('api/create')!!}" class="buttonA">创建接口</a>
                </div>
                    <table class="all_shopping" cellspacing="0">
                        <tr>
                            <th width="120">平台名称</th>
                            <th width="150">接口说明</th>
                            <th width="400">配置信息</th>
                            <th>操作</th>
                        </tr>
                        @foreach($lists  as $lv)
                            <tr>
                                <td>{!! $lv->corp->name or '' !!}</td>
                                <td>{!! $lv->intro or '' !!}</td>
                                <td>
                                   @if(!empty($lv->options))
                                       @foreach($lv->options as $key=>$value)
                                           <p>{!! $key or ''!!} : {!! $value or ''!!}</p>
                                       @endforeach
                                    @endif
                                </td>

                                <td>
                                    <a href="{!! url('api/create',['id'=>$lv->id]) !!}">编辑</a>
                                    <a href="{!! url('api/delete',['id'=>$lv->id]) !!}">删除</a>
                                    <a href="{!! url('api/result',['id'=>$lv->id]) !!}">接口数据</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                <ul class="page_info page">
                    {!! $pageHtml !!}
                </ul>
            </div>
        </div>
    </div>
@stop
