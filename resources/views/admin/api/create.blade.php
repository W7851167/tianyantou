@extends('admin.common.layout')
@section('title') 创建/编辑Api接口 @stop
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
                    <a href="{!! url('api/create') !!}">创建接口</a>
                </div>
                <form  method="post" class="base_form">
                    {!! csrf_field() !!}
                    @if(!empty($api))
                        <input type="hidden" name="data[id]" value="{!! $api->id !!}">
                    @endif
                    <div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>名称：</div>
                            <div>
                                <select name="data[corp_id]">
                                    <option value="0">全部平台&nbsp;&nbsp;</option>
                                    @foreach($corps as $cv)
                                        <option value="{!! $cv->id or '' !!}" @if(!empty($api->corp_id) && $api->corp_id == $cv->id) selected @endif>{!! $cv->name or '' !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>接口说明：</div>
                            <div><input type="text" name="data[intro]" placeholder="接口说明" value="{!! $api->intro or '' !!}"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>参数配置：</div>
                            <div>
                                <textarea name="data[options]" class="addText" style="height: 200px;">
                                 {!! $api->options or '' !!}
                                </textarea>

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
