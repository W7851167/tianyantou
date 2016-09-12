@extends('admin.common.layout')
@section('title')提现管理@stop
@section('style')
    {!!HTML::style('admin/css/lists.css')!!}
    {!! HTML::style('admin/css/pop.css') !!}
    {!!HTML::style('admin/css/dialog.css')!!}
    {!!HTML::style('admin/css/form.css')!!}
@stop
@section('content')
    <div class="content-all">
        <div class="content clearfix">
            @include('admin.common.sidebar')
            <div class="content-right">
                <div class="content-right-header clearfix">
                    <div class="content-right-header clearfix">
                        <img src="{!!url('admin/images/u5.png')!!}"/>
                        <a href="{!! url('user') !!}">用户管理&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                        <a href="{!! url('withdraw') !!}">提现管理</a>
                    </div>
                </div>
                <div class="content-right-tit clearfix">
                    <p><a href="javascript:void(0)" class="at">提现列表</a></p>
                </div>
                @if(count($lists) > 0)
                    <form action="">
                        <table class="all_shopping" cellspacing="0">
                            <tr>
                                <th width='65'></th>
                                <th width='65'>用户名</th>
                                <th width='65'>账户名</th>
                                <th width='100'>开户银行</th>
                                {{--<th width='100'>省/市</th>--}}
                                <th width="100">支行名称</th>
                                <th width="150">卡号</th>
                                <th width="80">金额</th>
                                <th width="80">手续费</th>
                                <th width="80">提现时间</th>
                                <th width="80">状态</th>
                                <th>操作</th>
                            </tr>
                            @foreach($lists as $wv)
                                <tr>
                                    <td>
                                        @if($wv->status == 0)
                                        <input type="checkbox" class="withdraw-ids" value="{!! $wv->id or '' !!}">
                                        @endif
                                    </td>
                                    <td>{!! $wv->user->username or ''!!}</td>
                                    <td>{!! $wv->bank->hold_name or ''  !!}</td>
                                    <td>{!! $wv->bank->bank_name or ''  !!}</td>
                                    {{--                                <td>{!! $wv->bank->province or ''  !!}/{!! $wv->bank->city or ''  !!}</td>--}}
                                    <td>{!! $wv->bank->branch_name or ''  !!}</td>
                                    <td>{!! $wv->bank->cardno or ''  !!}</td>
                                    <td>{!! $wv->price or 0.00 !!}</td>
                                    <td>{!! $wv->commission or 0.00 !!}</td>
                                    <td>{!! date('m/d',strtotime($wv->created_at))  !!}</td>
                                    <td>{!! $wv->status == 0 ? '申请中' :  ($wv->status == 1) ? '已派发':'拒绝派发'  !!}</td>
                                    <td>
                                        <a href="{!! url('withdraw/create',['id'=>$wv->id]) !!}">审核</a>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="11">
                                    <input type="checkbox" class="checkAll"
                                           style="float: left;margin-left: 24px;margin-top: 15px;">
                                    <button type="button" class="all-del">删除</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                @else
                    <div class="system-page-none clearfix">
                        <p>{!!HTML::image('cw100_b2b/images/u464.png')!!}您的店铺暂时没有设置导航</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div id="del_menu_icon" style="display:none;">
        <div id="maskLevel"></div>
        <div class="del_icon_box">
            <div class="del_icon_title">
                <h3>提示</h3>
                <a href="javascript:;" onClick="$('#del_menu_icon').hide();">&times;</a>
            </div>
            <div class="del_icon_content">
                <form action="{!! url('withdraw/batch') !!}" method="post" class="base_form">
                    <input type="hidden" name="ids" id="withdraw-id" />
                    <input type="radio" name="status" value="1" checked style="margin-left: 15px;">通过
                    <input type="radio" name="status" value="2" style="margin-left: 15px;">驳回
                    <input class="submit" type="submit" value="确定">
                    <input class="button" type="button" onClick="$('#del_menu_icon').hide();" value="取消">
                </form>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(".checkAll").click(function () {
            $("[type=checkbox]").prop("checked", this.checked);
        });
        $('.all-del').click(function () {
            var ids = [];
            $(".withdraw-ids:checked").each(function(){
                ids.push($(this).val());
            });
            console.log(ids.length);
            if(ids.length < 1){
                error('未选中任何提现记录!');
            } else{
                $('#del_menu_icon').show();
                $('#del_menu_icon').find('#withdraw-id').val(ids.join(','));
            }
        })
    </script>
@stop
