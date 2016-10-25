@extends('admin.common.layout')
@section('title')发布文章@stop
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
                    <a href="{!! url('/news') !!}">列表文章</a>
                </div>
                <div class="content-right-page">
                    <form method="POST" class="base_form">
                        @if(!empty($new))
                            <input type="hidden" name="id" value="{!! $new->id !!}">
                        @endif
                        {!! csrf_field() !!}
                        <table class="case_specific" cellspacing="0">
                            <tr>
                                <td width="200"><span>*</span>文章标题：</td>
                                <td width="728"><input name="title" class="case_input" type="text" value="{!! $new->title or '' !!}"></td>
                            </tr>
                            <tr>
                                <td><span>*</span>文章分类：</td>
                                <td width="728">
                                    <select class="case_select" name="category_id">
                                        @foreach($categorys as $cat)<option value="{!! $cat->id !!}" @if(isset($new->category_id) && $new->category_id==$cat->id)selected @endif>{!! $cat->title !!}</option>@endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><span>*</span>选择公司：</td>
                                <td width="728">
                                    <select class="case_select" name="corp_id">
                                        <option value="0">请选择</option>
                                        @foreach($corps as $cv)<option value="{!! $cv->id !!}" @if(isset($new->category_id) && $new->corp_id==$cv->id)selected @endif>{!! $cv->name !!}</option>@endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="200"><span>*</span>文章描述：</td>
                                <td width="728"><textarea name="description" class="addText" style="width: 600px;height:100px;font-size:14px;">{!! $new->description or '' !!}</textarea></td>
                            </tr>
                            <tr class="case_compile">
                                <td><span>*</span>文章内容：</td>
                                <td>
                                    <div class="case_compile_content">
                                        <script name="new_content" id="content" type="text/plain" style="width:500px;">
                                            {!! $new->article->content or '' !!}
                                        </script>
                                    </div>
                                </td>
                            </tr>
                            <tr class="case_compile">
                                <td><span>*</span>文章Logo：</td>
                                <td width="728">
                                    <div>
                                        <input id="uploadLogo" class="upload" type="file" placeholder="">
                                    </div>
                                    <div class="container-img">
                                        @if(isset($new->image->name))
                                            <div class="imgbox">
                                                <img src="{!! config('app.static_url').$new->image->name !!}">
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div class="requirement_btm">
                            <button class="submit" type="submit">提交</button>
                            <a href="{!! url('/news/multi') !!}">返回列表</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <span id="queueID"></span>
    {!! HTML::script('/vendor/uploadify/jquery.uploadify.js') !!}
    {!!HTML::script('vendor/validate/jquery.validate.js')!!}
    {!! HTML::script('vendor/ueditor/ueditor.topic.config.js') !!}
    {!! HTML::script('vendor/ueditor/ueditor.all.min.js') !!}
    <script>
        var ue = UE.getEditor("content");
        ue.ready(function() {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
        });
    </script>
    <script>
        $('#uploadLogo').uploadify({
            'onInit': function () {$("#queueID").hide();},
            'swf'      : '/vendor/uploadify/uploadify.swf',
            'uploader' : '/uploadImg',
            'formData' :{'width0':242,'height0':82, 'type0':1,'path': 'logo'},
            'buttonText':'',
            'width':'82',
            'button_image_url' : '/vendor/uploadify/btn_up_normal.png',
            'multi': false,
            'button_height':32,
            'button_width':86,
            'fileTypeExts' : '*.jpg; *.jpeg; *.png',
            'fileSizeLimit' : '2MB',
            'queueID': 'queueID',
            'onUploadSuccess' : function(file,data) {
                data = eval('('+data+')');
                if (data.status == 1) {
                    var html = '<img style="width:242px;height:82px;" src="' + data.info[24282] + '">';
                    html += '<input type="hidden" name="brandlogo" value="' + data.info[24282] + '" />'
                    $('.container-img').html(html);
                }
            },

        });
    </script>
@stop