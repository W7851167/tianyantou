@extends('admin.common.layout')
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
                    <a href="{!! url('/news/single') !!}">单文章管理&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                    <a href="javascript:void(0);">编辑</a>
                </div>
                <div class="content-right-page">
                    <form method="POST" class="base_form">
                        <input type="hidden" name="id" value="{!! $category->id !!}">
                        {!! csrf_field() !!}
                        <table class="case_specific" cellspacing="0">
                            <tr class="case_compile">
                                <td><span>*</span>内容：</td>
                                <td>
                                    <div class="case_compile_content">
                                        <textarea name="content" id="content">{!! $category->article->content or '' !!}</textarea>
                                        @if(!empty($errors->first('content')))<span style="color: red">{!! $errors->first('data.content') !!}</span>@endif
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div class="requirement_btm">
                            <button class="submit" type="submit">提交</button>
                            <a href="{!! url('/news/single') !!}">返回列表</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {!! HTML::script('vendor/ueditor/ueditor.topic.config.js') !!}
    {!! HTML::script('vendor/ueditor/ueditor.all.min.js') !!}
    <script>
        var ue = UE.getEditor("content");
        ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
        });
    </script>
@stop