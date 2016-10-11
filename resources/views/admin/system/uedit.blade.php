@extends('admin.common.layout')
@section('title')提现操作@stop
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
                    <a href="{!! url('system') !!}">系统管理&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                    <a href="javascript:void(0)">编辑操作</a>
                </div>
                <form  method="post" class="base_form">
                    {!! csrf_field() !!}
                    @if(!empty($usermodel))
                    <input type="hidden" name="data[id]" value="{!! $usermodel->id or '' !!}">
                    @endif
                    <div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">用户：</div>
                            <div><input type="text" name="data[username]" value="{!! $usermodel->username or '' !!}"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">选择角色：</div>
                            <div>
                                <select name="data[roles]" style="width: 240px;">
                                    <option value="">请选择</option>
                                    @foreach($roles as $rv)
                                    <option value="{!! $rv->id !!}" @if(isset($usermodel->roles) && $usermodel->roles == $rv->id)selected @endif>{!! $rv->name !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">密码：</div>
                            <div><input type="password" name="data[password]" value=""></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">确认密码：</div>
                            <div><input type="password" name="data[password_confirmation]" value=""></div>
                        </div>
                    </div>
                    <div class="w928">
                        <div class="button">
                            <input class="submit" type="submit"  value="保存">
                            <input class="return" type="reset" value="重置">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@stop
