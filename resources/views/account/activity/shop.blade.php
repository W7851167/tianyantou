@extends('layout.main')
@section('style')
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css?ver=20160431006" />
@stop

@section('content')
<div class="wrap user-center">
        <div class="container clearfix">
            @include('account.common.menu')
            <div class="main tworow" style="height: 876px;">
                <div class="main-inner">
                    <h1 class="section-title">积分商城</h1>
                    <div class="points-mall">
                        <!-- 虚拟商品tab -->
                        <div class="cont-box-wrap">
                            <div class="tab click-tab">
                                <ul class="tab-nav">
                                    <li class="active" id="coupons"><a href="javascript:void(0);">理财券</a></li>
                                    <li id="presents"><a href="javascript:void(0);" style="font-size:14px;">精美礼品</a></li>
                                    <li id="userRecords"><a href="javascript:void(0);" style="font-size:14px;">积分记录</a></li>
                                </ul>
                                <div class="tab-main">
                                    <!-- 理财券 -->
                                    <div class="active">
                                        <div class="tab-content tab-content-table" id="tranfer_can">
                                            <div class="activate-code" id="activate-code">
                                                <label for="coupon-id">
                                                    <select class="input-style">
                                                        <option value="all">请选择激活券类型</option>
                                                        <option value="tcode">专享T码</option>
                                                        <option value="coupon">理财券</option>
                                                    </select>
                                                </label>
                                                <input type="text" id="code" class="input-style">
                                                <a id="active" class="btn-blue btn-s" href="javascript:;">激活</a>
                                            </div>
                                            <table class="table table-bordered ucenter-table" style="font-size: 13px">
                                                <thead>
                                                <tr>
                                                    <th>商品名称</th>
                                                    <th>积分/个</th>
                                                    <th>兑换时间</th>
                                                    <th>兑换码</th>
                                                    <th>状态</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="norecord">
                                                    <td colspan="7">
                                                        没有记录
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- 精美礼品 -->
                                    <div>
                                        <input type="hidden" value="" name="originProvince">
                                        <input type="hidden" value="" name="originCity">
                                        <input type="hidden" value="" name="originDetail">
                                        <input type="hidden" value="" name="originPostcode">
                                        <input type="hidden" value="" name="originReceiver">
                                        <input type="hidden" value="" name="originPhone">
                                        <div class="address-box">
                                            <div class="no-address"><a href="javascript:;" class="modify-address">新增地址</a>
                                            </div>
                                        </div>

                                        <!-- 修改收货地址表单 -->
                                        <div id="modify-form" class="popup-address-form">
                                            <form method="POST" accept-charset="utf-8" class="form-group">
                                                <div class="control-group">
                                                    <label>收货地址：</label>
                                                    <select name="province" class="input-style"
                                                            style="width:70px;"></select>
                                                    <select name="city" id="" class="input-style"
                                                            style="width:90px;"></select>
                                                    <input type="text" class="input-style" name="detailArea"
                                                           placeholder="详细地址">
                                                </div>
                                                <div class="control-group">
                                                    <label for="postcode">邮编：</label>
                                                    <input type="text" class="input-style" id="postcode" name="postcode">
                                                </div>
                                                <div class="control-group">
                                                    <label for="receiver">收货人：</label>
                                                    <input type="text" class="input-style" id="receiver" value="张三"
                                                           name="receiver">
                                                </div>
                                                <div class="control-group">
                                                    <label for="phone">联系电话：</label>
                                                    <input type="text" class="input-style" name="phone" id="phone">
                                                </div>
                                                <div class="control-group">
                                                    <input type="button" role="cancel" class="btn-blue-o btn-s" value="取消">
                                                    <input type="button" role="submit" class="btn-blue btn-s" value="提交">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-content tab-content-table" id="tranfer_ing">
                                            <table class="table table-bordered ucenter-table" style="font-size: 13px">
                                                <thead>
                                                <tr>
                                                    <th>商品名称</th>
                                                    <th>购买数量</th>
                                                    <th>积分/个</th>
                                                    <th>兑换时间</th>
                                                    <th>订单状态</th>
                                                    <th>备注</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="norecord">
                                                    <td colspan="7">
                                                        没有记录
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- 积分记录 -->
                                    <div>
                                        <div class="tab-content tab-content-table" id="points_record">
                                            <div id="score_records">
                                                <table class="table table-bordered ucenter-table">
                                                    <thead>
                                                    <tr>
                                                        <th>时间</th>
                                                        <th>积分数</th>
                                                        <th>积分余额</th>
                                                        <th>说明</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>2016-09-09 17:56:12</td>
                                                        <td>
                                                            <span class="income">+10</span>
                                                        </td>
                                                        <td>10</td>
                                                        <td>您完成了注册获得10.00积分</td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tip tab-rules">
                            <h3 class="title-indent">积分商城说明</h3>
                            <div class="tip-main">
                                <ul class="tab-content">
                                    <li>1. 从积分商城兑换的所有优惠券（投资券、红包、提现券、加息券等）都是兑换时即自动激活，兑换后的T码则需手动激活；</li>
                                    <li>2. 积分只在同一会员帐户内累计，不同帐户的积分不能合并；</li>
                                    <li>3. 每一笔积分自获得之日起2年内有效，过期清零。</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                    // categoryId = 1 为T码需要特别调用接口地址
                    function useCode(self, categoryId, code) {
                        var categoryId = $.trim(categoryId)
                        var code = $.trim(code)
                        if (code == '' || categoryId == '') {
                            alert('参数错误!');
                            return;
                        }

                        if (categoryId == 1) {
                            $.ajax({
                                url: '/activity/tcode',
                                type: 'post',
                                data: {tcode: code},
                                success: function (data) {
                                    $(self).after("<a href='javascript:void(0);' class='btn-invalid btn-xs'>已激活</a>");
                                    $(self).remove();
                                    layer.open({
                                        title: '提示',
                                        type: 1,
                                        area: ['350px', '220px'],
                                        content: '\<\div style="padding:30px 20px;text-align:center;">尊敬的用户,您的专享T码已经激活成功!\<\/div>',
                                        btn: ["确定", '立即使用'],
                                        success: function (layero, index) {
                                            layero.find('.layui-layer-btn1').attr('href', '/activity/tcode');
                                        }
                                    });
                                },
                                error: function (data) {
                                    alert("兑换失败");
                                }
                            });

                        } else {
                            $.ajax({
                                url: '/coupon/active',
                                type: 'post',
                                data: {code: code},
                                success: function (data) {
                                    if (data == 1) {
                                        $(self).after("<a href='javascript:void(0);' class='btn-invalid btn-xs'>已激活</a>");
                                        $(self).remove();
                                        layer.open({
                                            title: '提示',
                                            type: 1,
                                            area: ['350px', '220px'],
                                            content: '\<\div style="padding:30px 20px;text-align:center;">尊敬的用户,您的优惠券已经激活成功\<\/div>',
                                            btn: ["确定", '立即使用'],
                                            success: function (layero, index) {
                                                if (categoryId == 4) {
                                                    layero.find('.layui-layer-btn1').attr('href', '/platform/records?code=' + code + "#canplus");
                                                } else {
                                                    layero.find('.layui-layer-btn1').attr('href', '/coupon');
                                                }
                                            }
                                        });
                                    } else if (data == 409) {
                                        alert('您已经激活过注册券');
                                    } else if (data == -1) {
                                        alert('兑换码已兑换或不存在');
                                    }
                                }
                            });
                        }

                    }
                </script>
            </div>
        </div>
    </div>
@stop
