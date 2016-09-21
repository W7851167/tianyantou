@extends('admin.common.layout')
@section('title') 任务完成 @stop
@section('style')
    {!!HTML::style('admin/css/dialog.css')!!}
    {!!HTML::style('admin/css/form.css')!!}
@stop
@section('content')
    <div class="content-all">
        <div class="content clearfix">
            @include('admin.common.sidebar')
            <div class="content-right ">
                <div class="content-right-header clearfix">
                    <img src="{!!url('admin/images/u5.png')!!}"/>
                    <a href="{!! url('task') !!}">项目管理&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                    <a href="javascript:void(0)">任务完成审核</a>
                </div>
                <table class="all_shopping" cellspacing="0">
                    <tr>
                        <th width='120'>平台订单</th>
                        <th width="150">真实姓名</th>
                        <th width="150">手机</th>
                        <th width="150">投资额</th>
                        <th width="150">投标期限</th>
                    </tr>
                        @foreach($receive->achieves as $av)
                            <tr>
                                <td>{!! $av->order_sn or '---' !!}</td>
                                <td>{!! $av->realname or '---'!!}</td>
                                <td>{!! $av->mobile or '---' !!}</td>
                                <td>{!! $av->price or 0.00 !!}</td>
                                <td>{!! $av->term!!} {!! $receive->task->term_unit == 0 ? '天' : ($receive->task->term_unit == 1 ? '个月' : '年')!!}</td>
                            </tr>
                        @endforeach
                </table>
                <div style="margin-top: 30px;margin-left: 30px;"><h2>统计信息</h2></div>
                <table class="all_shopping" cellspacing="0">
                    <tr>
                        <th width='120'>平台</th>
                        <th width="150">任务</th>
                        <th width="100">投资人</th>
                        <th width="90">总额</th>
                        <th width="90">收入</th>
                        <th width="90">期限</th>
                        <th width="90">天眼投年化率</th>
                        <th width="150">提交时间</th>
                    </tr>
                        <tr>
                            <td>{!! $receive->corp->name or '' !!}</td>
                            <td>{!! $receive->task->title or '' !!}</td>
                            <td>{!! $receive->user->username or '' !!}</td>
                            <td>{!! $receive->total or 0.00 !!}</td>
                            <td>{!! $receive->income or 0.00 !!}</td>
                            <td>{!! $receive->task->term or 0!!} {!! $receive->task->term_unit == 0 ? '天' : ($receive->task->term_unit == 1 ? '个月' : '年')!!}</td>
                            <td>{!! $receive->mratio or 0.00 !!}</td>
                            <td>{!! date('Y-m-d H:i:s',$receive->commit_time)!!}</td>
                        </tr>
                </table>
                <div style="margin-top: 30px;margin-left: 30px;"><h2> 审核信息 </h2>
                    <h3>
                        收益= 平台期限 X 投资额度 X 天眼投年化率 / 100 {!! $receive->task->term_unit == 0 ? '/ 365天' : ($receive->task->term_unit == 1 ? '/ 12月' : '') !!}
                    </h3>
                </div>
                <form  method="post" class="base_form">
                    {!! csrf_field() !!}
                    @if(!empty($receive))
                        <input type="hidden" name="data[id]" value="{!! $receive->id !!}">
                    @endif
                    <div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">审核：</div>
                            <div>
                                <input type="radio" name="data[status]"  value="1" @if($receive->status ==1 || $receive->status == 2) checked @endif>审核通过
                                <input type="radio" name="data[status]"  value="2" @if($receive->status ==3) checked @endif>驳回
                            </div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">说明：</div>
                            <div><textarea class="addText" name="data[intro]">{!! $receive->intro or '' !!}</textarea></div>
                        </div>
                    </div>

                    <div class="w928" @if($receive->status == 0 || $receive->status == 1) style="display: none;" @endif>
                        <div class="button">
                            <input class="submit" type="submit"  value="提交">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--添加相关推荐--->
    <!--选点-->
@stop

