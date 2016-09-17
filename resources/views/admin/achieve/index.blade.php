@extends('admin.common.layout')
@section('title') 领取任务管理 @stop
@section('style')
    {!!HTML::style('admin/css/lists.css')!!}
    {!!HTML::style('admin/css/dialog.css')!!}
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
                <a data-tab="1" href="javascript:;" id="zs_tab">全部展开</a>
                <div class="source_title">
                    <ul>
                        <li>任务名称</li>
                        <li>&nbsp;</li>
                        <li>投资人</li>
                        <li>状态</li>
                        <li>操作</li>
                    </ul>
                </div>
                <div class="source_list">
                    <ul>
                        @foreach($lists as $rv)
                            <li class="js_reply_all">
                                <div class="list_01">【{!! $rv->corp->name!!}】{!! $rv->task->title or '' !!}</div>
                                <div class="list_02">
                                    <span class="number_gray">
                                      {!! $rv->user->username or '' !!}/{!! $rv->total or 0 !!}元
                                    </span>
                                </div>
                                <div class="list_03">
                                    <span class="number_gray">
                                        {!! $rv->status == 0 ? '已领取' : ($rv->status == 1 ? '已审核': '已交任务') !!}
                                    </span>
                                </div>
                                <div class="list_03">
                                    @if(!empty($rv->status != 0))
                                    <a data-tab="1" style="float:left;" href="javascript:;" class="zs_tab">展开</a>
                                    @endif
                                    <a  href="{!! url('achieve/create',['id'=>$rv->id]) !!}">审核</a>
                                </div>
                                <div class="reply_row" style="display:none;">
                                    <ul>
                                        @foreach($rv->achieves as $av)
                                            <li style="width: 600px;" class="clearfix">
                                                <span style="margin-left: 30px;">{!! $av->id !!}</span>
                                                <span style="margin-left: 30px;">{!! $av->realname !!}</span>
                                                <span style="margin-left: 30px;">{!! $av->mobile !!}</span>
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
