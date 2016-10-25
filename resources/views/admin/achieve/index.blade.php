@extends('admin.common.layout')
@section('title') 项目信息 @stop
@section('style')
    {!!HTML::style('admin/css/lists.css')!!}
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
                        <a href="{!! url('task') !!}">项目列表</a>
                    </div>
                </div>

                <div class="content-right-tit clearfix">
                    <p><a href="{!! url('achieve') !!}" @if(!isset($status))class="at" @endif>所有</a></p>
                    <p><a href="{!! url('achieve',['status'=>0]) !!}" @if(isset($status) && $status == 0)class="at" @endif>已领取</a></p>
                    <p><a href="{!! url('achieve',['status'=>2]) !!}" @if(!empty($status) && $status == 2)class="at" @endif>待审核</a></p>
                    <p><a href="{!! url('achieve',['status'=>1]) !!}" @if(!empty($status) && $status == 1) class="at" @endif>已审核</a></p>
                    <p><a href="{!! url('achieve',['status'=>3]) !!}" @if(!empty($status) && $status == 3) class="at" @endif>已驳回</a></p>
                    <p><a href="{!! url('achieve',['status'=>4]) !!}" @if(!empty($status) && $status == 4) class="at" @endif>已完成</a></p>
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
                <table class="all_shopping" cellspacing="0">
                    <tr>
                        <th width='100'>平台名称</th>
                        <th width='280'>任务名称</th>
                        <th width="100">注册用户</th>
                        <th width="100">注册手机</th>
                        <th width="100">投资金额</th>
                        @if(!isset($status))
                        <th width="100">状态</th>
                        @endif
                        <th>操作</th>
                    </tr>
                    @if(!empty($lists))
                        @foreach($lists as $rv)
                            <tr class="js_reply_all">
                                <td>{!! $rv->corp->name!!}}</td>
                                <td>{!! $rv->task->title or '' !!}</td>
                                <td>{!! $rv->user->username or '' !!}</td>
                                <td>{!! $rv->user->mobile or '' !!}</td>
                                <td>{!! $rv->total or 0 !!}元</td>
                                @if(!isset($status))
                                    <td>
                                        @if($rv->status == 0) 已领取 @endif
                                        @if($rv->status == 2) 待审核 @endif
                                        @if($rv->status == 1) 已审核 @endif
                                        @if($rv->status == 3) 已驳回 @endif
                                        @if($rv->status == 4) 已完成 @endif
                                    </td>
                                @endif
                                <td>
                                    @if($rv->status == 0) --- @endif
                                    @if($rv->status == 2)
                                            <a href="{!! url('achieve/create',['id'=>$rv->id]) !!}">审核</a>
                                            <a data-tab="1"  href="javascript:;" class="zs_tab">展开</a>
                                    @endif
                                    @if($rv->status == 1)
                                            <a href="{!! url('achieve/create',['id'=>$rv->id]) !!}">查看</a>
                                    @endif
                                </td>
                            </tr>
                            @if($rv->status == 2)
                            <tr class="reply_row" style="display:none;">
                                <td @if(!isset($status)) colspan="7" @else colspan="6" @endif>
                                    <table cellspacing="0" border="1">
                                    <tr>
                                        <th>ID</th>
                                        <th>投资用户</th>
                                        <th>投资人手机</th>
                                        <th>投资金额 </th>
                                        <th>投资订单号</th>
                                        <th>提交时间</th>
                                    </tr>
                                     @foreach($rv->achieves as $av)
                                      <tr>
                                        <td>{!! $av->id !!}</td>
                                        <td>{!! $av->realname !!}</td>
                                        <td>{!! $av->mobile !!}</td>
                                        <td>{!! $av->price !!} </td>
                                        <td>{!! $av->order_sn or '---' !!}</td>
                                        <td>{!! $av->created_at or '---' !!}</td>
                                      </tr>
                                        @endforeach
                                    </table>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                        @endif
                    </table>
                <ul class="page_info page">
                    {!! $pageHtml !!}
                </ul>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script language="javascript">
        $('.zs_tab').click(function(){
            if($(this).attr('data-tab')==1){
                console.log( $(this).parentsUntil('.js_reply_all').parent().html());
                $(this).parentsUntil('.js_reply_all').parent().next().show();
                $(this).attr('data-tab',2).text('收起');;
            }else{
                $(this).attr('data-tab',1).text('展开');;
                $(this).parentsUntil('.js_reply_all').parent().siblings('.reply_row').hide();
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
