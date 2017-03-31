@extends('admin.common.layout')
@section('title') 图片资料 @stop
@section('style')
    {!!HTML::style('admin/css/dialog.css')!!}
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
                    <p><a href="{!! url('corp/charts',['id'=>$corp->id]) !!}" >雷达图</a></p>
                    <p><a href="{!! url('corp/honour',['id'=>$corp->id]) !!}">企业荣誉</a></p>
                </div>
                <form  method="post" class="base_form">
                    {!! csrf_field() !!}
                    @if(!empty($corp))
                        <input type="hidden" name="data[id]" value="{!! $corp->id !!}">
                    @endif
                    <div class="infospaceAddImg">
                        <div class="infospaceAddLeft h80"><span>*</span>平台证件：</div>
                        <div id="storeimg">
                            <a class="clickUpload" id="uploadCredentials" href="javascript:void(0)">点击上传</a>
                        </div>
                        <p class="hint">上传后生成206*154的缩略图！</p>
                        <ul class="imgbox" id="uploadCredentialsShow" style="width: 650px;height: 350px;">
                            @if(!empty($metas['credentials']))
                                @foreach($metas['credentials'] as $credential)
                                <img style="width: 206px;height: 154px;" src="{!! $credential !!}">
                                <input type="hidden" name="data[credentials][]" value="{!! $credential or '' !!}" />
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="infospaceAddContent clearfix">
                    </div>
                    <div class="infospaceAddContent clearfix">
                    </div>
                    <div class="infospaceAddImg">
                        <div class="infospaceAddLeft h80"><span>*</span>办公环境：</div>
                        <div id="storeimg">
                            <a class="clickUpload" id="uploadOfficeAddress" href="javascript:void(0)">点击上传</a>
                        </div>
                        <p class="hint">上传后生成206*154的缩略图！</p>
                        <ul class="imgbox" id="officeAddress" style="width: 650px;height: 350px;">
                            @if(!empty($metas['office_address']))
                                @foreach($metas['office_address'] as $officeAddress)
                                    <img style="width: 206px;height: 154px;" src="{!! $officeAddress !!}">
                                    <input type="hidden" name="data[office_address][]" value="{!! $officeAddress or '' !!}" />
                                @endforeach
                              @endif
                        </ul>
                    </div>
                    <div class="w928">
                        <div class="button">
                            <input class="submit" type="submit"  value="保存">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
@section('script')
    <span id="queueID"></span>
    {!! HTML::script('/vendor/uploadify/jquery.uploadify.js') !!}
    {!!HTML::script('vendor/validate/jquery.validate.js')!!}
    <script type="text/javascript">
        $('#uploadCredentials').uploadify({
            'onInit': function () {$("#queueID").hide();},
            'swf'      : '/vendor/uploadify/uploadify.swf',
            'uploader' : '/uploadImg',
            'formData' :{'width0':206,'height0':154, 'type0':1},
            'buttonText':'',
            'width':'82',
            //'buttonImage' : '/vendor/uploadify/btn_up_pressed.png',
            'button_image_url' : '/vendor/uploadify/btn_up_normal.png',
            'multi': true,
            'button_height':36,
            'button_width':88,
            'fileTypeExts' : '*.jpg; *.jpeg; *.png',
            'fileSizeLimit' : '2MB',
            'queueID': 'queueID',
            'onUploadSuccess' : function(file,data) {
                data = eval('('+data+')');
                if (data.status == 1) {
                    var html = '<img style="width:206px;" src="' + data.info[206154] + '">';
                    html += '<input type="hidden" name="data[credentials][]" value="' + data.info[206154] + '" />'
                    $('#uploadCredentialsShow').append(html);
                }
            },

        });

        $('#uploadOfficeAddress').uploadify({
            'onInit': function () {$("#queueID").hide();},
            'swf'      : '/vendor/uploadify/uploadify.swf',
            'uploader' : '/uploadImg',
            'formData' :{'width0':206,'height0':154, 'type0':1},
            'buttonText':'',
            'width':'82',
            //'buttonImage' : '/vendor/uploadify/btn_up_pressed.png',
            'button_image_url' : '/vendor/uploadify/btn_up_normal.png',
            'multi': true,
            'button_height':36,
            'button_width':88,
            'fileTypeExts' : '*.jpg; *.jpeg; *.png',
            'fileSizeLimit' : '2MB',
            'queueID': 'queueID',
            'onUploadSuccess' : function(file,data) {
                data = eval('('+data+')');
                if (data.status == 1) {
                    var html = '<img style="width:206px;" src="' + data.info[206154] + '">';
                    html += '<input type="hidden" name="data[office_address][]" value="' + data.info[206154] + '" />'
                    $('#officeAddress').append(html);
                }
            },

        });
    </script>
@stop
