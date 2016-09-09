@extends('admin.common.layout')
@section('title') 团队管理 @stop
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
                    <p><a href="{!! url('corp/term',['id'=>$corp->id]) !!}"  class="at">团队管理</a></p>
                    <p><a href="{!! url('corp/safety',['id'=>$corp->id]) !!}">安全保障</a></p>
                    <p><a href="{!! url('corp/photos',['id'=>$corp->id]) !!}">图片资料</a></p>
                    <p><a href="{!! url('corp/news',['id'=>$corp->id]) !!}">最新动态</a></p>
                    <a href="{!!url('corp/termcreate')!!}" class="buttonA">创建成员</a>
                </div>
                <table class="all_shopping" cellspacing="0">
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                            <tr>
                                <td width="200px;">
                                    <img src="{!!  '/admin/images/user-small.png' !!}" style="width: 80px; margin-left: -20px; margin-top: 20px;">
                                </td>
                                <td width="80px;">CTO</td>
                                <td width="80px;">彭志壮</td>
                                <td style="width:300px;">毕业于北京大学，理学学士。先后在北大方正集团，中国互动媒体集团、中信国检信息技术有限公司、迈奇通科技（北京）有限公司等多家公司...</td>
                                <td style="width:150px; padding-left: 30px;">
                                    <a href="{!! url('corp/create',['id'=>1]) !!}">编辑</a>
                                    <a href="{!! url('corp/manage',['id'=>1]) !!}">删除</a>
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
