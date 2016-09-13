@extends('layout.main')
@section('title')
    {!! $category->title or '' !!} - 关于我们 - 天眼投
@stop

@section('content')
<!--BODY START-->
<div id="aboutpage" class="wrap">
    <div class="container">
        @include('front.about.sidebar')
        <div class="main tworow">
            <h2>联系我们</h2>
            <div class="content contact">
                <div class="para-img">
                    <img src="//static.touzhijia.com/images/about/contact-map.jpg?ver=20160431006">
                </div>
                <div class="para-img serve-code">
                    <span>手机扫一扫二维码</span><br/>
                    <img src="//static.touzhijia.com/images/common/f_service.png?ver=20160431006" width="142"><br/>
                    <span>关注我们，获取最新资讯</span>
                </div>
                <h3 class="title-blue-normal">公司地址</h3>
                <p>地 址：深圳市南山区特发信息科技大厦6楼<br/>邮 编：518000</p>
                <h3 class="title-blue-normal">联系方式</h3>
                <p>如果您在使用投之家(www.touzhijia.com)的过程中有任何疑问请您与投之家客服人员联系<br/>客服电话：400-883-1803 (工作日 9:00-20:30)<br/>客服邮箱：service@touzhijia.com</p>
                <div class="para-img"><img src="//static.touzhijia.com/images/about/contact.png?ver=20160431006"></div>
                <h3 class="title-blue-normal">商务合作</h3>
                <p>如果贵公司希望与我们建立商务合作关系，请将合作意向进行简要描述并发送邮件至：<br/>合作邮箱：market@touzhijia.com<br/>QQ：2851712631<br/>联系人：陈先生</p>
                <h3 class="title-blue-normal">加入我们</h3>
                <p>如果你对投之家感兴趣，不妨投个简历试试呗，我们等着你过来!<br/>HR邮箱：hr@touzhijia.com<br/>QQ：2851985922</p>
            </div>
        </div>
    </div>
</div>
<!--BODY END-->
@stop

@section('script')
    @include('front.about.script')
@stop