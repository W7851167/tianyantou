<!DOCTYPE HTMl>
<html>
<head>
    <meta charset="utf-8" />
    <title>登录页</title>
    <link rel="stylesheet" type="text/css" href="{!! URL('/admin/css/login.css') !!}"/>
    <script src="{!! URL('/vendor/jquery/jquery.min.js') !!}" type="text/javascript" charset="utf-8"></script>
    <style>
        .hide {display:none}
    </style>
</head>
<body>
<div class="content">
    <ul class="content-bg"><li></li><li></li><li></li></ul>
    <div class="content-ct">
        <form id="myform">
            <input type="hidden" value="{!! csrf_token() !!}" name="_token">
            <div class="content-ct-page clearfix">
                <div class="content-page-tit clearfix"><strong>欢迎登录</strong><p>后台管理系统</p></div>
                <div class="content-page-int">
                    <input class="int email" type="text" name="username" id="username" value="" placeholder="用户名"/>
                    <p class="show-page error-username"></p>
                </div>
                <div class="content-page-int">
                    <input class="int password" type="password" name="password" id="password" value="" placeholder="密码"/>
                    <p class="alert alert-danger"></p>
                </div>
                <div class="content-page-int">
                    <a class="page-btn" id="sub-btn" href="javascript:void(0);">登录</a>
                </div>

                <div class="content-page-low clearfix">
                    <div class="int-line">
                        <input type="checkbox" name="remember" id="1" value="记住登录状态" />
                        <label for="1">记住登录状态</label>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

</body>

<script type="text/javascript">

    $("#sub-btn").click(function(){
        var error = 0;
        if($('#username').val() == ''){
            error++;
            $('.error-username').html('用户名不能为空');
        }else{
            $('.error-username').html('');
        }
        if($('#password').val()==''){
            error++;
            $(".alert-danger").html('密码不能为空');
        }else {
            $(".alert-danger").html('');
        }
        if(error > 0)return false;
        var data = $("#myform").serialize();
        $.post("{!! url('login') !!}",data,function(r){
            if(r.status){
                window.location.href = r.url;
            }else{
                $(".alert-danger").text(r.message);
            }
        });
    });
</script>
<script type="text/javascript">
    var i = 0;
    function change(){
        i++;
        if(i>3)
            i=0;
        $(".content-bg li").eq(i).fadeIn(2000).siblings().fadeOut(2000);
    }
    setInterval("change()",2000);
</script>
</html>