@extends('admin.common.layout')
@section('title') 添加红包 @stop
@section('style')
    {!!HTML::style('admin/css/dialog.css')!!}
    {!!HTML::style('admin/css/form.css')!!}
    {!!HTML::style('vendor/datepicker/skin/WdatePicker.css')!!}
    {!!HTML::script('vendor/datepicker/WdatePicker.js')!!}
@stop
@section('content')
    <div class="content-all">
        <div class="content clearfix">
            @include('admin.common.sidebar')
            <div class="content-right ">
                <div class="content-right-header clearfix">
                    <img src="{!!url('admin/images/u5.png')!!}"/>
                    <a href="{!! url('coupon') !!}">红包管理&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                    <a href="{!! url('coupon/create') !!}">添加/修改红包</a>
                </div>
                <form  method="post" class="base_form">
                    @if(!empty($coupon->id))
                        <input type="hidden" name="data[coupon_id]" value="{!! $coupon->id !!}">
                    @endif
                    {!! csrf_field() !!}


                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">发布公司：</div>
                            <div>
                                <select name="data[corp_id]" style="width: 240px;">
                                    <option value="0">请选择</option>
                                    <option value="39">天眼投</option>
                                    @if(!empty($corp))
                                        @foreach($corp as $cv)
                                            <option value="{!! $cv->id !!}" @if(!empty($task->corp_id) && $task->corp_id==$cv->id) selected @endif>{!! $cv->name !!}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>奖励金额：</div>
                            <div><input type="text" name = "data[moneys]" placeholder="比如 100元" value="{!! $task->sued or 0 !!}" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')">元</div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>最低月份：</div>
                            <div><input type="text" name = "data[month]" placeholder="比如 1月" value="{!! $task->limit or '' !!}" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')">月</div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>最低投资：</div>
                            <div><input type="text" name = "data[sum]" placeholder="比如 10000元" value="{!! $task->sued or '' !!}" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')">元</div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">针对平台：</div>
                            <div>
                                <select name="data[pertinence]" style="width: 240px;">
                                    <option value="0">不针对</option>
                                    @if(!empty($corp))
                                        @foreach($corp as $cv)
                                            <option value="{!! $cv->id !!}" @if(!empty($task->corp_id) && $task->corp_id==$cv->id) selected @endif>{!! $cv->name !!}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>开始时间：</div>
                            <div>
                                <input type="text" name = "data[start_time]"  class="Wdate"
                                       onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd'})" value="{!! date('Y-m-d',!empty($task->start_time) ? $task->start_time : time())!!}">
                            </div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>结束时间：</div>
                            <div>
                                <input type="text" name = "data[over_time]" class="Wdate"
                                       onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd'})" value="{!! date('Y-m-d',!empty($task->end_time) ? $task->end_time : strtotime('+30days'))!!}">
                            </div>
                        </div>

                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>是否新手红包：</div>
                            <div>
                                <input type="radio" value="0" name="nature" checked />不是
                                <input type="radio" value="1" name="nature" />是的
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
@section('script')
    <span id="queueID"></span>
    {!! HTML::script('/vendor/uploadify/jquery.uploadify.js') !!}
    {!!HTML::script('vendor/validate/jquery.validate.js')!!}
    <script language="javascript">


        $(':radio').click(function(){
            $('#home-show-position').css('display','none');
            if($(this).val() == 1) {
                $('#home-show-position').css('display','block');
            }
        });
    </script>
@stop