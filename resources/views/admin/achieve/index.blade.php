@extends('admin.common.layout')
@section('title') 领取任务管理 @stop
@section('style')
    {!!HTML::style('admin/css/lists.css')!!}
    {!!HTML::style('admin/css/dialog.css')!!}
    <style>
        .list_07{width: 10px;padding-left: 20px;color: #333;float: left;margin-top: 20px;}
    </style>
@stop
@section('content')
    <div class="content-all">
        <div class="content clearfix">
            @include('admin.common.sidebar')
            <div class="content-right">
                <div class="content-right-header clearfix">
                    <div class="content-right-header clearfix">
                        <img src="{!!url('admin/images/u5.png')!!}"/>
                        <a href="{!! url('task') !!}">项目管理&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                        <a href="{!! url('achieve') !!}">任务列表</a>
                    </div>
                </div>
                <div class="content-right-tit clearfix">
                    <p><a href="javascript:void(0)" class="at">任务列表</a></p>
                    <a href="{!! config('app.admin_url') !!}/achieve/export" class="buttonA">数据导出</a>
                </div>
                <div class="comment-search clearfix">
                    <form action="{!! url('achieve') !!}" id="filterForm" method="GET">
                        <div class="comment-search-inner">
                            <div class="comment-search-goods">
                                <p>投资者<input type="text" name="realname" value="{!! Input::get('realname') !!}" /></p>
                            </div>
                            <div class="comment-search-person">
                                <p>投资手机号<input type="text" name="mobile" value="{!! Input::get('mobile') !!}" /></p>
                            </div>
                            <button class="comment-search-btn" id="search">搜索</button>
                            <input type="reset" value="重置" onclick="location='/achieve'">
                        </div>
                    </form>
                </div>
                <a data-tab="1" href="javascript:;" id="zs_tab">全部展开</a>
                <div class="source_title">
                    <ul>
                        <li style="width: 10px;"><input type="checkbox" class="checkAll"></li>
                        <li>任务名称</li>
                        <li>投资人</li>
                        <li>投资金额</li>
                        <li>状态</li>
                        <li>操作</li>
                    </ul>
                </div>
                <div class="source_list">
                    <ul>
                        @foreach($lists as $rv)
                            <li class="js_reply_all">
                                <div class="list_07">
                                    <input type="checkbox">
                                </div>
                                <div class="list_02">【{!! $rv->corp->name!!}】{!! $rv->task->title or '' !!}</div>
                                <div class="list_02"> {!! $rv->user->username or '' !!}</div>
                                <div class="list_02">{!! $rv->total or 0 !!}元</div>
                                <div class="list_03">
                                        {!! $rv->status == 0 ? '已领取' : ($rv->status == 1 ? '已审核': '已交任务') !!}
                                </div>
                                <div class="list_03">
                                    @if(!empty($rv->status != 0))
                                    <a data-tab="1" style="float:left;" href="javascript:;" class="zs_tab">展开</a>
                                    @endif
                                    <a  href="{!! url('achieve/create',['id'=>$rv->id]) !!}">审核</a>
                                </div>
                                <div class="reply_row" style="display:none;">
                                    <ul>
                                        <li style="width: 700px;" class="clearfix">
                                            <span style="margin-left: 30px;"></span>
                                            <span style="margin-left: 30px;">ID</span>
                                            <span style="margin-left: 30px;">投资真实用户</span>
                                            <span style="margin-left: 40px;">投资人手机</span>
                                            <span style="margin-left: 30px;">投资金额 </span>
                                            <span style="margin-left: 30px;;">投资订单号</span>
                                            <span style="margin-left: 30px;;">提交时间</span>
                                        @foreach($rv->achieves as $av)
                                            <li style="width: 700px;" class="clearfix">
                                                <span style="margin-left: 30px;"><input type="checkbox"></span>
                                                <span style="margin-left: 30px;">{!! $av->id !!}</span>
                                                <span style="margin-left: 30px;">{!! $av->realname !!}</span>
                                                <span style="margin-left: 40px;">{!! $av->mobile !!}</span>
                                                <span style="margin-left: 30px;">{!! $av->price !!} </span>
                                                <span style="margin-left: 30px;;">{!! $av->order_sn or '---' !!}</span>
                                                <span style="margin-left: 30px;;">{!! $av->created_at or '---' !!}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <ul class="page_info page">
                    {!! $pageHtml !!}
                </ul>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script language="javascript">
        $(".checkAll").click(function () {
            $("[type=checkbox]:enabled").prop("checked", this.checked);
        });
        $('.zs_tab').click(function(){
            if($(this).attr('data-tab')==1){
                $(this).parentsUntil('.js_reply_all').parent().find('.reply_row').show();
                $(this).attr('data-tab',2).text('收起');;
            }else{
                $(this).attr('data-tab',1).text('展开');;
                $(this).parentsUntil('.js_reply_all').parent().find('.reply_row').hide();
            }
        });
        $('#zs_tab').click(function(){
            if($(this).attr('data-tab')==1){
                $(this).attr('data-tab',2).text('全部收起');
                $('.reply_row').show();
            }else{
                $(this).attr('data-tab',1).text('全部展开');
                $('.reply_row').hide();
            }
        });
    </script>
    @stop
