@extends('admin.common.layout')
@section('title') 更新密码 @stop
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
                        <a href="{!! url('dashboard') !!}">面板&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                        <a href="{!! url('passport/password') !!}">修改密码</a>
                    </div>
                </div>
                <form  method="post" class="base_form">
                    {!! csrf_field() !!}
                    <div class="infospaceAddContent clearfix">
                        <div class="infospaceAddLeft"><span>*</span>原始密码：</div>
                        <div><input type="password" name="old" placeholder="原密码" value=""></div>
                    </div>
                    <div class="infospaceAddContent clearfix">
                        <div class="infospaceAddLeft"><span>*</span>新密码：</div>
                        <div><input type="password" name="new" placeholder="就密码" value=""></div>
                    </div>
                    <div class="infospaceAddContent clearfix">
                        <div class="infospaceAddLeft"><span>*</span>确认密码：</div>
                        <div><input type="password" name="confirmation" placeholder="确认密码" value=""></div>
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
