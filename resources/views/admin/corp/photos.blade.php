@extends('admin.common.layout')
@section('title') 图片资料 @stop
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
                    <p><a href="{!! url('corp/photos',['id'=>$corp->id]) !!}"   class="at">图片资料</a></p>
                    <p><a href="{!! url('corp/news',['id'=>$corp->id]) !!}">最新动态</a></p>
                </div>
                <form  method="post" class="base_form">
                    {!! csrf_field() !!}
                    @if(!empty($corp))
                        <input type="hidden" name="data[id]" value="{!! $corp->id !!}">
                    @endif
                    <div class="infospaceAddImg">
                        <div class="infospaceAddLeft h80"><span>*</span>平台证件：</div>
                        <div id="storeimg">
                            <a class="clickUpload" id="uploadLogo" href="javascript:void(0)">点击上传</a>
                        </div>
                        <p class="hint">上传后生成206*154的缩略图，最多上传10张！</p>
                        <ul class="imgbox" id="platformLogoShow" style="width: 206px;height: 154px;">
                            @if(!empty($corp->platform_logo))
                                <img style="width: 206px;height: 154px;" src="{!! config('app.img_url').$corp->platform_logo !!}">
                                <input type="hidden" name="data[logo]" value="{!! $corp->platform_logo or '' !!}" />
                            @endif
                        </ul>
                    </div>
                    <div class="infospaceAddImg">
                        <div class="infospaceAddLeft h80"><span>*</span>平台LOGO：</div>
                        <div id="storeimg">
                            <a class="clickUpload" id="uploadLogo" href="javascript:void(0)">点击上传</a>
                        </div>
                        <p class="hint">上传后生成206*154的缩略图，最多上传10张！</p>
                        <ul class="imgbox" id="platformLogoShow" style="width: 206px;height: 154px;">
                            @if(!empty($corp->platform_logo))
                                <img style="width: 206px;height: 154px;" src="{!! config('app.img_url').$corp->platform_logo !!}">
                                <input type="hidden" name="data[logo]" value="{!! $corp->platform_logo or '' !!}" />
                            @endif
                        </ul>
                    </div>
                </form>
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
