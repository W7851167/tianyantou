@extends('layout.main')
@section('title')提现@stop
@section('style')
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css" />
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/js/lib/fullcalendar/fullcalendar.min.css" />
@stop

@section('content')
<div class="wrap user-center">
    <div class="container clearfix">
        @include('account.common.menu')
        <div class="main tworow" style="height: 1420px;">

            <div class="main-inner">
                <ul class="page-switch page-double clearfix">
                    <li class="active"><a href="{!! config('app.account_url') !!}/wallet/withdraw.html">我要提现</a></li>
                    <li><a href="{!! config('app.account_url') !!}/wallet/withdrawlist.html">提现记录</a></li>
                </ul>

                <div class="cont-box-wrap">
                    <div class="form-group withdraw-deposit">
                        <form method="post" autocomplete="off" class="">
                            {!! csrf_field() !!}
                            <input type="hidden" name="user_id" value="{!! $this->user['id'] or '' !!}">
                            <input type="hidden" name="bank_id" value="{!! $bank->id or '' !!}">
                            <div class="control-group">
                                <label for="bankcard">提现银行</label>
                                <div class="card-sketch">
                                    <div class="card-img"><img src="{!! config('app.static_url') !!}/images/brand/601288.png"></div>
                                    <div class="card-id">银行卡号:{!! substr_replace($bank->cardno,'***************',0,14) !!}</div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="bankcard">账户余额:</label>
                                <span><em id="account-balance" data-amount="{!! $money->money or '0.00' !!}">¥{!! $money->money or '0.00' !!}</em></span>
                                <span style="display:none;" id="account-valid-cash" data-amount="{!! $money->money or '0.00' !!}"></span>
                            </div>
                            <div class="control-group">
                                <label for="bankcard">提现金额:</label>
                                <input type="text" class="input-style" name="price" autocomplete="off" id="withdrawAmount" placeholder="请先输入提现金额" value="">
                                <i class="input-icon">元</i>
                                <!-- <a href="{!! config('app.static_url') !!}/shop.html" target="_blank">获取提现券</a> -->
                                <a href="{!! config('app.account_url') !!}/shop/" target="_blank">积分兑换提现券，免费提现！</a>

                                <input type="hidden" name="use_code" value="" id="use_code">

                                <div class="msg-wrap" style="display:block">
                                    <div style="color:#646567;"><span>单笔提现金额：100元~20万元</span></div>
                                </div>
                            </div>
                            <!--  提现明细 -->
                            <div class="deposit-detail" style="display:none;">
                                <ul>
                                    <li><span class="label">提现手续费：</span><b style="color:red;">2</b>元<i class="iconfont">&#xe629;</i></li>
                                    <li><span class="label">银行卡实际到账金额：</span><b></b>元</li>
                                    <li><span class="label">账号提现后剩余金额：</span><b></b>元</li>
                                </ul>
                                <i class="triangle-outer"></i>
                                <i class="triangle-inner"></i>
                                <p class="depoit-tips" style="display: none;">提取手续费：每5万元收取2元提现费(不足5万元按2元收取)。</p>
                            </div>
                            <div class="control-group">
                                <label for="bankcard">交易密码:</label>
                                <input type="password" class="input-style" name="tradePassword" value="">
                                <a href="{!! config('app.account_url') !!}/safe.html">忘记交易密码?</a>
                                <div class="error" style="margin-left:100px;"></div>
                            </div>
                            <input type="submit" class="btn-blue btn-l btn-submit" value="提现">
                        </form>
                    </div>

                    <div class="cont-box-wrap">
                        <div class="tab click-tab tab-rules">
                            <ul class="tab-nav clearfix">
                                <li class="active"><a href="javascript:void(0);">温馨提示</a></li>
                                <li class=""><a href="javascript:void(0);">常见问题</a></li>
                            </ul>
                            <div class="tab-main">
                                <div class="active">
                                    <ul class="tab-content">
                                        <li>1. 首次提现，请先绑定提现银行卡；
                                            <a href="{!! config('app.account_url') !!}/bankcard.html" class="link footnote-link" target="_blank">马上绑卡&gt;&gt;</a></li>
                                        <li>2. 到账时效参考<br>
                                            <em style="color:#646567;">工作日申请提现：</em>
                                            <table border="1" class="table table-bordered" style="border:none;">
                                                <tbody>
                                                <tr>
                                                    <td>申请提现时间</td>
                                                    <td>预计处理时间</td>
                                                    <td>预计到卡时间</td>
                                                </tr>
                                                <tr>
                                                    <td>00:00-10:00</td>
                                                    <td>10:30</td>
                                                    <td>12:00</td>
                                                </tr>
                                                <tr>
                                                    <td>10:00-13:30</td>
                                                    <td>14:00</td>
                                                    <td>17:00</td>
                                                </tr>
                                                <tr>
                                                    <td>13:30-24:00</td>
                                                    <td>次日10:30</td>
                                                    <td>次日12:00</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <em style="color:#646567;">非工作日申请提现：</em><br>节假日等非工作日的提现申请（包含周五的13:30~24:00），将在收假后第一个工作日的10:00统一处理，预计当天12:00到账；
                                        </li>
                                        <li>3.
                                            实际到账时间：具体到账时间视银行实际收款时间而定，到账时间一般为T+1工作日内（为了确保您的款项尽快到账，推荐使用以下银行：工商银行、建设银行、招商银行、中国银行、交通银行、广发银行、民生银行、平安银行、浦发银行、兴业银行、邮政储蓄银行）；
                                        </li>
                                        <li>4. 单笔提现金额：100元~20万元；每日提现总额不能高于200万元；</li>
                                        <li>5. 提现费按每5万收取2元提现服务费，不足5万按5万计，服务费从提现款项中扣除；</li>
                                        <li>6. 提现前请确保提交的银行卡信息正确，包括开户行所在省、市、支行等信息，以免提现失败给您造成不便；</li>
                                        <li>7. 禁止洗钱、信用卡套现、虚假交易、频繁的非正常投资等资金充提行为，一经发现，天眼投将有权采取暂停或关闭会员账号等措施，且无需承担任何责任。</li>
                                    </ul>
                                </div>
                                <div>
                                    <ul class="tab-content">
                                        <li>1. 提现为什么要收取手续费？<br>答：提现费由第三方支付收取，由用户承担，可提现金额之内提现费2元/笔。</li>
                                        <li>2. 天眼投处理提现时间？<br>答：我们将在1至2个工作日(国家节假日除外)之内处理您提交的提现申请。请用户务必于每个工作日的13:30之前提交提现申请，每个工作日13:30之后提交的提现申请在第二个工作日进行处理。
                                        </li>
                                        <li>3. 提现到帐时间？<br>答：一般银行会在审核通过后次日（T+1）到账。有些银行会在审核通过后的2-3个工作日到帐。具体到账时间以第三方支付的到账时间为准。
                                        </li>
                                        <li>4. 为什么提现失败了还收了手续费？<br>答：请检查您绑定的银行卡信息，如果您提供的银行卡信息有误，2元/笔的可提现手续费银行将不予退还。</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
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
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/tab.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/withdraw.js"></script>
@stop
