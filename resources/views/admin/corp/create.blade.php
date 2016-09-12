@extends('admin.common.layout')
@section('title') 创建公司信息 @stop
@section('style')
    {!!HTML::style('admin/css/dialog.css')!!}
    {!!HTML::style('admin/css/form.css')!!}
    {!!HTML::script('vendor/area/area.js')!!}
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
                    <a href="{!! url('corp/create') !!}">创建公司</a>
                </div>
                <form  method="post" class="base_form">
                    {!! csrf_field() !!}
                    @if(!empty($corp))
                        <input type="hidden" name="data[id]" value="{!! $corp->id !!}">
                    @endif
                    <div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>平台名称：</div>
                            <div><input type="text" name="data[platform]" placeholder="公司简称" value="{!! $corp->platform or '' !!}"></div>
                        </div>
                        <div class="infospaceAddImg">
                            <div class="infospaceAddLeft h80"><span>*</span>平台LOGO：</div>
                            <div id="storeimg">
                                <a class="clickUpload" id="uploadLogo" href="javascript:void(0)">点击上传</a>
                            </div>
                            <p class="hint">必须上传195*60的图片！</p>
                            <ul class="imgbox" id="platformLogoShow" style="width: 195px;height: 60px;">
                                @if(!empty($corp->platform_logo))
                                    <img style="width: 195px;height: 60px;" src="{!! config('app.static_url').$corp->platform_logo !!}">
                                    <input type="hidden" name="data[logo]" value="{!! $corp->platform_logo or '' !!}" />
                               @endif
                            </ul>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>公司名称：</div>
                            <div><input type="text" name="data[name]" placeholder="公司全名" value="{!! $corp->name or '' !!}"></div>
                        </div>
                        <div class="infospaceAddImg clearfix">
                            <div class="infospaceAddLeft h80"><span>*</span>公司LOGO：</div>
                            <div>
                                <a class="clickUpload" id="uploadimg" href="javascript:void(0)">点击上传</a>
                            </div>
                            <p class="hint">必须上传180*180px生成的图片！</p>
                            <ul class="imgbox" id="logoShow" style="width: 180px;height: 180px;">
                                @if(!empty($corp->logo))
                                    <img style="width:180px;" src="{!! config('app.static_url').$corp->logo !!}">
                                    <input type="hidden" name="data[logo]" value="{!! $corp->logo or '' !!}" />
                                @endif
                            </ul>
                        </div>
                        <div class="infospaceAddContent clearfix">
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>注册金额：</div>
                            <div><input type="text" name="data[capital]" placeholder="2000万元" value="{!! $corp->capital or '' !!}"></div>
                        </div>
                        <div class="infospaceAddImg clearfix">
                            <div class="infospaceAddLeft h80"><span>*</span>广告图：</div>
                            <div>
                                <a class="clickUpload" id="adLogoId" href="javascript:void(0)">点击上传</a>
                            </div>
                            <p class="hint">必须上传294*129px生成的图片！</p>
                            <ul class="imgbox" id="adLogoShow" style="width: 294px;height: 129px;">
                                @if(!empty($corp->ad_logo))
                                    <img style="width:294px;" src="{!! config('app.static_url').$corp->ad_logo !!}">
                                    <input type="hidden" name="data[logo]" value="{!! $corp->ad_logo or '' !!}" />
                                @endif
                            </ul>
                        </div>
                        <div class="infospaceAddContent clearfix">
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>注册金额：</div>
                            <div><input type="text" name="data[capital]" placeholder="2000万元" value="{!! $corp->capital or '' !!}"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft h80"><span>*</span>公司地址：</div>
                            <div>
                                <p>
                                    <select name="data[province]" class="province" id="province">
                                        <option>省</option>
                                    </select>
                                    <select name="data[city]" class="city" id="city" >
                                        <option value="">市</option>
                                    </select>
                                    <select name="data[county]" class="county" id="county">
                                        <option>区</option>
                                    </select>
                                </p>
                                <p>
                                    <input  type="text" name="data[address]" placeholder="请输入详细地址" value="{!! $corp->address or '' !!}">
                                </p>
                            </div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>法人代表：</div>
                            <div><input type="text" name="data[username]" placeholder="真实姓名" value="{!! $corp->username or '' !!}"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>上线时间：</div>
                            <div><input class="Wdate" type="text" name="data[online]" placeholder="2016-09-09" value="{!! $corp->online or '' !!}" onfocus="WdatePicker({dateFmt: 'yyyy-M-d'})"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>每个任务完成数限定：</div>
                            <div><input type="text" name="data[limit]" placeholder="任务完成数限定" value="{!! $corp->limit or 1 !!}"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">担保方式：</div>
                            <div><input type="text" name="data[pattern]" placeholder="风险准备金，双乾支付托管" value="{!! $corp->pattern or '' !!}"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">担保机构：</div>
                            <div><input type="text" name="data[assure]" placeholder="平安担保公司" value="{!! $corp->assure or '' !!}"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">评测等级：</div>
                            <div><input type="text" name="data[level]" placeholder="AAA" value="{!! $corp->level or '' !!}"></div>
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
        @if(!empty($corp))
          _init_area({!! $area !!});
        @else
        _init_area(["\u7701","\u5e02","\u533a"]);
        @endif
        $('#uploadimg').uploadify({
            'onInit': function () {$("#queueID").hide();},
            'swf'      : '/vendor/uploadify/uploadify.swf',
            'uploader' : '/uploadImg',
            'formData' :{'width0':180,'height0':180, 'type0':1},
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
                    var html = '<img style="width:180px;" src="' + data.info[180180] + '">';
                    html += '<input type="hidden" name="data[logo]" value="' + data.info[180180] + '" />'
                    $('#logoShow').html(html);
                }
            },

        });

        $('#uploadLogo').uploadify({
            'onInit': function () {$("#queueID").hide();},
            'swf'      : '/vendor/uploadify/uploadify.swf',
            'uploader' : '/uploadImg',
            'formData' :{'width0':195,'height0':60, 'type0':1},
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
                    $('#platformLogoShow').html(html);
                }
            }
        });

        $('#adLogoId').uploadify({
            'onInit': function () {$("#queueID").hide();},
            'swf'      : '/vendor/uploadify/uploadify.swf',
            'uploader' : '/uploadImg',
            'formData' :{'width0':294,'height0':129, 'type0':1},
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
                    var html = '<img style="width:294px;height:129px;" src="' + data.info[294129] + '">';
                    html += '<input type="hidden" name="data[platform_logo]" value="' + data.info[294129] + '" />'
                    $('#adLogoShow').html(html);
                }
            }
        });
    </script>
@stop
