@extends('admin.common.layout')
@section('title')系统管理@stop
@section('style')
    {!!HTML::style('admin/css/form.css')!!}
@stop
@section('content')
    <div class="content-all">
        <div class="content clearfix">
            @include('admin.common.sidebar')
            <div class="content-right">
                <div class="content-right-header clearfix">
                    <div class="content-right-header clearfix">
                        <img src="{!!url('admin/images/u5.png')!!}"/>
                        <a href="{!! url('system') !!}">系统管理&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                        <a href="{!! url('system') !!}">系统设置</a>
                    </div>
                </div>

                <div class="content-right-tit clearfix">
                    <p><a href="javascript:void(0)" class="at">系统设置</a></p>
                </div>
                <form  method="post" class="base_form">
                    {!! csrf_field() !!}
                    <div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>邀请第一次奖励：</div>
                            <div><input type="text" name="data[first_reward]" value="{!! $metas['first_reward'] or '' !!}">元</div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>邀请第二次奖励：</div>
                            <div><input type="text" name="data[second_reward]" value="{!! $metas['second_reward'] or '' !!}">元</div>
                        </div>
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
