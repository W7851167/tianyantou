@extends('admin.common.layout')
@section('style')
    {!!HTML::style('admin/css/news.css')!!}
    @include('UEditor::head')
@stop
@section('content')
    <div class="content-all">
        <div class="content clearfix">
            @include('admin.common.sidebar')
            <div class="content-right ">
                <div class="content-right-header clearfix">
                    <img src="{!!url('admin/images/u5.png')!!}"/>
                    <a href="{!! url('/news') !!}">文章管理&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                    <a href="{!! url('/dashboard') !!}">首页</a>
                </div>
                <div class="content-right-page">
                    <form action="{!! url('/news/create') !!}" method="POST" id="project_form">
                        <table class="case_specific" cellspacing="0">
                            <tr>
                                <td width="200"><span>*</span>文章标题：</td>
                                <td width="728"><input name="title" class="case_input" type="text"></td>
                                @if(!empty($errors->first('title')))<span style="color: red">{!! $errors->first('data.title') !!}</span>@endif
                            </tr>
                            <tr>
                                <td><span>*</span>文章分类：</td>
                                <td width="728">
                                    <select class="case_select" name="category_id">
                                        @foreach($categorys as $cat)<option value="{!! $cat->id !!}">{!! $cat->title !!}</option>@endforeach
                                    </select>
                                    @if(!empty($errors->first('category_id')))<span style="color: red">{!! $errors->first('category_id') !!}</span>@endif
                                </td>
                            </tr>
                            <tr>
                                <td><span>*</span>选择公司：</td>
                                <td width="728">
                                    <select class="case_select" name="crop_id">
                                        @foreach($corps as $cv)<option value="{!! $cv->id !!}">{!! $cv->name !!}</option>@endforeach
                                    </select>
                                    @if(!empty($errors->first('crop_id')))<span style="color: red">{!! $errors->first('crop_id') !!}</span>@endif
                                </td>
                            </tr>
                            <tr>
                                <td width="200"><span>*</span>文章描述：</td>
                                <td width="728"><input name="description" class="case_input" type="text"></td>
                                @if(!empty($errors->first('description')))<span style="color: red">{!! $errors->first('data.title') !!}</span>@endif
                            </tr>
                            <tr class="case_compile">
                                <td><span>*</span>文章内容：</td>
                                <td>
                                    <div class="case_compile_content">
                                        <textarea name="content" id="content"></textarea>
                                        @if(!empty($errors->first('content')))<span style="color: red">{!! $errors->first('data.content') !!}</span>@endif
                                    </div>
                                </td>
                            </tr>
                            <tr class="case_compile">
                                <td><span>*</span>文章Logo：</td>
                                <td width="728">
                                    <div>
                                        <input id="inputClick" class="upload" type="file" placeholder="">
                                    </div>
                                    <div class="container-img">
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div class="requirement_btm">
                            <button type="submit">提交</button>
                            <a href="{!! url('/design/case/index') !!}">返回列表</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="/vendor/jquery/1.11.1/jquery.min.js"></script>
    <script>
        var ue = UE.getEditor("content");
        ue.ready(function() {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
        });
    </script>
@stop