@extends('admin.common.layout')
@section('style')
    {!!HTML::style('admin/css/index.css')!!}
@endsection
@section('content')
    <div class="content-all">
        <div class="content clearfix">
            @include('admin.common.sidebar')
            <div class="content-right">
                <div class="content-right-header clearfix">
                    <img src="{!!url('admin/images/u5.png')!!}"/>
                    <a href="{!! url('/dashboard') !!}">管理中心&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                    <a href="{!! url('/dashboard') !!}">首页</a>
                </div>
                <table border="0" cellspacing="" cellpadding="" class="content-news">
                    <tr>
                        <td width="448px" style="border-bottom: 1px solid #F2F2F2;">
                            <div class="content-news-td-inner clearfix">
                                <div class="td-inner-tit clearfix">
                                    <div class="td-inner-tit-line three"></div>
                                    <div class="td-inner-tit-news">
                                        <p>用户统计</p>
                                        <span>注册统计</span>
                                    </div>
                                </div>
                                <ul class="td-inner-stat clearfix">
                                    <li>
                                        <p>统计情况</p>
                                        <p>注册人数</p>
                                        <p>邀请人数</p>
                                    </li>
                                    <li>
                                        <p>当日注册</p>
                                        <p>{!! $count['yCount'] or 0 !!}</p>
                                        <p>{!! $count['yCount'] or 0 !!}</p>
                                    </li>
                                    <li>
                                        <p>当月注册</p>
                                        <p>{!! $count['yCount'] or 0 !!}</p>
                                        <p>{!! $count['yCount'] or 0 !!}</p>
                                    </li>
                                </ul>
                            </div>
                        </td>
                        <td width="448px" style="border-left: 1px solid #F2F2F2;border-bottom: 1px solid #f2f2f2">
                            <div class="content-news-td-inner clearfix">
                                <div class="td-inner-tit bulletin clearfix">
                                    <div class="td-inner-tit-line four"></div>
                                    <div class="td-inner-tit-news ">
                                        <p>系统公告</p>
                                    </div>
                                    <a href="###">更多>></a>
                                </div>
                                <!--
                                <div class="cancel-none">
                                    <p>
                                        <img src="{!!url('admin/images/u464.png')!!}"/>
                                        暂无公告!
                                    </p>
                                </div>
                                -->
                                <ul class="td-inner-bulletin clearfix">
                                    <li><i></i><a href="###">总系统发布的公告标题总系统发布的公告标题</a><span>[2015-10-10]</span></li>
                                    <li><i></i><a href="###">总系统发布的公告标题总系统发布的公告标题</a><span>[2015-10-10]</span></li>
                                    <li><i></i><a href="###">总系统发布的公告标题总系统发布的公告标题</a><span>[2015-10-10]</span></li>
                                    <li><i></i><a href="###">总系统发布的公告标题总系统发布的公告标题</a><span>[2015-10-10]</span></li>
                                    <li><i></i><a href="###">总系统发布的公告标题总系统发布的公告标题</a><span>[2015-10-10]</span></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width="448px">
                            <div class="content-news-td-inner clearfix">
                                <div class="td-inner-tit clearfix">
                                    <div class="td-inner-tit-line five"></div>
                                    <div class="td-inner-tit-news">
                                        <p>项目排行</p>
                                        <span>最热项目TOP10</span>
                                    </div>
                                </div>
                                <ul class="td-inner-hotgoods clearfix">
                                    <li>
                                        <p>排名</p>
                                        <p>项目名称</p>
                                        <p>完成人数</p>
                                    </li>

                                    <li>
                                        <span class="green">1</span>
                                        <a href="" class="blue" target="_blank">
                                            aaaaa
                                        </a>
                                        <span>20</span>
                                    </li>

                                </ul>
                            </div>

                        </td>
                        <td width="448px" style="border-left: 1px solid #F2F2F2;">
                            <div class="content-news-td-inner clearfix">
                                <div class="td-inner-tit clearfix">
                                    <div class="td-inner-tit-line six"></div>
                                    <div class="td-inner-tit-news">
                                        <p>最新资讯</p>
                                        <span>资讯、动态内容</span>
                                    </div>
                                    <a href="###">更多>></a>
                                </div>
                                <!--
                                <div class="cancel-none">
                                    <p>
                                        <img src="{!!url('admin/images/u464.png')!!}"/>
                                        暂无最新活动!
                                    </p>
                                </div>
                                -->
                                <ul class="td-inner-active clearfix">
                                    <li>
                                        <div class="td-inner-active-news">
                                            <p><a href="###">家装厨卫节，满减大抢购-(10月01日-10月31日)</a></p>
                                        </div>
                                        <a class="active-btn" href="###">参加活动</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="consult">

                <div class="consult-message pr">
                    <div class="consult-pic"><img src="{!!url('admin/images/u384.png')!!}"></div>
                    <a href="{!!url('/message')  !!}" >您有<span>@if(!empty($counted)){!! $counted !!}@else 0 @endif</span>条消息</a>
                    <div class="consult-messageList pa">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function(){
            $('.td-inner-tag-nums').each(function(){
                if($.trim($(this).text()).length<3)
                {
                    $(this).css({'width':'18px'});
                }
                if($.trim($(this).text()).length==3)
                {
                    $(this).css({'width':'30px'});
                }
                if($.trim($(this).text()).length>3)
                {
                    $(this).css({'width':'50px'});
                }
            });
        });
    </script>
@stop