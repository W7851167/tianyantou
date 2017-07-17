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
                        <a href="{!! url('task') !!}">项目管理&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                        <a href="{!! url('task') !!}">红包列表</a>
                    </div>
                </div>

                <div class="content-right-tit clearfix">
                    <p><a href="javascript:void(0)" class="at">红包列表</a></p>
                    <p><a href="javascript:void(0)"></a></p>
                    <a href="{!!url('corp/create')!!}" class="buttonA">创建红包</a>
                </div>
                <table class="all_shopping" cellspacing="0">
                    <tr>
                        <th width='120'>红包ID</th>
                        <th width="200">平台名称</th>
                        <th width="80">红包金额</th>
                        <th width="80">是否私人</th>
                        <th width="80">领取状态</th>
                        <th width="80">领取时间</th>
                        <th width="80">结束时间</th>
                        <th>操作</th>
                    </tr>

                </table>
                <ul class="page_info page">

                </ul>
            </div>
        </div>
    </div>
@stop
