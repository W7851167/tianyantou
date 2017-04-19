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
                            <div><input type="text" name="data[name]" placeholder="公司简称" value="{!! $corp->name or '' !!}"></div>
                        </div>

                        <div class="infospaceAddImg clearfix">
                            <div class="infospaceAddLeft h80"><span>*</span>平台LOGO：</div>
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

                        <!--移动端LOGO-->
                        <div class="infospaceAddImg">
                            <div class="infospaceAddLeft h80"><span>*</span>移动端LOGO：</div>
                            <div id="storeimg">
                                <a class="clickUpload" id="uploadMImg" href="javascript:void(0)">点击上传</a>
                            </div>
                            <p class="hint">必须上传100*50px生成的图片！</p>
                            <ul class="imgbox" id="mlogoShow" style="width: 100px;height: 50px;">
                                @if(!empty($corp->m_logo))
                                    <img style="width:100px;height:50px;" src="{!! config('app.static_url').$corp->m_logo !!}">
                                    <input type="hidden" name="data[m_logo]" value="{!! $corp->m_logo or '' !!}" />
                                @endif
                            </ul>
                        </div>
                        <!--移动端LOGO-->

                        <div class="infospaceAddImg">
                            <div class="infospaceAddLeft h80"><span>*</span>营业执照：</div>
                            <div id="storeimg">
                                <a class="clickUpload" id="chartered" href="javascript:void(0)">点击上传</a>
                            </div>
                            <p class="hint">生成280*220的缩略图图片！</p>
                            <ul class="imgbox" id="charteredShow" style="width: 280px;height: 220px;">
                                @if(!empty($corp->chartered))
                                    <img style="width: 195px;height: 60px;" src="{!! config('app.static_url').$corp->chartered  !!}">
                                    <input type="hidden" name="data[chartered]" value="{!! $corp->chartered  or '' !!}" />
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
                            <div class="infospaceAddLeft"><span>*</span>排序：</div>
                            <div><input type="text" name = "data[sorts]" placeholder="值越大越靠前"  value="{!! $corp->sorts or 0 !!}"></div>
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
                            <div class="infospaceAddLeft"><span>*</span>状态：</div>
                            <div>
                                <input type="radio" name = "data[status]" value="0" @if(empty($corp) || $corp->status == 0) checked @endif>停止
                                <input type="radio" name = "data[status]" value="1" @if(!empty($corp) && $corp->status == 1) checked @endif>正常
                            </div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>每个任务完成数限定：</div>
                            <div><input type="text" name="data[limit]" placeholder="任务完成数限定" value="{!! $corp->limit or 1 !!}"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">评测等级：</div>
                            <div>
                                <select name="data[level]" style="width: 240px;">
                                    <?php $level = empty($corp->level) ? 'AAA' : $corp->level;?>
                                    <option value="AAA" @if($level == 'AAA') checked @endif>AAA</option>
                                    <option value="AA" @if($level == 'AA') checked @endif>AA</option>
                                    <option value="A" @if($level == 'A') checked @endif>A</option>
                                    <option value="BBB" @if($level == 'BBB') checked @endif>BBB</option>
                                    <option value="BB" @if($level == 'BB') checked @endif>BB</option>
                                    <option value="B" @if($level == 'B') checked @endif>B</option>
                                </select>
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

        $('#uploadMImg').uploadify({
            'onInit': function () {$("#queueID").hide();},
            'swf'      : '/vendor/uploadify/uploadify.swf',
            'uploader' : '/uploadImg',
            'formData' :{'width0':100,'height0':50, 'type0':1},
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
                    var html = '<img style="width:100px;height:50px;" src="' + data.info[10050] + '">';
                    html += '<input type="hidden" name="data[m_logo]" value="' + data.info[10050] + '" />'
                    $('#mlogoShow').html(html);
                }
            },

        });

        $('#chartered').uploadify({
            'onInit': function () {$("#queueID").hide();},
            'swf'      : '/vendor/uploadify/uploadify.swf',
            'uploader' : '/uploadImg',
            'formData' :{'width0':280,'height0':220, 'type0':1},
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
                    var html = '<img style="width:280px;height:220px;" src="' + data.info[280220] + '">';
                    html += '<input type="hidden" name="data[chartered]" value="' + data.info[280220] + '" />'
                    $('#charteredShow').html(html);
                }
            }
        });
    </script>
@stop
