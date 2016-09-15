@extends('layout.main')
@section('style')
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css"/>
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/js/lib/fullcalendar/fullcalendar.min.css"/>
@stop

@section('content')
    <div class="wrap user-center">
        <div class="container clearfix">
            @include('account.common.menu')
            <div class="main tworow" style="height: 1425px;">
                <script src="./投之家 - 个人中心_files/jquery-1.11.3.min.js" type="text/javascript"></script>
                <div class="main-inner">
                    <ul class="page-switch page-three clearfix">
                        <li class="active"><a href="https://account.touzhijia.com/coupon/index.html">可使用</a></li>
                        <li><a href="https://account.touzhijia.com/coupon/used.html">已使用</a></li>
                        <li><a href="https://account.touzhijia.com/coupon/overdue.html">已失效</a></li>
                    </ul>

                    <div class="activate-code">
                        <form data-toggle="ajaxForm" method="post" action="https://account.touzhijia.com/coupon/active">
                            <label for="coupon-id">请输入优惠码：</label>
                            <input type="text" class="input-style" id="coupon-id" name="code">
                            <input type="submit" class="btn btn-blue btn-s" value="激活">
                        </form>
                    </div>
                    <div class="coupon-list clearfix">

                        <dl class="coupon-show coupon-cash" data-href="https://www.touzhijia.com/debt/"
                            style="cursor:pointer">
                            <dt>8<span style="font-size: 18px;">元</span></dt>
                            <dd>
                                <p>投资≥7天满1000元使用</p>
                                <p>到期日：2016-09-24</p>
                            </dd>
                        </dl>

                        <dl class="coupon-show coupon-cash" data-href="https://www.touzhijia.com/debt/"
                            style="cursor:pointer">
                            <dt>30<span style="font-size: 18px;">元</span></dt>
                            <dd>
                                <p>投资≥30天满5000元使用</p>
                                <p>到期日：2016-09-24</p>
                            </dd>
                        </dl>

                        <dl class="coupon-show coupon-cash" data-href="https://www.touzhijia.com/debt/"
                            style="cursor:pointer">
                            <dt>50<span style="font-size: 18px;">元</span></dt>
                            <dd>
                                <p>投资≥90天满10000元使用</p>
                                <p>到期日：2016-10-24</p>
                            </dd>
                        </dl>

                        <dl class="coupon-show coupon-cash" data-href="https://www.touzhijia.com/debt/"
                            style="cursor:pointer">
                            <dt>100<span style="font-size: 18px;">元</span></dt>
                            <dd>
                                <p>投资≥90天满50000元使用</p>
                                <p>到期日：2016-10-24</p>
                            </dd>
                        </dl>
                    </div>
                    <div class="pagination"></div>
                    <!-- 优惠券end -->
                    <div class="tip tab-rules">
                        <h3 class="title-indent">理财券说明</h3>
                        <div class="tip-main">
                            <ul class="tab-content">
                                <li>1. 部分理财券需手动激活优惠码后方可使用，从积分商城兑换以及参加活动发放至个人账户中的理财券无需激活。</li>
                                <li>2. <em style="color:#000;">投资券</em>，即原来的“现金券”：
                                    <br>&nbsp;&nbsp;1）投资券可在投资时选择使用，使用后即在原有的付款金额基础上增加相应的购买份额；
                                    <br>&nbsp;&nbsp;2）新人注册所得8元投资券仅限于债权期限为7天以上的债权（可投新手债权，不含专享债权），其余投资券仅限于期限为30天以上的债权（新手债权、专享债权除外）；
                                    <br>&nbsp;&nbsp;3）使用了投资券购买的债权如进行转让，则需扣除投资券的金额（不扣除投资券投资所产生的利息）。
                                    <br>【注：2016年9月2日前使用了现金券的债权，不可以转让；2016年9月2日及以后使用了"投资券"的债权（含之前获得的但未使用的"现金券"），才可以转让。】
                                </li>
                                <li>3. <em style="color:#000;">红包</em>：
                                    <br>&nbsp;&nbsp;1）投资时选择使用红包，即在原有付款金额的基础上增加相应的购买份额；
                                    <br>&nbsp;&nbsp;2）红包投资1元即可使用（期限≥30天定期，新手债权和专享债权除外），获得的所有红包，金额将合并在一起一次性使用；
                                    <br>&nbsp;&nbsp;3）使用了红包之后的债权可以转让，转让时不扣减红包的金额及相应的利息。
                                </li>
                                <li>4. <em style="color:#000;">平台加息券</em>：
                                    <br>&nbsp;&nbsp;1）有效期为15天，购买时自动激活，每张加息券最高加息限额为10万元，最多可以获取30天的加息收益；
                                    <br>&nbsp;&nbsp;2） 加息奖励只针对在拥有加息券之后，去对应平台新投资的债权才能进行加息；对于用户在拥有此平台加息券之前的已投资债权，加息券不可使用；
                                    <br>&nbsp;&nbsp;3） 加息收益=加息额度*投资金额*债权期限/365（债权期限＜30天以债权期限为准，债权期限≥30天按30天计算），例如：
                                    投资平台100000元，购买了1个月的债权，使用1%该平台加息券，获取的收益为：1%*100000*30/365=82.19元；
                                    <br>&nbsp;&nbsp;4）平台新手体验标及2015年12月4日前的投资标的，不可使用平台加息券。
                                </li>
                                <li>5. <em style="color:#000;">投之家加息券</em>：
                                    <br>&nbsp;&nbsp;1）自激活日起，有效期为30天，本加息券最高加息限额为5万元；
                                    <br>&nbsp;&nbsp;2）加息奖励按照用户实际持有使用了投之家加息券的债权天数计算，如中途没有转让，则在债权到期还款日时发放；如中途有转让，则在转让成功当天结算并发放；
                                    <br>&nbsp;&nbsp;3）投之家加息券仅限于债权期限为30天以上的债权（新手债权、专享债权除外）。
                                </li>
                                <li>6. <em style="color:#000;">提现券</em>：提现券可用于减免提现手续费，系统会在提现过程中提示您选择提现券。</li>
                                <li>7. 除提现券及红包外，每笔操作只能选择一张券。</li>
                            </ul>
                        </div>
                    </div>
                    <!--  卡券说明start -->
                </div>

                <script>
                    $('.coupon-list').on('click', '.coupon-show', function () {
                        var target = $(this).data('href');
                        if (!!target) {
                            window.location.href = target;
                        }
                    });

                </script>
            </div>
        </div>
    </div>
@stop