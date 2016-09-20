
(function() {
    //刷新版本号
    $('.deposit-detail').on('mouseenter', '.iconfont', function() {
        $(this).parents('ul').siblings('.depoit-tips').show();
    }).on('mouseleave', '.iconfont', function() {
        $(this).parents('ul').siblings('.depoit-tips').hide();
    });

    (function() {
        var $detail = $('.deposit-detail'),
            $submit = $('input[type=submit]'),
            withdrawAmounto = $('input[name="data[price]"]'),
            withdraw = $('#withdraw'),
            code_count = $('#code_count').text(),
            $charge = $detail.find('.label:eq(0)').siblings('b'),
            $receive = $detail.find('.label:eq(1)').siblings('b'),
            $balance = $detail.find('.label:eq(2)').siblings('b'),
            withdrawAmount,
            $totalAmount;
        // 选择提现券
        withdraw.on('change',function(){
            var $chargeText = parseFloat($charge.text()),
                use_ticket = parseInt($chargeText / 2),
                $totalAmount = withdrawAmounto.val();
            if (use_ticket > code_count) {
                use_ticket = code_count;
            }
            getCodeStr(use_ticket);

            // 是否选择提现券复选框
            if(withdraw.is(':checked')){
                var sub = $chargeText - use_ticket * 2;
                $('#code_much').text((use_ticket * 2 * 1000 / 1000).toFixed(2));
                $('#code_num').text(use_ticket);
                $charge.text(toTwo((sub * 1000 / 1000)).toFixed(2));
                $receive.text(toTwo(withdrawAmounto.val() - sub).toFixed(2));
            }else{
                $('#code_much').text('0.00');
                $('#code_num').text('0');
                withdrawAmounto.triggerHandler('blur');
            }
        });

        // 是否禁用提现券复选框
        withdrawAmounto.keyup(function(){
            var withdrawAmount = $(this).val();
            withdrawAmount = Number(withdrawAmount);
            if(!isNaN(withdrawAmount) && withdrawAmount > 99){
                $('#withdraw').removeAttr('disabled');
            }else{
                $('#withdraw').removeAttr('checked');
                $('#withdraw').attr('disabled', 'disabled');
            }
        });

        withdrawAmounto.blur(function() {
            var amount = $('input[name="data[price]"]').val(),
                charge = 2,
                receive = 0,
                balance = $('#account-balance').data('amount'),
                validCash = $('#account-valid-cash').data('amount'),
                $msg = $(this).parents('.form-group').find('.msg-wrap');
            amount = $.trim(amount);
            balance = parseFloat(balance);
            validCash = parseFloat(validCash);

            if (amount.length && !isNaN(amount)) {
                amount = toTwo(amount*1000/1000);
                if (amount < 100) {
                    showMessage($msg, '单笔提现金额：100元~20万元', 'error');
                    Ucenter.disableSubmit($submit);
                    $('.deposit-detail').css('display','none');
                } else if (amount > balance) {
                    showMessage($msg, '提现金额不能超过账户余额', 'error');
                    Ucenter.disableSubmit($submit);
                } else {
                    $msg.html('').hide();
                    charge = Math.ceil(amount / 50000) * 2;
                    // if (amount - validCash > 0) {
                    //   charge += (amount - validCash) * 0.0035;
                    // }
                    withdrawAmount = amount;
                    charge = toTwo(((charge * 1000 / 1000))).toFixed(2);
                    balance = toTwo(((balance - amount)*1000/1000)).toFixed(2);
                    receive = toTwo(((amount - charge)*1000/1000)).toFixed(2);
                    $charge.text(charge);
                    $balance.text(balance);
                    $receive.text(receive);
                    $detail.show();
                    Ucenter.enableSubmit($submit);
                    $('#withdraw').removeAttr('disabled');
                    if(withdraw.is(':checked')){
                        withdraw.change();
                    }
                }
            } else if (!amount.length || isNaN(amount)) {
                showMessage($msg, '请输入合法金额，100元起', 'error');
                Ucenter.disableSubmit($submit);
            }
        });

        $('.btn-submit').on('click',function(e){
            var self = $(this);
            if(self.hasClass('btn-invalid')) {
                return false;
            }
            e.preventDefault();
            withdrawAmounto.blur();

            var $formGroup = $(this).parents('.form-group'),
                $msg = $formGroup.find('.msg-wrap'),
                $tradePassword = $formGroup.find('input[name=tradePassword]'),
                amount = withdrawAmount,
                tradePassword = $tradePassword.val();

            if (!tradePassword){
                messageBox('请输入交易密码', 2);
                e.preventDefault();
                return false;
            } else {
                self.addClass('btn-invalid');
                var $controlGroup = $tradePassword.parents('.control-group'),
                    postData = {
                        price: parseFloat(amount).toFixed(2),
                        password: tradePassword,
                        //use_code: $('#use_code').val() || ''
                    };
                $controlGroup.find('.error, .msg-wrap').html('').hide();
                //提交表单
                $.ajax({
                    url: '/wallet/withdraw.html',
                    type: 'POST',
                    dataType: 'json',
                    data: postData,
                    success: function(data) {
                        var $data = data;
                        layer.open({
                            title:'提现成功',
                            type: 1,
                            area: ['400px', '270px'],
                            content: '\<\div class="withdraw-dialog"><i class="icon-layer"></i><p>您已成功申请提现：' + $data.amount + '<\/br />需扣除手续费：' + $data.fee + '<\/br />实际可到账：'+ $data.actualAmount + '</p>\<\/div>',
                            btn: ['确定'],
                            yes: function(index, layero){
                                layer.close(index);
                                window.location.href = window.location.href;
                            }
                        });
                    },
                    error: function (xhr) {
                        var status = xhr.status;
                        status = parseInt(status, 10);
                        if ( status === 406) {
                            layer.open({
                                content: '您的提现金额≥5万元， 为了保障您的提现快速到账，请您先去完善银行卡支行信息。',
                                btn: ['确定', '取消'],
                                yes: function(index, layero){
                                    window.location.href = '/bankcard/update.html';
                                },
                                btn2: function(index, layero){
                                    //取消按钮
                                    layer.close(index);
                                },
                                cancel: function(index, layero){
                                    layer.close(index);
                                }
                            });
                            return;
                        }
                        var errorText = xhr.responseText;
                        layer.msg(errorText,{icon:2,time:3000});
                    },
                    complete:function() {
                        self.removeClass('btn-invalid');
                    }
                });
            }
        });
    }());

    function getCodeStr(num){
        var use_code = new Array();
        var tcode = $('.tcode:lt('+num+')');
        $(tcode).each(function(index, el) {
            use_code[index] = $(this).val();
        });
        use_code = use_code.join(',');
        $('#use_code').val(use_code);
    }

    function toTwo(num){
        return Math.floor((num+0.005)*100)/100;
    }

}());