@extends('admin.common.layout')
@section('title') 安全保障 @stop
@section('style')
    {!!HTML::style('admin/css/lists.css')!!}
    {!!HTML::style('admin/css/dialog.css')!!}
    {!!HTML::style('vendor/datepicker/skin/WdatePicker.css')!!}
    {!!HTML::script('vendor/datepicker/WdatePicker.js')!!}
@stop
@section('content')
    <div class="content-all">
        <div class="content clearfix">
            @include('admin.common.sidebar')
            <div class="content-right">
                <div class="content-right-header clearfix">
                    <div class="content-right-header clearfix">
                        <img src="{!!url('admin/images/u5.png')!!}"/>
                        <a href="{!! url('task') !!}">项目管理&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                        <a href="{!! url('corp') !!}">公司管理&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                        <a href="javascript:void(0);">{!! $corp->name or '管理' !!}</a>
                    </div>
                </div>

                <div class="content-right-tit clearfix">
                    <p><a href="{!! url('corp/manage',['id'=>$corp->id]) !!}">公司介绍</a></p>
                    <p><a href="{!! url('corp/term',['id'=>$corp->id]) !!}">团队管理</a></p>
                    <p><a href="{!! url('corp/safety',['id'=>$corp->id]) !!}" >安全保障</a></p>
                    <p><a href="{!! url('corp/photos',['id'=>$corp->id]) !!}">图片资料</a></p>
                    <p><a href="{!! url('corp/news',['id'=>$corp->id]) !!}">最新动态</a></p>
                    <p><a href="{!! url('corp/charts',['id'=>$corp->id]) !!}" >雷达图</a></p>
                    <p><a href="{!! url('corp/honour',['id'=>$corp->id]) !!}"  class="at">企业荣誉</a></p>
                </div>
                <form  method="post" class="base_form">
                    {!! csrf_field() !!}
                    <div class="infospaceAddContent clearfix">
                        <div class="infospaceAddLeft"><span>*</span>荣誉一：</div>
                        <div><input type="text" name="data[honour_1]" placeholder="荣誉一" value="{!! $metas['honour_1'] or '' !!}"></div>
                    </div>
                    <div class="infospaceAddContent clearfix">
                        <div class="infospaceAddLeft">荣誉二：</div>
                        <div><input type="text" name="data[honour_2]" placeholder="荣誉二" value="{!! $metas['honour_2'] or '' !!}"></div>
                    </div>
                    <div class="infospaceAddContent clearfix">
                        <div class="infospaceAddLeft">荣誉三：</div>
                        <div><input type="text" name="data[honour_3]" placeholder="荣誉三" value="{!! $metas['honour_3'] or '' !!}"></div>
                    </div>

                    <div class="infospaceAddContent clearfix">
                        <div class="infospaceAddLeft"><span>*</span>合作一：</div>
                        <div><input type="text" name="data[honour_corp_1]" placeholder="合作一" value="{!! $metas['honour_corp_1'] or '' !!}"></div>
                    </div>
                    <div class="infospaceAddContent clearfix">
                        <div class="infospaceAddLeft">合作二：</div>
                        <div><input type="text" name="data[honour_corp_2]" placeholder="合作二" value="{!! $metas['honour_corp_2'] or '' !!}"></div>
                    </div>
                    <div class="infospaceAddContent clearfix">
                        <div class="infospaceAddLeft">合作三：</div>
                        <div><input type="text" name="data[honour_corp_3]" placeholder="荣誉三" value="{!! $metas['honour_corp_3'] or '' !!}"></div>
                    </div>
                    <div class="w928">
                        <div class="button">
                            <input class="submit" type="submit"  value="保存">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
