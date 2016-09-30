@extends('layout.main')
@section('title')记一笔@stop
@section('style')
    <meta name="csrf-token" content="{!! csrf_token() !!}">
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css" />
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/template.css" />
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/js/lib/fullcalendar/fullcalendar.min.css" />
    <style>
        .remark{
            font-size: 14px;
            border: 1px solid #d1d1d1;
            padding: 10px;
            width: 470px;
            height: 64px;
        }
        .total{
            margin-left: 108px;
            width: 500px;
            border: 1px solid #4da3ec;
            line-height: 59px;
            padding-left: 22px;
        }
        .total em{
            font-size: 16px;
            margin: 0 20px 0 6px;
        }
    </style>
@stop

@section('content')
    <div class="wrap user-center">
        <div class="container clearfix">
            @include('account.common.menu')
            <div class="main tworow" style="height: 863px;">
                <div class="main-inner">
                    <h1 class="section-title tit tit1">
                        @if(empty($book))
                        <div class="use-tpl-btn fr"><div class="txt">使用模板记账</div>
                            <div class="note-tpl" style="display: none;">
                                <table>
                                    <tbody><tr><th>平台</th><th>项目名称</th><th>年化收益</th><th>期限</th><th>还款方式</th><th></th></tr>
                                    @foreach($lists as $tv)
                                        <?php if($tv->rate_unit=='年'){$r=$tv->rate;}else{$r=$tv->rate*12;} ?>
                                    <tr data-id="{!! $tv->id !!}">
                                        <td>{!! $tv->corp_name ?:'--' !!}</td>
                                        <td>{!! $tv->template_name ?:'--' !!}</td>
                                        <td>{!! sprintf('%.2f',$r) !!}%/年</td>
                                        <td>{!! $tv->term or '--' !!}@if($tv->term_unit=='月'){!! $tv->term ?'个月':'' !!}@elseif($tv->term_unit=='日'){!! $tv->term ?'日':'' !!}@endif</td>
                                        <td>{!! $tv->repay !!}</td>
                                        <td><a href="{!! config('app.account_url') !!}/book/template/delete/{!! $tv->id !!}" class="del_button action" data-method="post" data-confirm="确定要删除该记账模板?">删</a></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <i class="icn arr"></i>
                            </div>
                        </div>
                        @endif
                        记一笔
                    </h1>
                    <div class="form-group bindbankcard">
                        <form id="bindbankcard" method="post" data-toggle="ajaxForm">
                            @if(!empty($book->id))
                                <input type="hidden" name="data[id]" value="{!! $book->id or '' !!}">
                            @endif
                            <input type="hidden" name="data[user_id]" value="{!! $user['id'] or '' !!}">
                            <div class="control-group">
                                <label for="real-name">投资平台</label>
                                <input type="text" name="data[corp_name]" class="input-style" value="{!! $book->corp_name or '' !!}" placeholder="输入平台名称必填">
                            </div>
                            <div class="control-group">
                                <label>项目名称</label>
                                <input type="text" name="data[task_name]" class="input-style" value="{!! $book->task_name or '' !!}" placeholder="输入项目名称必填">
                            </div>
                            <div class="autobuy-panel-2 control-group">
                                <label>投资金额</label>
                                <input class="input-style input-size" type="text" name="data[money]" value="{!! $book->money or '' !!}"  placeholder="输入实投金额(不含抵扣)" />
                                <i class="input-icon">元</i>
                            </div>
                            <div class="autobuy-panel-2 control-group">
                                <label>起息日期</label>
                                <input id="valueDate" class="input-style input-size" type="text" name="data[start_time]" value="{!! $book->start_time or '' !!}" onclick="WdatePicker()" placeholder="选择起息时间" />
                                <i class="input-icon iconfont">&#xe689;</i>
                            </div>
                            <div class="control-group">
                                <label>利率</label>
                                <input type="text" name="data[rate]" value="{!! $book->id or '' !!}" class="input-style" placeholder="例:10.8">
                                <label class="control-option">
                                    <input type="radio" name="data[rate_unit]" value="0" @if(empty($book->rate_unit) || (!empty($book->rate_unit)&&$book->rate_unit==0))checked @endif /> 年利率
                                </label>
                                <label class="control-option">
                                    <input type="radio" name="data[rate_unit]" value="1" @if(!empty($book->rate_unit)&&$book->rate_unit==1 )checked @endif /> 日利率
                                </label>
                                <label class="control-option">
                                    <input type="radio" name="data[rate_unit]" value="2" @if(!empty($book->rate_unit)&&$book->rate_unit==2 )checked @endif /> 年利率（按360天计算）
                                </label>
                            </div>
                            <div class="control-group">
                                <label for="">期限</label>
                                <input type="text" name="data[term]" value="{!! $book->term or '' !!}" class="input-style" placeholder="例:6">
                                <label class="control-option">
                                    <input type="radio" name="data[term_unit]" value="0" @if(empty($book->term_unit) || (!empty($book->term_unit)&&$book->term_unit=='月'))checked @endif /> 月
                                </label>
                                <label class="control-option">
                                    <input type="radio" name="data[term_unit]" value="1" @if(!empty($book->term_unit)&&$book->term_unit=='年' )checked @endif /> 年
                                </label>
                            </div>
                            <div class="control-group">
                                <label for="">还款方式</label>
                                <select name="data[repay_type]" class="input-style required">
                                    <option value="1" @if(!empty($book->repay_type)&&$book->repay_type=='1')selected @endif>一次性还本付息</option>
                                    <option value="2" @if(!empty($book->repay_type)&&$book->repay_type=='2')selected @endif>按月付息到期还本</option>
                                    <option value="3" @if(!empty($book->repay_type)&&$book->repay_type=='3')selected @endif>按季付息到期还本</option>
                                    <option value="4" @if(!empty($book->repay_type)&&$book->repay_type=='4')selected @endif>等额本金</option>
                                    <option value="5" @if(!empty($book->repay_type)&&$book->repay_type=='5')selected @endif>等额本息</option>
                                </select>
                            </div>
                            <div class="control-group">
                                <label for="">现金奖励</label>
                                <input type="text" name="data[reward]" value="{!! $book->back_reward or '' !!}" class="input-style" placeholder="选填">
                                <label for="">折扣奖励</label>
                                <input type="text" name="data[discount]" value="{!! $book->discount_reward or '' !!}" class="input-style" placeholder="选填">
                            </div>
                            <div class="control-group">
                                <label for="">管理费</label>
                                <input type="text" name="data[manage_fee]" value="{!! $book->manage_fee or '' !!}" class="input-style" placeholder="输入管理费(选填)">
                                <i class="input-icon">%</i>
                            </div>
                            @if(empty($book))
                            <div class="control-group">
                                <label for="">模板名称</label>
                                <input type="text" name="data[template_name]" value="{!! $book->template_name or '' !!}" class="input-style" placeholder="输入模板名称(选填)">
                                <label class="control-option">
                                    <input type="checkbox" name="data[is_template]" value="1" @if(!empty($book->is_template)&& $book->is_template==1)checked @endif  /> 存为模板
                                </label>
                            </div>
                            @endif
                            <div class="control-group">
                                <label for="">备注</label>
                                <textarea class="remark" name="data[remark]" cols="3" rows="10" placeholder="备注：不超过40字（选填）">{!! $book->remark or '' !!}</textarea>
                            </div>
                            <div class="control-group">
                                <div class="total">预期收益<em class="num1" id="t_profit">0</em>预期利息<em class="num2" id="t_interest">0</em>总奖励<em class="num3" id="t_reward">0</em>实际年化<em class="num1" id="t_rate">0%</em></div>
                            </div>
                            <input type="submit" class="btn-blue btn-l btn-submit" value="提交">
                        </form>
                    </div>
                    <div class="tip tab-rules">
                        <h3 class="title-indent">温馨提示</h3>
                        <div class="tip-main">
                            <ul class="tab-content">
                                <li>1. 为保障您的账户资金安全，绑定银行卡时，您选择的银行卡开户名必须与您实名认证姓名一致；</li>
                                <li><em>2. 请您提供正确的银行卡信息，如果您提供的银行卡信息有误，2元/笔的可提现手续费银行将不予退还；</em></li>
                                <li>3. 禁止套现、洗钱行为，绑定银行卡仅限储蓄卡，不支持信用卡绑定提现；</li>
                                <li>4. 填写银行卡信息时，请确认您的“支行名称”(如上海分行虹口支行)，如您无法确定，请致电您的开户银行客服进行咨询。</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/lib/jquery.form.min.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/ucenter.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/pagination.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/actions.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/form.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/books.js"></script>
    <script src="{!! config('app.url') !!}/vendor/datepicker/WdatePicker.js"></script>
@stop