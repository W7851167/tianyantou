@extends('admin.common.layout')
@section('title')添加积分@stop
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
                    <a href="{!! url('user') !!}">用户管理&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                    <a href="javascript:void(0)">添加积分</a>
                </div>
                <form  method="post" class="base_form">
                    {!! csrf_field() !!}
                    <input type="hidden" name="data[id]" value="{!! $user->id !!}">
                    <div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">用户：</div>
                            <div><input type="text" name="username" value="{!! $user->username !!}"  disabled></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                        <div class="infospaceAddLeft">现有积分：</div>
                        <div><input type="text" name="score" value="{!! $user->money->score or 0 !!}"  disabled></div>
                    </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">添加积分：</div>
                            <div><input type="text" name="data[score]" placeholder="数字"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">积分说明：</div>
                            <div><input type="text" name="data[intro]" placeholder="如：管理员赠送积分"></div>
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
    <!--添加相关推荐--->
    <!--选点-->
@stop
