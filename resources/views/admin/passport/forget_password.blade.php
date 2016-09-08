@extends('admin.common.layout')
@section('style')
    <script src="{!!URL('cw100_b2b/js/jquery.validate-1.13.1.js')!!}"></script>
    <link rel="stylesheet" type="text/css" href="{{ URL('admin/css/password.css') }}">
@stop
@section('content')

    <div class="content-all">
        <div class="content clearfix">
            @include('admin.common.sidebar')
            <div class="content-right ">
                <div class="content-right-header clearfix">
                    <a href="{!!url('/')!!}">首页</a>&nbsp;&gt;&nbsp;<a href="{!!url('update/pwd')!!}">修改密码</a>
                </div>
                @if(count($errors)>0)
                    <p class="error">{!!$errors!!}</p>
                @endif
                <div class="content-right-page">
                    <div class="content-basic">
                        <div class="content-basic-tit">
                            <form id="c_password" action="{!!url('updatepwd/save')!!}" method="post">
                                <div  class="password_change">
                                    {{csrf_field()}}
                                    <p class="old_password"><span>原始密码：</span><input name="oldpwd" type="password"></p>
                                    <p class="new_password"><span>新密码：</span><input id="newpwd" name="newpwd" type="password"><span class="password_prompt">密码长度6-14位，字母区分大小写</span></p>
                                    <p class="confirm_password"><span>确认密码：</span><input name="password_confirmation" type="password"></p>
                                    <p><input type="submit" value="确定"></p>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <script>
        $('#c_password').validate({
            rules:{
                oldpwd:{
                    required:true
                },
                newpwd:{
                    required:true,
                    rangelength:[6,16]
                },
                password_confirmation:{
                    required:true,
                    equalTo:"#newpwd"
                }
            },
            messages:{
                oldpwd:{
                    required:"原始密码必须填写"
                },
                newpwd:{
                    required:"必须填写修改后的密码",
                    rangelength:"密码格式不正确"
                },
                password_confirmation:{
                    required:"必须确认密码",
                    equalTo:"两次输入不一致"
                }
            }

        })
    </script>
@stop
