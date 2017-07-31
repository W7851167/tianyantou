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
                <form  method="post" class="base_form" enctype="multipart/form-data">
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
                                <input onchange="img(this)" name="img1" type="file">
                            </div>
                            <p class="hint">必须上传1349*246的图片！</p>
                            <ul class="imgbox" id="imgs1"  style="width: 680px;height: 124px;">
                                @if(!empty($adv->p_img))
                                    <img style="width: 680px;height: 124px;" src="{!! config('app.admin_url').$adv->p_img !!}">
                               @endif
                            </ul>
                        </div>
                        <!--移动端轮播-->
						<div class="infospaceAddImg">
                            <div class="infospaceAddLeft h80"><span>*</span>移动端图片：</div>
                            <div id="storeimg">
                                <input type="file" name="m_img1" onchange="m_img(this)" />
                            </div>
                            <p class="hint">必须上传1280*630的图片！</p>
                            <ul class="imgbox" id="m_imgs1"  style="height: 180px;width: 365px;">
                                @if(!empty($adv->m_img))
                                    <img style="height: 180px;width: 365px;" src="{!! config('app.admin_url').$adv->m_img !!}">
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
    <script>
        function img(file) {
            if (file.files && file.files[0]) {
                var reader = new FileReader();
                reader.onload = function(evt) {
                    var html = '<img style="width: 680px;height: 124px;" src="'+evt.target.result+'">';
                    $('#imgs1').html(html);
                }
                reader.readAsDataURL(file.files[0]);
            } else {
            }
        }
        //移动端图片
        function m_img(file) {
            if (file.files && file.files[0]) {
                var reader = new FileReader();
                reader.onload = function(evt) {
                    var html = '<img style="height: 180px;width: 365px;" src="'+evt.target.result+'">';
                    $('#m_imgs1').html(html);
                }
                reader.readAsDataURL(file.files[0]);
            } else {
            }
        }
    </script>
@stop
