@extends('admin.common.layout')
@section('title') 创建公司信息 @stop
@section('style')
    {!!HTML::style('admin/css/dialog.css')!!}
    {!!HTML::style('admin/css/form.css')!!}
    {!!HTML::script('vendor/area/area.js')!!}
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
                    <div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>平台名称：</div>
                            <div><input type="text" name="data[platform]" placeholder="公司简称"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>公司名称：</div>
                            <div><input type="text" name="data[name]" placeholder="公司全名"></div>
                        </div>
                        <div class="infospaceAddImg">
                            <div class="infospaceAddLeft h80"><span>*</span>公司Logo：</div>
                            <div id="storeimg">
                                <a class="clickUpload" id="uploadimg" href="javascript:void(0)">点击上传</a>
                            </div>
                            <p class="hint">必须上传180*180px的图片！</p>
                            <div class="imgbox"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft h80"><span>*</span>公司地址：</div>
                            <div>
                                <p>
                                    <select name="province" class="province" id="province">
                                        <option>省</option>
                                    </select>
                                    <select name="city" class="city" id="city" >
                                        <option value="">市</option>
                                    </select>
                                    <select name="county" class="county" id="county">
                                        <option>区</option>
                                    </select>
                                </p>
                                <p>
                                    <input  type="text" name="data[address]" placeholder="请输入详细地址">
                                </p>
                            </div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>注册金额：</div>
                            <div><input type="text" name="data[capital]" placeholder="2000万元"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>法人代表：</div>
                            <div><input type="text" name="data[username]" placeholder="真实姓名"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>上线时间：</div>
                            <div><input type="text" name="data[online]" placeholder="2016-09-09"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">担保方式：</div>
                            <div><input type="text" name="data[pattern]" placeholder="风险准备金，双乾支付托管"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">担保机构：</div>
                            <div><input type="text" name="data[assure]" placeholder="平安担保公司"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">评测等级：</div>
                            <div><input type="text" name="data[level]" placeholder="平安担保公司"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>平台介绍：</div>
                            <div><textarea class="addText" name="data[intro]"></textarea></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>风险控制：</div>
                            <div class="clearfix"><textarea name = "data[risk]" class="addText"></textarea>
                            </div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>推荐理由：</div>
                            <div class="clearfix"><textarea name = "data[nominate]" class="addText"></textarea>
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
        _init_area(["\u7701","\u5e02","\u533a"]);
        $('#uploadimg').uploadify({
            'onInit': function () {$("#queueID").hide();},
            'swf'      : '/vendor/uploadify/uploadify.swf',
            'uploader' : '/uploadImg',
            'formData' :{'width0':180,'height0':180, 'type0':1, 'path': 'logo'},
            'buttonText':'上传',
            'width':'86',
            'buttonImage' : '/vendor/uploadify/btn_up_pressed.png',
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
                    var html = '<img src="' + data.info[180180] + '"><a href="javascript:;">';
                    html += '<input type="hidden" name="data[logo]" value="' + data.info[180180] + '" />'
                    $('.imgbox').append(html);
                }
            },

        });
    </script>
@stop
