@extends('admin.common.layout')
@section('title')提现操作@stop
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
                    <a href="javascript:void(0)">编辑操作</a>
                </div>
                <form  method="post" class="base_form">
                    {!! csrf_field() !!}
                    <input type="hidden" name="data[id]" value="{!! $user->id !!}">
                    {{--<input type="hidden" name="data[user_id]" value="{!! $withdraw->user_id !!}">--}}
                    <div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">用户：</div>
                            <div><input type="text" name="data[username]" value="{!! $user->username !!}"  disabled></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">用户昵称：</div>
                            <div><input type="text" name="data[nickname]" value="{!! $user->nickname !!}"  disabled></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">qq：</div>
                            <div><input type="text" name="data[qq]" value="{!! $user->qq !!}"  disabled></div>
                        </div>
                        {{--<div class="infospaceAddContent clearfix">--}}
                            {{--<div class="infospaceAddLeft">省/市：</div>--}}
                            {{--<div><input type="text" name="area" value=""  disabled></div>--}}
                        {{--</div>--}}
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">真实姓名：</div>
                            <div><input type="text" name="data[realname]" value="{!! $user->realname !!}"  disabled></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">身份证号码：</div>
                            <div><input type="text" name="data[idno]" value="{!! $user->idno !!}"  disabled></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">邮箱：</div>
                            <div><input type="text" name="data[email]" value="{!! $user->email !!}"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">手机号：</div>
                            <div><input type="text" name="data[mobile]" value="{!! $user->mobile !!}"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft h80">详细地址：</div>
                            <div>
                                <p>
                                    <select name="data[province]" class="province" id="province">
                                        <option>省</option>
                                    </select>
                                    <select name="data[city]" class="city" id="city" >
                                        <option value="">市</option>
                                    </select>
                                    <select name="data[county]" class="county" id="county">
                                        <option>区</option>
                                    </select>
                                </p>
                                <p>
                                    <input  type="text" name="data[address]" placeholder="请输入详细地址" value="{!! $corp->address or '' !!}">
                                </p>
                            </div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">性别：</div>
                            <div><input type="text" name="data[gender]" value="{!! $user->gender !!}"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">学历：</div>
                            <div><input type="text" name="data[gender]" value="{!! $user->education !!}"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">职业：</div>
                            <div><input type="text" name="data[industry]" value="{!! $user->industry !!}"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">婚姻：</div>
                            <div><input type="text" name="data[marriage]" value="{!! $user->marriage !!}"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">签名：</div>
                            <div><textarea name="data[signature]" class="addText"></textarea></div>
                        </div>
                    </div>
                    <div class="w928">
                        <div class="button">
                            <input class="submit" type="submit"  value="保存">
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
