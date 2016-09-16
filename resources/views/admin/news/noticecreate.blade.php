@extends('admin.common.layout')
@section('title')发布公告@stop
@section('style')
    {!!HTML::style('admin/css/news.css')!!}
    {!!HTML::style('admin/css/dialog.css')!!}
    {!!HTML::style('admin/css/form.css')!!}
@stop
@section('content')
    <div class="content-all">
        <div class="content clearfix">
            @include('admin.common.sidebar')
            <div class="content-right ">
                <div class="content-right-header clearfix">
                    <img src="{!!url('admin/images/u5.png')!!}"/>
                    <a href="{!! url('/news') !!}">文章管理&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                    <a href="{!! url('/news/notice') !!}">公告/事件</a>
                </div>
                <div class="content-right-page">
                    <form method="POST" class="base_form">
                        @if(!empty($new))
                            <input type="hidden" name="data[id]" value="{!! $new->id !!}">
                        @endif
                        {!! csrf_field() !!}
                        <table class="case_specific" cellspacing="0">
                            <tr>
                                <td width="200"><span>*</span>公告标题：</td>
                                <td width="728"><input name="data[title]" class="case_input" type="text" value="{!! $new->title or '' !!}"></td>
                            </tr>
                            <tr>
                                <td><span>*</span>所属分类：</td>
                                <td width="728">
                                    <select class="case_select" name="data[category_id]">
                                        @foreach($categorys as $cat)<option value="{!! $cat->id !!}" @if(isset($new->category_id) && $new->category_id==$cat->id)selected @endif>{!! $cat->title !!}</option>@endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr class="case_compile">
                                <td><span>*</span>公告内容：</td>
                                <td>
                                    <div class="case_compile_content">
                                        <script name="data[content]" id="content" type="text/plain" style="height:360px;width:500px;">
                                            {!! $new->article->content or '' !!}
                                        </script>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div class="requirement_btm">
                            <button class="submit" type="submit">提交</button>
                            <a href="{!! url('/news/help') !!}">返回列表</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <span id="queueID"></span>
    {!!HTML::script('vendor/validate/jquery.validate.js')!!}
    {!! HTML::script('vendor/ueditor/ueditor.topic.config.js') !!}
    {!! HTML::script('vendor/ueditor/ueditor.all.min.js') !!}
    <script>
        var ue = UE.getEditor("content");
        ue.ready(function() {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
        });
    </script>
@stop