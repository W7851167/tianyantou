
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>登记投资信息</title>
    <!--可无视-->
    <style type="text/css">
        /* CSS Document */
        html,body,div,span,h1,h2,h3,h4,h5,h6,p,pre,a,code,em,img,small,strong,sub,sup,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label{margin:0;padding:0;border:0;outline:0;font-size:100%;vertical-align:baseline;background:transparent}
        a{color:#007bc4/*#424242*/; text-decoration:none;}
        a:hover{text-decoration:underline}
        ol,ul{list-style:none}
        table{border-collapse:collapse;border-spacing:0}
        body{height:100%; font:12px/18px "Microsoft Yahei", Tahoma, Helvetica, Arial, Verdana, "\5b8b\4f53", sans-serif; color:#51555C; background:#162934;}
        img{border:none}

        #main{width:980px; min-height:600px; margin:30px auto 0 auto; background:#fff; -moz-border-radius:12px;-khtml-border-radius: 12px;-webkit-border-radius: 12px; border-radius:12px;}
        h2.top_title{margin:4px 20px; padding-top:15px; padding-left:20px; padding-bottom:10px; border-bottom:1px solid #d3d3d3; font-size:18px; color:#a84c10; background:url(arrL.gif) no-repeat 2px 14px}

        #footer{height:60px;}
        #footer p{ padding:10px 2px; line-height:24px; text-align:center}
        #footer p a:hover{color:#51555C}
        #stat{display:none}
    </style>

    <style type="text/css">
        .demo{width:680px; margin:10px auto; color:#333; background:#fff}
        .page_title{width:680px; height:30px; margin:10px auto 0 auto; text-align:center; font-weight:bold;}
        form p{padding:4px; line-height:20px; clear:both}
        form p label{display:block; float:left; width:100px; padding-top:2px}
    </style>
    <script language="javascript">
        function clearNoNum(obj) {
            obj.value = obj.value.replace(/[^\d.]/g, "");//清除“数字”和“.”以外的字符
            obj.value = obj.value.replace(/^\./g, "");//验证第一个字符是数字而不是.
            obj.value = obj.value.replace(/\.{2,}/g, ".");//只保留第一个. 清除多余的.
            obj.value = obj.value.replace(".", "$#$").replace(/\./g,"").replace("$#$", ".");
        }
    </script>
</head>
<body>
<div id="main">
    <h2 class="top_title">投资设置</h2>
    <div class="demo">
        <form action="{!! url('platform/redirect') !!}" method="post">
            {!! csrf_field() !!}
            <input type="hidden" name="data" value="{!! \Crypt::encrypt($data)!!}"/>
            <input type="hidden" name="timestamp" value="{!! $sign['timestamp'] !!}"/>
            <input type="hidden" name="nonce" value="{!! $corp->ename !!}"/>
            <input type="hidden" name="signature" value="{!! $sign['signature'] !!}"/>
            <p><label>平台：</label>{!! $corp->platform !!}</p>
            <p><label>项目：</label>{!! $task->title !!}</p>
            <p><label>期限：</label>{!! $task->term !!}</p>
            <p><label>可投时间：</label>{!! dateFormat(getDiffTime($task->end_time,time())) !!}</p>
            <p><label>招标总额：</label>{!! tmoney_format($task->total)!!}元</p>
            <p><label>年转化率：</label>{!! $task->ratio or 0.00 !!}%</p>
            <p><label>增值转化率：</label>{!! $task->mratio or 0.00 !!}%</p>
            <p><label>投资人：</label>{!! $user['username'] !!}</p>
            <p><label>投资金额：</label><input type="text" name="price" onkeyup="clearNoNum(this)" value="{!! money_format($task->limit) !!}"/>元</p>
            <p><label>短信：</label><input type="checkbox" name="sms"/> 开通短信提醒功能</p>
            <p><label>备注：</label>
                <textarea name="intro" rows="6" cols="40"></textarea>
            </p>
            <p><label>&nbsp;</label><input type="submit" value="提 交" /></p>
        </form>
    </div>
</div>

</body>
</html>
