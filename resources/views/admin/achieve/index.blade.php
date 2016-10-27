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
                    <p><a href="{!! url('achieve',['status'=>0]) !!}" @if(isset($status) && $status == 0)class="at" @endif>待审核</a></p>
                    <p><a href="{!! url('achieve',['status'=>1]) !!}" @if(!empty($status) && $status == 1) class="at" @endif>已审核</a></p>
                    <p><a href="{!! url('achieve',['status'=>2]) !!}" @if(!empty($status) && $status == 2) class="at" @endif>已驳回</a></p>
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
                <form class="base_form">
                @if(isset($status) && $status == 0)
                <div style="margin-left: 50px;">
                    <input type="checkbox" name="selectAll" id="selectAll">全选
                    <input type="button" class="comment-search-btn" name="checked" value="通过">
                    <input type="button" class="comment-search-btn" name="unchecked" value="驳回">
                </div>
                @endif
                <table class="all_shopping" cellspacing="0">
                    <tr>
                        @if(isset($status) && $status == 0)
                         <th width='64'>ID</th>
                        @endif
                        <th width='100'>平台名称</th>
                        <th width="100">注册用户</th>
                        <th width="100">注册手机</th>
                        <th width="100">投资人姓名</th>
                        <th width="100">投资人电话</th>
                        <th width="100">投资金额</th>
                        <th width="100">投资收益</th>
                        <th width="100">投资期限</th>
                        @if(!isset($status))
                        <th width="100">状态</th>
                        @endif
                        <th>操作</th>
                    </tr>
                    @if(!empty($lists))
                        @foreach($lists as $av)
                            <tr class="js_reply_all">
                                @if(isset($status) && $status == 0)
                                <td><input type="checkbox" name="ids[]" value="{!! $av->id !!}"> </td>
                                @endif
                                <td>{!! $av->corp->name or ''!!}</td>
                                <td>{!! $av->user->username or '' !!}</td>
                                <td>{!! $av->user->mobile or '' !!}</td>
                                <td>{!! $av->realname or '' !!}</td>
                                <td>{!! $av->mobile or '' !!}</td>
                                <td>{!! $av->income or '0.00' !!}元</td>
                                <td>{!! $av->price or '0.00' !!}元</td>
                                <td>{!! $av->term or 0 !!}{!! $av->task->term_unit == 0 ? '天' : ($av->task->term_unit == 1 ? '个月' : '年')!!}</td>
                                @if(!isset($status))
                                <td>
                                    @if($av->status == 0) 待审核 @endif
                                    @if($av->status == 2) 已驳回 @endif
                                    @if($av->status == 1) 已审核 @endif
                                </td>
                                @endif
                                <td>
                                    @if($status == 0)
                                            <a href="{!! url('achieve/create',['id'=>$av->id]) !!}">审核</a>
                                    @endif
                                    @if($status == 1)
                                            ----
                                    @endif
                                    @if($status == 2)
                                        {!! $av->remark or '' !!}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        @endif
                    </table>
                    </form>
                <ul class="page_info page">
                    {!! $pageHtml !!}
                </ul>

            </div>
        </div>
    </div>
@stop
@section('script')
    <script language="javascript">
        $(function(){
            $('#selectAll').click(function(){
                $("[name=ids\\[\\]]:checkbox").prop('checked', this.checked);
            });
            $('input[name="checked"]').click(function(){
            });
        });
    </script>
    @stop
