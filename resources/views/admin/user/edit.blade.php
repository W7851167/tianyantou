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
                            <div><input type="text" name="data[username]" value="{!! $user->username !!}"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">用户昵称：</div>
                            <div><input type="text" name="data[nickname]" value="{!! $user->nickname !!}"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">qq：</div>
                            <div><input type="text" name="data[qq]" value="{!! $user->qq !!}"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">真实姓名：</div>
                            <div><input type="text" name="data[realname]" value="{!! $user->realname !!}"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">身份证号码：</div>
                            <div><input type="text" name="data[idno]" value="{!! $user->idno !!}"></div>
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
                                    {{--<select name="data[county]" class="county" id="county">--}}
                                        {{--<option>区</option>--}}
                                    {{--</select>--}}
                                </p>
                                <p>
                                    <input type="text" name="data[address]" placeholder="请输入详细地址" value="{!! $corp->address or '' !!}" style="margin-top: 18px;">
                                </p>
                            </div>
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
                            <div class="infospaceAddLeft">性别：</div>
                            <input type="radio" name ="data[gender]" value="已婚" @if($user->gender == '男') checked @endif style="margin-left: 20px">男
                            <input type="radio" name ="data[gender]" value="未婚" @if($user->gender == '女') checked @endif style="margin-left: 20px">女
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">婚姻：</div>
                            <div>
                                <input type="radio" name ="data[marriage]" value="已婚" @if($user->marriage == '已婚') checked @endif style="margin-left: 20px">已婚
                                <input type="radio" name ="data[marriage]" value="未婚" @if($user->marriage == '未婚') checked @endif style="margin-left: 20px">未婚
                            </div>
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
    <script>
        @if(!empty($corp))
          _init_area({!! $area !!});
        @else
        _init_area(["\u7701","\u5e02","\u533a"]);
        @endif
    </script>
@stop
