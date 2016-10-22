@extends('admin.common.layout')
@section('title')提现操作@stop
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
                    <a href="{!! url('user') !!}">用户管理&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                    <a href="javascript:void(0)">提现操作</a>
                </div>
                <form  method="post" class="base_form">
                    {!! csrf_field() !!}
                    <input type="hidden" name="data[id]" value="{!! $withdraw->id !!}">
                    <input type="hidden" name="data[user_id]" value="{!! $withdraw->user_id !!}">
                    <div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">用户：</div>
                            <div><input type="text" name="username" value="{!! $withdraw->user->username !!}"  disabled></div>
                        </div>
                        @if(!empty($withdraw->bank))
                            @if($withdraw->bank->type == 0)
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">开户名：</div>
                            <div><input type="text" name="hold_name" value="{!! $withdraw->bank->hold_name !!}"  disabled></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">开户银行：</div>
                            <div><input type="text" name="bank_name" value="{!! $withdraw->bank->bank_name !!}"  disabled></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">省/市：</div>
                            <div><input type="text" name="area" value="{!! $withdraw->bank->province !!}/{!! $withdraw->bank->city !!}"  disabled></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">开户支行：</div>
                            <div><input type="text" name="branch_name" value="{!! $withdraw->bank->branch_name !!}"  disabled></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">开户卡号：</div>
                            <div><input type="text" name="cardno" value="{!! $withdraw->bank->cardno !!}"  disabled></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">提现金额：</div>
                            <div><input type="text" name="data[price]" value="{!! $withdraw->price or 0 !!}"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">手续费：</div>
                            <div><input type="text" name="data[commission]" value="{!! $withdraw->commission or 0 !!}"></div>
                        </div>
                        @else
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">支付宝账户名：</div>
                            <div><input type="text" name="hold_name" value="{!! $withdraw->bank->hold_name !!}"  disabled></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">支付宝账户：</div>
                            <div><input type="text" name="cardno" value="{!! $withdraw->bank->cardno !!}"  disabled></div>
                        </div>
                            @endif
                        @endif
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">审核：</div>
                            <div>
                                <input type="radio" name="data[status]" value="1" checked> 通过
                                <input type="radio" name="data[status]" value="2"> 驳回
                            </div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">说明：</div>
                            <div><textarea name="data[reason]" class="addText">{!! $withdraw->reason or '' !!}</textarea></div>
                        </div>
                    </div>
                    @if($withdraw->status ==0)
                    <div class="w928">
                        <div class="button">
                            <input class="submit" type="submit"  value="保存">
                        </div>
                    </div>
                   @endif
                </form>

            </div>
        </div>
    </div>
    <!--添加相关推荐--->
    <!--选点-->
@stop
