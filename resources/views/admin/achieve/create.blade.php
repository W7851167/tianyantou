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
                        <th width="150">完成时间</th>
                    </tr>
                        @foreach($receive->achieves as $av)
                            <tr>
                                <td>{!! $av->order_sn or '---' !!}</td>
                                <td>{!! $av->realname or '---'!!}</td>
                                <td>{!! $av->mobile or '---' !!}</td>
                                <td>{!! $av->price or 0.00 !!}</td>
                                <td>{!! $av->created_at or '---' !!}</td>
                            </tr>
                        @endforeach
                </table>
                <form  method="post" class="base_form">
                    {!! csrf_field() !!}
                    @if(!empty($receive))
                        <input type="hidden" name="data[id]" value="{!! $receive->id !!}">
                    @endif
                    <div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>平台名称：</div>
                            <div><input type="text" name="data[platform]"  value="{!! $receive->corp->name or '' !!}" disabled></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>任务名称：</div>
                            <div><input type="text" name="data[name]"  value="{!! $receive->task->title or '' !!}" disabled></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>投资人：</div>
                            <div><input type="text" name="data[user]" value="{!! $receive->user->username or '' !!}" disabled></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>交任务总额：</div>
                            <div><input type="text" name="data[total]" value="{!! $receive->total or 0.00 !!}" disabled></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">审核：</div>
                            <div>
                                <input type="radio" name="data[status]"  value="1" @if($receive->status ==1) checked @endif>审核
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

