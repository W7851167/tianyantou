
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>天眼投_500页面</title>
    <meta name="keywords" content="天眼投、P2P网贷、P2P投资、P2P网贷平台、网贷平台、个人投资理财、投资理财、P2P理财">
    <meta name="description" content="天眼投是国内领先的P2P理财网贷平台，为投资者提供专业的P2P理财产品搜索、咨询和对比服务，通过严格的风控，创新的技术，海量的数据，让用户的投资理财变得安全、简单、高效，为您的个人投资理财保驾护航。！">
    <meta name="author" content="p2p网贷,p2p理财,天眼投投资理财平台" />
    <meta name="searchtitle" content="p2p网贷,p2p理财,天眼投投资理财平台" />
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/css.css" />
</head>
<body>
<!--内容开始-->
<div id="notfound" class="wrap">
    <div class="container">
        <div class="content">
            <img src="http://static.tianyantou.com/images/404/404.jpg">
            <p><span>{!! $exception->getMessage()  !!}</span></p>
            <div class="btns">
                <a href="javascript:history.back();" class="btn btn-blue btn-l">返回上一级页面</a>
                <a href="{!! config('app.url') !!}" class="btn btn-blue btn-l">返回网站首页</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>