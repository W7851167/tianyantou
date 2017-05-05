@extends('admin.common.layout')
@section('title') 档案 @stop
@section('style')
    {!!HTML::style('admin/css/lists.css')!!}
    {!!HTML::style('admin/css/dialog.css')!!}
    {!!HTML::style('vendor/datepicker/skin/WdatePicker.css')!!}
    {!!HTML::script('vendor/datepicker/WdatePicker.js')!!}
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
                        <a href="{!! url('corp') !!}">公司管理&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                        <a href="javascript:void(0);">{!! $corp->name or '管理' !!}</a>
                    </div>
                </div>

                <div class="content-right-tit clearfix">
                    <p><a href="{!! url('corp/manage',['id'=>$corp->id]) !!}">公司介绍</a></p>
                    <p><a href="{!! url('corp/term',['id'=>$corp->id]) !!}">团队管理</a></p>
                    <p><a href="{!! url('corp/safety',['id'=>$corp->id]) !!}">安全保障</a></p>
                    <p><a href="{!! url('corp/photos',['id'=>$corp->id]) !!}">图片资料</a></p>
                    <p><a href="{!! url('corp/news',['id'=>$corp->id]) !!}">最新动态</a></p>
                    <p><a href="{!! url('corp/charts',['id'=>$corp->id]) !!}" >雷达图</a></p>
                    <p><a href="{!! url('corp/honour',['id'=>$corp->id]) !!}">企业荣誉</a></p>
					<p><a href="{!! url('corp/archives',['id'=>$corp->id]) !!}"  class="at">档案</a></p>
                </div>
                <form  method="post" class="base_form">
                    {!! csrf_field() !!}
                    <div class="infospaceAddContent clearfix">
                        <div class="infospaceAddLeft"><span>*</span>投资服务费：</div>
                        <div><input type="text" name="data[icp_invest_cost]" placeholder="投资服务费" value="{!! $metas['icp_invest_cost'] or '' !!}"></div>
                    </div>
                    <div class="infospaceAddContent clearfix">
                        <div class="infospaceAddLeft"><span>*</span>提现到账：</div>
                        <div><input type="text" name="data[icp_cash_in]" placeholder="提现到账" value="{!! $metas['icp_cash_in'] or '' !!}"></div>
                    </div>
                    <div class="infospaceAddContent clearfix">
                        <div class="infospaceAddLeft"><span>*</span>提现门槛：</div>
                        <div><input type="text" name="data[icp_cash_door]" placeholder="提现门槛" value="{!! $metas['icp_cash_door'] or '' !!}"></div>
                    </div>
                    <div class="infospaceAddContent clearfix">
                        <div class="infospaceAddLeft"><span>*</span>vip费用：</div>
                        <div><input type="text" name="data[icp_vip_cost]" placeholder="vip费用" value="{!! $metas['icp_vip_cost'] or '' !!}"></div>
                    </div>
                    <div class="infospaceAddContent clearfix">
                        <div class="infospaceAddLeft"><span>*</span>起息时间：</div>
                        <div><input type="text" class="Wdate" name="data[icp_carry_time]" placeholder="起息时间" value="{!! $metas['icp_carry_time'] or '' !!}" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd'})"></div>
                    </div>
                    <div class="infospaceAddContent clearfix">
                        <div class="infospaceAddLeft"><span>*</span>回款时间：</div>
                        <div><input type="text" class="Wdate" name="data[icp_payment_time]" placeholder="回款时间" value="{!! $metas['icp_payment_time'] or '' !!}" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd'})"></div>
                    </div>
                    <div class="infospaceAddContent clearfix">
                        <div class="infospaceAddLeft"><span>*</span>托管存管：</div>
                        <div><input type="text" name="data[icp_custody]" placeholder="托管存管" value="{!! $metas['icp_custody'] or '' !!}"></div>
                    </div>
					<div class="infospaceAddContent clearfix">
                        <div class="infospaceAddLeft"><span>*</span>逾期/坏账保障：</div>
                        <div><input type="text" name="data[icp_overdue_ensure]" placeholder="逾期/坏账保障" value="{!! $metas['icp_overdue_ensure'] or '' !!}"></div>
                    </div>
					<div class="infospaceAddContent clearfix">
                        <div class="infospaceAddLeft"><span>*</span>逾期垫付：</div>
                        <div><input type="text" name="data[icp_overdue_pay]" placeholder="逾期垫付" value="{!! $metas['icp_overdue_pay'] or '' !!}"></div>
                    </div>
					<div class="infospaceAddContent clearfix">
                        <div class="infospaceAddLeft"><span>*</span>债券转账：</div>
                        <div><input type="text" name="data[icp_bond]" placeholder="债券转账" value="{!! $metas['icp_bond'] or '' !!}"></div>
                    </div>
                    <div class="w928">
                        <div class="button">
                            <input class="submit" type="submit"  value="保存">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
