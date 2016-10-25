<html>
<body onload="document.forms[0].submit();">
<p style="width:500px;height:300x;text-align:center; padding:30px;margin:100px auto;border:1px solid #cdcdcd;">
    正在为您跳转至{!! $corp->name !!}平台...
</p>
<form action ="{!! strpos($task->url, 'http') !== false ? $task->url : 'http://'.$task->url !!}" method="post">
    <input type="hidden" name="timestamp" value="{!! $sign['timestamp'] or time() !!}"/>
    <input type="hidden" name="nonce" value="{!! $corp->ename !!}"/>
    <input type="hidden" name="signature" value="{!! $sign['signature'] or '' !!}"/>
</form>
</body>
</html>