@extends('admin.common.layout')
@section('title') 创建项目 @stop
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
                    <a href="{!! url('task/create') !!}">创建/编辑项目</a>
                </div>
                <form  method="post" class="base_form">
                    @if(!empty($task->id))
                        <input type="hidden" name="data[id]" value="{!! $task->id !!}">
                    @endif
                    {!! csrf_field() !!}
                    <div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>项目名称：</div>
                            <div><input type="text" name="data[title]" value="{!! $task->title or '' !!}"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">选择公司：</div>
                            <div>
                                <select name="data[corp_id]" style="width: 240px;">
                                    <option value="0">请选择</option>
                                    @if(!empty($corps))
                                        @foreach($corps as $cv)
                                            <option value="{!! $cv->id !!}" @if(!empty($task->corp_id)) selected @endif>{!! $cv->name !!}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>标总额：</div>
                            <div><input type="text" name= "data[total]" placeholder="单位元" value="{!! $task->total or 0 !!}">元</div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>单标限制：</div>
                            <div><input type="text" name = "data[limit]" placeholder="比如 1000元" value="{!! $task->limit or 0 !!}">元</div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>起诉金额：</div>
                            <div><input type="text" name = "data[sued]" placeholder="比如 200元" value="{!! $task->sued or 0 !!}">元</div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>状态：</div>
                            <div>
                                <input type="radio" name = "data[status]" value="0" @if(empty($task) || $task->status == 0) checked @endif>待发布
                                <input type="radio" name = "data[status]" value="1" @if(!empty($task) && $task->status == 1) checked @endif>已发布
                                <input type="radio" name = "data[status]" value="2" @if(!empty($task) && $task->status == 2) checked @endif>已结束
                            </div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>年转化率：</div>
                            <div><input type="text" name = "data[ratio]" placeholder="浮点数比如12.91" value="{!! $task->ratio or 0 !!}"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>本站年转化率：</div>
                            <div><input type="text" name = "data[mratio]" placeholder="本站增加的转化率"  value="{!! $task->mratio or 0 !!}"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>期限：</div>
                            <div><input type="text" name = "data[term]" placeholder="比如7天/3个月" value="{!! $task->term or 0 !!}"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>保障方式：</div>
                            <div><input type="text" name = "data[ensure]" placeholder="比如 第三方担保"  value="{!! $task->ensure or 0 !!}"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>还款方式：</div>
                            <div><input type="text" name = "data[repay]" placeholder="比如 付本还息"  value="{!! $task->repay or 0 !!}"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>计息方式：</div>
                            <div><input type="text" name = "data[accrual]" placeholder="比如 (T+0到账\T+1到账)"  value="{!! $task->accrual or 0 !!}"></div>
                        </div>
                    </div>
                    <div class="w928">
                        <div class="button">
                            <input class="submit" type="submit"  value="提交">
                            <input class="return" type="reset" value="重置">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!--添加相关推荐--->
    <!--选点-->
@stop

