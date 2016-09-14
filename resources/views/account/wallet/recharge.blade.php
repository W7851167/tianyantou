@extends('layout.main')
@section('style')
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css?ver=20160431006" />
@stop

@section('content')
<div class="wrap user-center">
    <div class="container clearfix">
        @include('account.common.menu')
        <div class="main tworow">

            <div class="main-inner">
                <ul class="page-switch page-double clearfix">
                    <li  class="active"><a href="https://account.touzhijia.com/wallet/recharge.html">我要充值</a></li>
                    <li ><a href="https://account.touzhijia.com/wallet/rechargelist.html">充值记录</a></li>
                </ul>


                <div class="cont-box-wrap">
                    <div class="form-group recharge">
                        <form  name="bankdirect" action="https://pay.touzhijia.com/v2/order"  target="_blank" >
                            <dl class="control-group">
                                <dt>账户余额：</dt>
                                <dd><em>¥0.00</em></dd>
                            </dl>
                            <dl class="control-group">
                                <dt>充值方式：</dt>
                                <dd class="recharge-channel">
                                    <label  class="selected"  data-gateway-url='https://pay.touzhijia.com/v2/order' data-form-name='bankdirect'>
                                        网银在线              <i class="iconfont icon-checked">&#xe67b;</i>
                                        <input type="radio" name="third" value="Chinabank" style="display:none;"  checked="checked" />
                                    </label>
                                    <label  data-gateway-url='https://pay.touzhijia.com/v2/order' data-form-name='bankdirect'>
                                        连连支付              <i class="iconfont icon-checked">&#xe67b;</i>
                                        <input type="radio" name="third" value="Ll" style="display:none;" />
                                    </label>
                                    <label  data-gateway-url='https://pay.touzhijia.com/v2/order' data-form-name='bankdirect'>
                                        国付宝支付              <i class="iconfont icon-checked">&#xe67b;</i>
                                        <input type="radio" name="third" value="Go" style="display:none;" />
                                    </label>
                                    <label  data-gateway-url='https://pay.touzhijia.com/v2/order' data-form-name='bankdirect'>
                                        宝付网关支付              <i class="iconfont icon-checked">&#xe67b;</i>
                                        <input type="radio" name="third" value="Baofoo" style="display:none;" />
                                    </label>
                                    <label  data-gateway-url='' data-form-name='baofuAuthpay'>
                                        宝付认证支付              <i class="iconfont icon-checked">&#xe67b;</i>
                                        <input type="radio" name="third" value="Baofu" style="display:none;" />
                                    </label>
                                </dd>
                            </dl>
                            <dl class="control-group">
                                <dt>充值金额：</dt>
                                <dd>
                                    <input type="text" class="input-style" name="amt" />
                                    <i class="input-icon">元</i>
                                </dd>
                            </dl>
                            <div class="payment-box" >
                                <div class="payment-directbank">
                                    <dl class="control-group">
                                        <dt>选择银行：</dt>
                                        <dd class="pay-banks" >
                                            <a href="javascript:;" class="selected">
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/601398.png?ver=20160431006" alt="中国工商银行">
                                                    <input type="radio" style="display:none" name="bank" value="601398" checked="checked">
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/601818.png?ver=20160431006" alt="中国光大银行">
                                                    <input type="radio" style="display:none" name="bank" value="601818" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/601939.png?ver=20160431006" alt="中国建设银行">
                                                    <input type="radio" style="display:none" name="bank" value="601939" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/600036.png?ver=20160431006" alt="招商银行">
                                                    <input type="radio" style="display:none" name="bank" value="600036" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/601328.png?ver=20160431006" alt="交通银行">
                                                    <input type="radio" style="display:none" name="bank" value="601328" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/162703.png?ver=20160431006" alt="广发银行">
                                                    <input type="radio" style="display:none" name="bank" value="162703" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/000001.png?ver=20160431006" alt="平安银行">
                                                    <input type="radio" style="display:none" name="bank" value="000001" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/601169.png?ver=20160431006" alt="北京银行">
                                                    <input type="radio" style="display:none" name="bank" value="601169" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/900002.png?ver=20160431006" alt="成都银行">
                                                    <input type="radio" style="display:none" name="bank" value="900002" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/600000.png?ver=20160431006" alt="浦东发展银行">
                                                    <input type="radio" style="display:none" name="bank" value="600000" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/600015.png?ver=20160431006" alt="华夏银行">
                                                    <input type="radio" style="display:none" name="bank" value="600015" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/900003.png?ver=20160431006" alt="上海银行">
                                                    <input type="radio" style="display:none" name="bank" value="900003" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/002142.png?ver=20160431006" alt="宁波银行">
                                                    <input type="radio" style="display:none" name="bank" value="002142" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/601009.png?ver=20160431006" alt="南京银行">
                                                    <input type="radio" style="display:none" name="bank" value="601009" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/601166.png?ver=20160431006" alt="兴业银行">
                                                    <input type="radio" style="display:none" name="bank" value="601166" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/900007.png?ver=20160431006" alt="北京农商行">
                                                    <input type="radio" style="display:none" name="bank" value="900007" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/900008.png?ver=20160431006" alt="杭州银行">
                                                    <input type="radio" style="display:none" name="bank" value="900008" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/900009.png?ver=20160431006" alt="恒丰银行">
                                                    <input type="radio" style="display:none" name="bank" value="900009" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/900010.png?ver=20160431006" alt="中国邮政储蓄银行">
                                                    <input type="radio" style="display:none" name="bank" value="900010" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/900011.png?ver=20160431006" alt="青岛银行">
                                                    <input type="radio" style="display:none" name="bank" value="900011" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/900012.png?ver=20160431006" alt="上海农商行">
                                                    <input type="radio" style="display:none" name="bank" value="900012" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/900013.png?ver=20160431006" alt="重庆农商银行">
                                                    <input type="radio" style="display:none" name="bank" value="900013" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                        </dd>
                                    </dl>
                                    <input type="submit" class="btn-blue btn-l" value="提交" role="submit"/>
                                </div>
                            </div>
                            <div class="payment-box" style="display:none">
                                <div class="payment-directbank">
                                    <dl class="control-group">
                                        <dt>选择银行：</dt>
                                        <dd class="pay-banks" >
                                            <a href="javascript:;" class="selected">
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/601398.png?ver=20160431006" alt="中国工商银行">
                                                    <input type="radio" style="display:none" name="bank" value="601398" checked="checked">
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/601818.png?ver=20160431006" alt="中国光大银行">
                                                    <input type="radio" style="display:none" name="bank" value="601818" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/601939.png?ver=20160431006" alt="中国建设银行">
                                                    <input type="radio" style="display:none" name="bank" value="601939" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/600036.png?ver=20160431006" alt="招商银行">
                                                    <input type="radio" style="display:none" name="bank" value="600036" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/601988.png?ver=20160431006" alt="中国银行">
                                                    <input type="radio" style="display:none" name="bank" value="601988" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/601328.png?ver=20160431006" alt="交通银行">
                                                    <input type="radio" style="display:none" name="bank" value="601328" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/162703.png?ver=20160431006" alt="广发银行">
                                                    <input type="radio" style="display:none" name="bank" value="162703" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/600016.png?ver=20160431006" alt="中国民生银行">
                                                    <input type="radio" style="display:none" name="bank" value="600016" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/601998.png?ver=20160431006" alt="中信银行">
                                                    <input type="radio" style="display:none" name="bank" value="601998" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/000001.png?ver=20160431006" alt="平安银行">
                                                    <input type="radio" style="display:none" name="bank" value="000001" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/601169.png?ver=20160431006" alt="北京银行">
                                                    <input type="radio" style="display:none" name="bank" value="601169" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/900002.png?ver=20160431006" alt="成都银行">
                                                    <input type="radio" style="display:none" name="bank" value="900002" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/600015.png?ver=20160431006" alt="华夏银行">
                                                    <input type="radio" style="display:none" name="bank" value="600015" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/900003.png?ver=20160431006" alt="上海银行">
                                                    <input type="radio" style="display:none" name="bank" value="900003" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/900004.png?ver=20160431006" alt="渤海银行">
                                                    <input type="radio" style="display:none" name="bank" value="900004" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/002142.png?ver=20160431006" alt="宁波银行">
                                                    <input type="radio" style="display:none" name="bank" value="002142" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/601009.png?ver=20160431006" alt="南京银行">
                                                    <input type="radio" style="display:none" name="bank" value="601009" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/900005.png?ver=20160431006" alt="BEA东亚银行">
                                                    <input type="radio" style="display:none" name="bank" value="900005" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/601166.png?ver=20160431006" alt="兴业银行">
                                                    <input type="radio" style="display:none" name="bank" value="601166" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                        </dd>
                                    </dl>
                                    <input type="submit" class="btn-blue btn-l" value="提交" role="submit"/>
                                </div>
                            </div>
                            <div class="payment-box" style="display:none">
                                <div class="payment-directbank">
                                    <dl class="control-group">
                                        <dt>选择银行：</dt>
                                        <dd class="pay-banks" >
                                            <a href="javascript:;" class="selected">
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/601398.png?ver=20160431006" alt="中国工商银行">
                                                    <input type="radio" style="display:none" name="bank" value="601398" checked="checked">
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/601818.png?ver=20160431006" alt="中国光大银行">
                                                    <input type="radio" style="display:none" name="bank" value="601818" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/601939.png?ver=20160431006" alt="中国建设银行">
                                                    <input type="radio" style="display:none" name="bank" value="601939" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/601288.png?ver=20160431006" alt="中国农业银行">
                                                    <input type="radio" style="display:none" name="bank" value="601288" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/600036.png?ver=20160431006" alt="招商银行">
                                                    <input type="radio" style="display:none" name="bank" value="600036" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/601988.png?ver=20160431006" alt="中国银行">
                                                    <input type="radio" style="display:none" name="bank" value="601988" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/601328.png?ver=20160431006" alt="交通银行">
                                                    <input type="radio" style="display:none" name="bank" value="601328" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/162703.png?ver=20160431006" alt="广发银行">
                                                    <input type="radio" style="display:none" name="bank" value="162703" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/600016.png?ver=20160431006" alt="中国民生银行">
                                                    <input type="radio" style="display:none" name="bank" value="600016" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/601998.png?ver=20160431006" alt="中信银行">
                                                    <input type="radio" style="display:none" name="bank" value="601998" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/000001.png?ver=20160431006" alt="平安银行">
                                                    <input type="radio" style="display:none" name="bank" value="000001" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/601169.png?ver=20160431006" alt="北京银行">
                                                    <input type="radio" style="display:none" name="bank" value="601169" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/600000.png?ver=20160431006" alt="浦东发展银行">
                                                    <input type="radio" style="display:none" name="bank" value="600000" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/600015.png?ver=20160431006" alt="华夏银行">
                                                    <input type="radio" style="display:none" name="bank" value="600015" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/900003.png?ver=20160431006" alt="上海银行">
                                                    <input type="radio" style="display:none" name="bank" value="900003" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/002142.png?ver=20160431006" alt="宁波银行">
                                                    <input type="radio" style="display:none" name="bank" value="002142" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/601009.png?ver=20160431006" alt="南京银行">
                                                    <input type="radio" style="display:none" name="bank" value="601009" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/601166.png?ver=20160431006" alt="兴业银行">
                                                    <input type="radio" style="display:none" name="bank" value="601166" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/900006.png?ver=20160431006" alt="天津银行">
                                                    <input type="radio" style="display:none" name="bank" value="900006" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                        </dd>
                                    </dl>
                                    <input type="submit" class="btn-blue btn-l" value="提交" role="submit"/>
                                </div>
                            </div>
                            <div class="payment-box" style="display:none">
                                <div class="payment-directbank">
                                    <dl class="control-group">
                                        <dt>选择银行：</dt>
                                        <dd class="pay-banks" >
                                            <a href="javascript:;" class="selected">
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/601398.png?ver=20160431006" alt="中国工商银行">
                                                    <input type="radio" style="display:none" name="bank" value="601398" checked="checked">
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/601818.png?ver=20160431006" alt="中国光大银行">
                                                    <input type="radio" style="display:none" name="bank" value="601818" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/601939.png?ver=20160431006" alt="中国建设银行">
                                                    <input type="radio" style="display:none" name="bank" value="601939" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/600036.png?ver=20160431006" alt="招商银行">
                                                    <input type="radio" style="display:none" name="bank" value="600036" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/601988.png?ver=20160431006" alt="中国银行">
                                                    <input type="radio" style="display:none" name="bank" value="601988" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/601328.png?ver=20160431006" alt="交通银行">
                                                    <input type="radio" style="display:none" name="bank" value="601328" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/162703.png?ver=20160431006" alt="广发银行">
                                                    <input type="radio" style="display:none" name="bank" value="162703" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/600016.png?ver=20160431006" alt="中国民生银行">
                                                    <input type="radio" style="display:none" name="bank" value="600016" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/601998.png?ver=20160431006" alt="中信银行">
                                                    <input type="radio" style="display:none" name="bank" value="601998" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/000001.png?ver=20160431006" alt="平安银行">
                                                    <input type="radio" style="display:none" name="bank" value="000001" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/601169.png?ver=20160431006" alt="北京银行">
                                                    <input type="radio" style="display:none" name="bank" value="601169" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/600015.png?ver=20160431006" alt="华夏银行">
                                                    <input type="radio" style="display:none" name="bank" value="600015" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/900003.png?ver=20160431006" alt="上海银行">
                                                    <input type="radio" style="display:none" name="bank" value="900003" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/601166.png?ver=20160431006" alt="兴业银行">
                                                    <input type="radio" style="display:none" name="bank" value="601166" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/900007.png?ver=20160431006" alt="北京农商行">
                                                    <input type="radio" style="display:none" name="bank" value="900007" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/900010.png?ver=20160431006" alt="中国邮政储蓄银行">
                                                    <input type="radio" style="display:none" name="bank" value="900010" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                            <a href="javascript:;" >
                                                <label>
                                                    <img src="http://static.tianyantou.com/images/banklogo/900012.png?ver=20160431006" alt="上海农商行">
                                                    <input type="radio" style="display:none" name="bank" value="900012" >
                                                </label>
                                                <i class="iconfont icon-checked">&#xe67b;</i>
                                            </a>
                                        </dd>
                                    </dl>
                                    <input type="submit" class="btn-blue btn-l" value="提交" role="submit"/>
                                </div>
                            </div>
                            <div class="payment-box" style="display:none">
                                <div class="payment-auth">
                                    <dl class="control-group">
                                        <dt>姓名：</dt>
                                        <dd>* 希顺</dd>
                                    </dl>
                                    <dl class="control-group">
                                        <dt>选择银行：</dt>
                                        <dd>
                                            <select class="input-style baofu-auth-bank" name="authBanks">
                                                <option value="">请选择银行</option>
                                                <option value="ICBC" data-bank-name="中国工商银行" >中国工商银行</option>
                                                <option value="CEB" data-bank-name="中国光大银行" >中国光大银行</option>
                                                <option value="CCB" data-bank-name="中国建设银行" >中国建设银行</option>
                                                <option value="ABC" data-bank-name="中国农业银行" >中国农业银行</option>
                                                <option value="CMB" data-bank-name="招商银行" >招商银行</option>
                                                <option value="BOC" data-bank-name="中国银行" >中国银行</option>
                                                <option value="BOCOM" data-bank-name="交通银行" >交通银行</option>
                                                <option value="GDB" data-bank-name="广发银行" >广发银行</option>
                                                <option value="CMBC" data-bank-name="中国民生银行" >中国民生银行</option>
                                                <option value="CITIC" data-bank-name="中信银行" >中信银行</option>
                                                <option value="PAB" data-bank-name="平安银行" >平安银行</option>
                                                <option value="SPDB" data-bank-name="浦东发展银行" >浦东发展银行</option>
                                                <option value="HXBC" data-bank-name="华夏银行" >华夏银行</option>
                                                <option value="BOS" data-bank-name="上海银行" >上海银行</option>
                                                <option value="CIB" data-bank-name="兴业银行" >兴业银行</option>
                                                <option value="PSBC" data-bank-name="中国邮政储蓄银行" >中国邮政储蓄银行</option>
                                            </select>
                                        </dd>
                                    </dl>
                                    <dl class="control-group">
                                        <dt>银行卡号：</dt>
                                        <dd><input type="text" class="input-style" placeholder="请输入银行卡号" name="baofu_bank_code" value=""></dd>
                                    </dl>
                                    <dl class="control-group">
                                        <dt>银行预留手机号：</dt>
                                        <dd><input type="text" class="input-style" name="baofu_mobile" id="baofu_reserved_mobile"><a class="btn-l btn-captcha" data-toggle="authPayVerifyCode" data-action="reserved_mobile" data-tel="#baofu_reserved_mobile">发送短信验证码</a></dd>
                                    </dl>
                                    <dl class="control-group">
                                        <dt>短信验证码：</dt>
                                        <dd><input type="text" class="input-style" name="baofu_verifyCode"></dd>
                                    </dl>
                                    <input type="hidden" name="orginBankName" value=""/>
                                    <input type="hidden" name="orginBankNo" value=""/>
                                    <input type="submit" class="btn-blue btn-l" value="确认开通并支付" role="submit"/>
                                </div>                </div>
                            <input type="hidden" name="auth_key" value="24S45InYwL8TKNbOCdOFeTCxPNo4l2ez" />
                        </form>
                    </div>
                </div>
                <!-- 温馨提示 s-->
                <div class="tab click-tab tab-rules">
                    <ul class="tab-nav clearfix">
                        <li class="active"><a href="javascript:void(0);">温馨提示</a></li>
                        <li><a href="javascript:void(0);">充值说明</a></li>
                    </ul>
                    <div class="tab-main">
                        <div class="active">
                            <ul class="tab-content">
                                <li>1. 开通认证支付充值更加安全、快捷，首次充值成功，自动绑定银行卡；为了您的资金安全，若需解绑银行卡请联系客服<em>400-883-1803</em>(注：仅限借记卡)；</li>
                                <li>2. 充值手续费由天眼投为您全额支付，请放心进行充值；</li>
                                <li>3. 为确保您的资金安全，请在充值之前先进行实名认证，并设置支付密码；</li>
                                <li>4. 单笔充值最低50元，最高充值限额以各银行网上支付限额为准；</li>
                                <li>5. 您的充值将会在10~15分钟内到账，请耐心等候。如果长时间充值未到账，请联系客服<em>400-883-1803</em>；</li>
                                <li>6. 禁止洗钱、信用卡套现、虚假交易等行为，一经发现并确认，将终止该账户的使用；</li>
                                <li>7. 充值资金可用于购买天眼投二级市场债权份额，但无法用于购买平台与选标中心中的标的；</li>
                            </ul>
                        </div>
                        <div>
                            <ul class="tab-content">
                                <li>
                                    <h6>1. 怎么才算充值成功？</h6>
                                    <p>答：充值成功后，您的资金账户会增加相应金额，即为充值成功,同时您将会收到天眼投的充值成功短信通知。</p>
                                </li>
                                <li>
                                    <h6>2. 网上银行充值成功后，帐户余额却没有增加？</h6>
                                    <p>答：由于在同一时间充值的人可能非常多，会造成网银账户与天眼投账号金额不同步的情况。如果遇到这种情况请您将网银付款成功的页面截图，然后刷新页面。如果刷新未能解决问题，请致电<em>400-883-1803</em>。</p>
                                </li>
                                <li>
                                    <p>3.充值限额以各银行网上支付限额为准；</p>
                                </li>
                                <li>
                                    <h6>4. 充值是否支持信用卡？</h6>
                                    <p>答：目前天眼投的充值业务是与第三方支付公司进行合作的，您可以登录第三方支付平台进行确认。</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- 温馨提示 e-->
            </div>    </div>
    </div>
</div>
@stop
