@extends('admin.common.layout')
@section('title') 创建/编辑广告信息 @stop
@section('style')
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
                    <a href="{!! url('census') !!}">统计管理&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                    <a href="{!! url('ad/create') !!}">创建广告</a>
                </div>
                <form  method="post" class="base_form">
                    {!! csrf_field() !!}
                    @if(!empty($adv))
                        <input type="hidden" name="data[id]" value="{!! $adv->id !!}">
                    @endif
                    <div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>标题：</div>
                            <div><input type="text" name="data[title]" placeholder="广告标题" value="{!! $adv->platform or '' !!}"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>URL：</div>
                            <div><input type="text" name="data[url]" placeholder="跳转地址" value="{!! $adv->url or '' !!}"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>排序：</div>
                            <div><input type="text" name="data[sorts]" placeholder="数值大靠前" value="{!! $adv->sorts or '' !!}"></div>
                        </div>
                        <div class="infospaceAddImg">
                            <div class="infospaceAddLeft h80"><span>*</span>广告图片：</div>
                            <div id="storeimg">
                                <a class="clickUpload" id="uploadimg" href="javascript:void(0)">点击上传</a>
                            </div>
                            <p class="hint">必须上传1349*246的图片！</p>
                            <ul class="imgbox"  style="width: 674px;height: 123px;">
                                @if(!empty($adv->image->name))
                                    <img style="width: 674px;height: 123px;" src="{!! config('app.static_url').$adv->image->name !!}">
                                    <input type="hidden" name="data[img]" value="{!! $adv->image->name or '' !!}" />
                               @endif
                            </ul>
                        </div>
                        <!--移动端轮播-->
						<div class="infospaceAddImg">
                            <div class="infospaceAddLeft h80"><span>*</span>移动端图片：</div>
                            <div id="storeimg">
                                <a class="clickUpload" id="uploadMImg" href="javascript:void(0)">点击上传</a>
                            </div>
                            <p class="hint">必须上传674*176的图片！</p>
                            <ul class="imgbox m_img"  style="width: 674px;height: 176px;">
                                @if(!empty($adv->m_img))
                                    <img style="width: 674px;height: 176px;" src="{!! config('app.static_url').$adv->m_img !!}">
                                    <input type="hidden" name="data[m_img]" value="{!! $adv->m_img or '' !!}" />
                               @endif
                            </ul>
                        </div>
                        <!--移动端轮播-->
                    </div>
                    <div class="w928">
                        <div class="button">
                            <input class="submit" type="submit"  value="提交">
                            <input class="return" type="reset" value="返回列表">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!--添加相关推荐--->
    <!--选点-->
@stop

@section('script')
    <span id="queueID"></span>
    {!! HTML::script('/vendor/uploadify/jquery.uploadify.js') !!}
    {!!HTML::script('vendor/validate/jquery.validate.js')!!}
    <script type="text/javascript">
        $('#uploadimg').uploadify({
            'onInit': function () {$("#queueID").hide();},
            'swf'      : '/vendor/uploadify/uploadify.swf',
            'uploader' : '/uploadImg',
            'formData' :{'width0':1349,'height0':246, 'type0':1},
            'buttonText':'上传',
            'width':'82',
            'buttonImage' : '/vendor/uploadify/btn_up_pressed.png',
            'button_image_url' : '/vendor/uploadify/btn_up_normal.png',
            'multi': false,
            'button_height':36,
            'button_width':88,
            'fileTypeExts' : '*.jpg; *.jpeg; *.png',
            'fileSizeLimit' : '2MB',
            'queueID': 'queueID',
            'onUploadSuccess' : function(file,data) {
                data = eval('('+data+')');
                if (data.status == 1) {
                    var html = '<img style="width:674px;" src="' + data.info[1349246] + '">';
                    html += '<input type="hidden" name="data[img]" value="' + data.info[1349246] + '" />'
                    $('.imgbox').html(html);
                }
            },

        });
		//移动端图片
		$('#uploadMImg').uploadify({
            'onInit': function () {$("#queueID").hide();},
            'swf'      : '/vendor/uploadify/uploadify.swf',
            'uploader' : '/uploadImg',
            'formData' :{'width0':674,'height0':176, 'type0':1},
            'buttonText':'',
            'width':'82',
//            'buttonImage' : '/vendor/uploadify/btn_up_pressed.png',
            'button_image_url' : '/vendor/uploadify/btn_up_normal.png',
            'multi': false,
            'button_height':36,
            'button_width':88,
            'fileTypeExts' : '*.jpg; *.jpeg; *.png',
            'fileSizeLimit' : '2MB',
            'queueID': 'queueID',
            'onUploadSuccess' : function(file,data) {
                data = eval('('+data+')');
                if (data.status == 1) {
                    var html = '<img style="width:674px;123px;" src="' + data.info[674176] + '">';
                    html += '<input type="hidden" name="data[m_img]" value="' + data.info[674176] + '" />'
                    $('.m_img').html(html);
                }
            },

        });
    </script>
@stop
