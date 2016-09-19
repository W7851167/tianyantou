@extends('admin.common.layout')
@section('title') 创建公司信息 @stop
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
                    <a href="{!! url('task') !!}">项目管理&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                    <a href="{!! url('corp') !!}">公司管理&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                    <a href="javascript:void(0);">{!! $corp->name or '管理' !!}最新动态</a>
                </div>
                <div class="content-right-tit clearfix">
                    <p><a href="{!! url('corp/manage',['id'=>$corpId]) !!}">公司介绍</a></p>
                    <p><a href="{!! url('corp/term',['id'=>$corpId]) !!}">团队管理</a></p>
                    <p><a href="{!! url('corp/safety',['id'=>$corpId]) !!}">安全保障</a></p>
                    <p><a href="{!! url('corp/photos',['id'=>$corpId]) !!}">图片资料</a></p>
                    <p><a href="{!! url('corp/news',['id'=>$corpId]) !!}"  class="at">最新动态</a></p>
                    <p><a href="{!! url('corp/honour',['id'=>$corp->id]) !!}">企业荣誉</a></p>
                    <a href="{!!url('corp/dynamic',['corp_id'=>$corpId])!!}" class="buttonA">创建动态</a>
                </div>
                <form  method="post" class="base_form">
                    {!! csrf_field() !!}
                    @if(!empty($corpId))
                        <input type="hidden" name="data[corp_id]" value="{!! $corpId !!}">
                    @endif
                    <input type="hidden" name="data[category_id]" value="13">
                    @if(!empty($new->id))
                        <input type="hidden" name="data[id]" value="{!! $new->id !!}">
                    @endif
                    <div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>标题：</div>
                            <div><input type="text" name="data[title]" placeholder="动态标题" value="{!! $new->title or '' !!}"></div>
                        </div>
                        <div class="infospaceAddImg">
                            <div class="infospaceAddLeft h80"><span>*</span>主图：</div>
                            <div id="storeimg">
                                <a class="clickUpload" id="uploadimg" href="javascript:void(0)">点击上传</a>
                            </div>
                            <p class="hint">必须上传184*125的图片！</p>
                            <ul class="imgbox"  style="width: 184px;height: 125px;">
                                @if(!empty($new->image->name))
                                    <img style="width: 195px;height: 60px;" src="{!! config('app.static_url').$new->image->name !!}">
                                    <input type="hidden" name="data[logo]" value="{!! $new->image->name or '' !!}" />
                               @endif
                            </ul>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">描述：</div>
                            <div><textarea name="data[description]" class="addText">{!! $new->description or '' !!} </textarea></div>
                        </div>
                        <div>
                            <div class="infospaceAddContent clearfix">
                                <div>
                                    <script name="data[content]" id="content" type="text/plain" style="height:360px;width:500px;margin-left:30px;">
                                        {!! $new->article->content or '' !!}
                                    </script>
                                </div>
                            </div>
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
    {!! HTML::script('vendor/ueditor/ueditor.topic.config.js') !!}
    {!! HTML::script('vendor/ueditor/ueditor.all.min.js') !!}
    <script type="text/javascript">
        $('#uploadimg').uploadify({
            'onInit': function () {$("#queueID").hide();},
            'swf'      : '/vendor/uploadify/uploadify.swf',
            'uploader' : '/uploadImg',
            'formData' :{'width0':184,'height0':125, 'type0':1},
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
                    var html = '<img style="width:184px;" src="' + data.info[184125] + '">';
                    html += '<input type="hidden" name="data[logo]" value="' + data.info[184125] + '" />'
                    $('.imgbox').html(html);
                }
            }
        });

        $('#uploadLogo').uploadify({
            'onInit': function () {$("#queueID").hide();},
            'swf'      : '/vendor/uploadify/uploadify.swf',
            'uploader' : '/uploadImg',
            'formData' :{'width0':195,'height0':60, 'type0':1,'path': 'logo'},
            'buttonText':'',
            'width':'82',
            //'buttonImage' : '/vendor/uploadify/btn_up_pressed.png',
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
                    var html = '<img style="width:195px;height:60px;" src="' + data.info[19560] + '">';
                    html += '<input type="hidden" name="data[platform_logo]" value="' + data.info[19560] + '" />'
                    $('#platformLogoShow').append(html);
                }
            }
        });
        $(function(){
            var editor = UE.getEditor('content');
            editor.ready(function() {
                editor.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
            });
        });
    </script>
@stop
