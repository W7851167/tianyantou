@extends('admin.common.layout')
@section('title') 创建公司信息 @stop
@section('style')
    {!!HTML::style('admin/css/dialog.css')!!}
    {!!HTML::style('admin/css/form.css')!!}
    {!!HTML::style('vendor/datepicker/skin/WdatePicker.css')!!}
    {!!HTML::script('vendor/datepicker/WdatePicker.js')!!}
@stop
@section('content')
    <div class="content-all">
        <div class="content clearfix">
            @include('admin.common.sidebar')
            <div class="content-right ">
                <div class="content-right-header clearfix">
                    <img src="{!!url('admin/images/u5.png')!!}"/>
                    <a href="{!! url('task') !!}">项目管理&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                    <a href="{!! url('corp') !!}">公司管理&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                    <a href="javascript:void(0);">创建团队</a>
                </div>
                <div class="content-right-tit clearfix">
                    <p><a href="{!! url('corp/manage',['id'=>$corp->id]) !!}">公司介绍</a></p>
                    <p><a href="{!! url('corp/term',['id'=>$corp->id]) !!}"  class="at">团队管理</a></p>
                    <p><a href="{!! url('corp/safety',['id'=>$corp->id]) !!}">安全保障</a></p>
                    <p><a href="{!! url('corp/photos',['id'=>$corp->id]) !!}">图片资料</a></p>
                    <p><a href="{!! url('corp/news',['id'=>$corp->id]) !!}">最新动态</a></p>
                    <a href="{!!url('corp/termcreate',['corp_id'=>$corp->id])!!}" class="buttonA">创建成员</a>
                </div>
                <form  method="post" class="base_form">
                    {!! csrf_field() !!}
                    @if(!empty($term))
                        <input type="hidden" name="data[id]" value="{!! $term->id !!}">
                    @endif
                    <div>
                        <div class="infospaceAddImg">
                            <div class="infospaceAddLeft h80"><span>*</span>头像：</div>
                            <div id="storeimg">
                                <a class="clickUpload" id="uploadimg" href="javascript:void(0)">点击上传</a>
                            </div>
                            <p class="hint">必须上传188*223的图片！</p>
                            <ul class="imgbox"  style="width: 188px;height: 223px;">
                                  @if(!empty($term->avatar->name))
                                    <img style="width: 188px;height: 223px;" src="{!! config('app.img_url') . $term->avatar->name !!}">
                                    <input type="hidden" name="data[avatar]" value="{!! $term->avatar->name !!}" />
                                  @endif
                            </ul>
                        </div>
                        <div class="infospaceAddContent clearfix">
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">姓名：</div>
                            <div><input type="text" name="data[name]" placeholder="XXX" value="{!! $term->name or '' !!}"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">职称：</div>
                            <div><input type="text" name="data[position]" placeholder="CEO" value="{!! $term->position or '' !!}"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">简介：</div>
                            <div><textarea class="addText" name="data[intro]">{!! $term->intro or '' !!}</textarea></div>
                        </div>
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
            'formData' :{'width0':188,'height0':223, 'type0':1,'path': 'logo'},
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
                    var html = '<img style="width:188px;" src="' + data.info[188223] + '">';
                    html += '<input type="hidden" name="data[avatar]" value="' + data.info[188223] + '" />'
                    $('.imgbox').html(html);
                }
            },

        });
    </script>
@stop
