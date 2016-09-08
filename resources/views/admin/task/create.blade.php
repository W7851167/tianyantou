@extends('admin.common.layout')
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
                    <a href="{!! url('task') !!}">公司列表</a>
                </div>
                <form action="{!! url('/shop/add') !!}" method="post" id="store_form">
                    <input name="zoom" type="hidden" class="zoom">
                    {!! csrf_field() !!}
                    <div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>门店名称：</div>
                            <div><input type="text" name="data[name]" placeholder=""></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>分店名称：</div>
                            <div><input type="text" name="data[branch_name]" placeholder="***分店"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft h80"><span>*</span>门店地址：</div>
                            <div>
                                <p>
                                    <select name="province" class="province" @if(!empty($province_id)) data-id="{!! $province_id !!}" @endif>
                                        <option>请选择</option>
                                    </select>
                                    <select name="city" class="city" >
                                        <option value="">请选择</option>
                                    </select>
                                    <select name="area" class="district">
                                        <option>请选择</option>
                                    </select>
                                </p>
                                <p>
                                    <input id="address" type="text" name="data[location]" placeholder="请输入详细地址">
                                </p>

                            </div>
                        </div>
                        <div class="infospaceAddMap clearfix">
                            <!--选点-->
                            <li>
                                <div class="step_info_right">
                                    <div class="Latitude_info">
                                        <label>经度</label>
                                        <input class="text1 latitude" name="dat[lat]" type="text">

                                        <label>纬度</label>
                                        <input class="text1 longitude" name="data[lng]" type="text">

                                    </div>
                                    <a class="select_tag" href="javascript:void(0);" onclick="showMap()">地图选点</a>
                                </div>
                            </li>
                        </div>

                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">经营类目：</div>
                            <div>
                                <select name="data[categories]" style="width: 240px;">
                                    <option value="购物,综合商场">购物,综合商场</option>
                                    <option value="购物,家具家具建材">购物,家具家具建材</option>
                                </select>
                            </div>
                        </div>

                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>服务电话：</div>
                            <div><input type="text" name= "data[tel]" placeholder="010-13221321"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>营业时间：</div>
                            <div><input type="text" name = "data[open_time]" placeholder="09:00-22:00"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>人均价格：</div>
                            <div><input type="text" name = "data[avg_price]" placeholder=""></div>
                        </div>
                        <div class="infospaceAddContent add clearfix">
                            <div class="infospaceAddLeft"><span>*</span>特色服务：</div>
                            <div>

                                <input type="button" id="add-service" value="添加特色服务">
                            </div>

                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>门店简介：</div>
                            <div><textarea class="addText" name="data[introduction]"></textarea></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>标签：</div>
                            <div class="clearfix"><textarea name = "recommend" class="addText addTag"></textarea>
                                {{--<input type="button" id="add2" value="添加标签">--}}
                            </div>
                        </div>

                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>门店内景图：</div>
                            <div class="sh_service_rp_all pr clearfix">
                                <div class="uploader-list img_box_1 fl" id="tkupload" ></div>
                                <div class="sh_service_rp_all_img fl pr">
                                    <div class="sh_service_rp_z pa" id="upImg1">
                                        <p></p><p></p>
                                    </div>
                                    <div class="sh_service_rp_z pa" id="upImg2">
                                        <p></p><p></p>
                                    </div>
                                    <div class="sh_service_rp_z pa" id="upImg3">
                                        <p></p><p></p>
                                    </div>
                                    <div class="sh_service_rp_z pa" id="upImg4">
                                        <p></p><p></p>
                                    </div>
                                    <div class="sh_service_rp_z pa" id="upImg5">
                                        <p></p><p></p>
                                    </div>
                                </div>
                                <p class="hint">必须上传900*450px的图片！</p>
                                <ul id="img_box_1"></ul>
                            </div>
                        </div>
                        <div class="infospaceAddImg">
                            <div class="infospaceAddLeft h80"><span>*</span>门店主图：</div>
                            <div id="storeimg">

                                @if(!empty($errors->first('store')))<p style="color:red">{!! $errors->first('store') !!}</p>@endif
                                <a class="clickUpload" id="uploadimg" href="javascript:void(0)">点击上传</a>
                            </div>
                            <p class="hint">必须上传640*340px的图片！</p>
                            <div class="imgbox">

                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="infospaceAddLeft h80"><span>*</span>是否推送到微信：</div>
                        <div> <input type="radio" name="data[is_push]" value="0" checked>否 <input type="radio" name="data[is_push]" value="1">是</div>
                    </div>
                    <div class="w928">
                        <div class="button">
                            <input class="submit" type="submit"  value="提交">
                            <a href="{!! url('shop/index') !!}"><input class="return" type="button" value="返回列表"></a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!--添加相关推荐--->
    <!--选点-->
    <div id="new_page" style="display:none;">
        <div id="maskLevel"></div>
        <div class="new_page_box">
            <div class="select_tag_title">
                <h3>地图选点</h3>
                <a href="javascript:;" onClick="$('#new_page').hide();">&times;</a>
            </div>
            <div class="map_info">
                <div class="info_400">
                    <h3>搜索位置<span>（回车键提交）</span></h3>
                    <input type="text" id="seach"  placeholder="按详细地址搜索如：中国,北京,腾信达">
                </div>
                <div class="info_190">
                    <h3>经度</h3>
                    <input type="text" class="latitude" value="">
                </div>
                <div class="info_190">
                    <h3>纬度</h3>
                    <input type="text" class="longitude" value="">
                </div>
                <div class="info_780">
                    <div id="allmap" style="width: 100%;height: 100%;overflow: hidden;margin:0;"></div>
                </div>
            </div>
            <div class="select_tag_input">
                <input class="submit" type="button" onClick="$('#new_page').hide();" value="确定">
                <input class="button" type="button" value="取消" onClick="$('#new_page').hide();">
            </div>
        </div>
    </div>
@stop

