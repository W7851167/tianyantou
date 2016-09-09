@extends('admin.common.layout')
@section('title') 最新动态 @stop
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
                        <a href="{!! url('corp') !!}">公司管理&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                        <a href="javascript:void(0);">{!! $corp->name or '管理' !!}</a>
                    </div>
                </div>

                <div class="content-right-tit clearfix">
                    <p><a href="{!! url('corp/manage',['id'=>$corp->id]) !!}">公司介绍</a></p>
                    <p><a href="{!! url('corp/term',['id'=>$corp->id]) !!}">团队管理</a></p>
                    <p><a href="{!! url('corp/safety',['id'=>$corp->id]) !!}">安全保障</a></p>
                    <p><a href="{!! url('corp/photos',['id'=>$corp->id]) !!}">图片资料</a></p>
                    <p><a href="{!! url('corp/news',['id'=>$corp->id]) !!}"  class="at">最新动态</a></p>
                    <a href="{!!url('corp/newscreate')!!}" class="buttonA">创建动态</a>
                </div>
                <table class="all_shopping" cellspacing="0">
                    <tr>
                        <th>动态主图</th>
                        <th>标题</th>
                        <th>操作</th>
                    </tr>
                            <tr>
                                <td width="200px;" height="150">
                                    <img src="{!!  '/admin/images/user-small.png' !!}" style="width: 80px; margin-left: -20px; margin-top: 20px;">
                                </td>
                                <td width="500px;">第五届中国财经峰会汇投网获“2016互联网金融典范企业”奖</td>
                                <td style="width:150px; padding-left: 30px;">
                                    <a href="{!! url('corp/create',['id'=>1]) !!}">编辑</a>
                                    <a href="{!! url('corp/manage',['id'=>1]) !!}">删除</a>
                                    <a href="{!! config('app.url') .'/about/news/1.html' !!}" target="_blank">查看</a>
                                </td>
                            </tr>
                </table>
            </div>
        </div>
    </div>
@stop
@section('script')
    {!! HTML::script('vendor/ueditor/ueditor.topic.config.js') !!}
    {!! HTML::script('vendor/ueditor/ueditor.all.min.js') !!}
    <script language="javascript">
        $(function(){
            var editor = UE.getEditor('content');
            editor.ready(function() {
                editor.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
            });
        });
    </script>
@stop
