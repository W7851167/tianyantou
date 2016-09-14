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
                    <a href="{!! url('census') !!}">数据统计&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                    <a href="{!! url('ad/create') !!}">友情链接</a>
                </div>
                <form  method="post" class="base_form">
                    {!! csrf_field() !!}
                    @if(!empty($link))
                        <input type="hidden" name="data[id]" value="{!! $link->id !!}">
                    @endif
                    <div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>名称：</div>
                            <div><input type="text" name="data[name]" placeholder="链接名称" value="{!! $link->name or '' !!}"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>URL：</div>
                            <div><input type="text" name="data[url]" placeholder="友情链接地址" value="{!! $link->url or '' !!}"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>排序：</div>
                            <div><input type="text" name="data[sorts]" placeholder="数值大靠前" value="{!! $link->sorts or '' !!}"></div>
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
