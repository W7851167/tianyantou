 $(function() {
    var recharge = {
      init: function() {
        var channels = $('.recharge-channel'),
          paybanks = $('.pay-banks');

        function switchChoice(eleObj, ele, callback) {
          eleObj.on('click', ele, function() {
            var self = $(this),
              index = self.index();
            self.siblings(ele).removeClass('selected');
            self.addClass('selected');
            if (typeof callback !== 'undefined') {
              callback(index,self);
            }
          });
        }

        //切换支付方式
        switchChoice(channels, 'label', function(index, self) {
          var gateWay = self.data('gateway-url'),
              name = self.data('form-name');
          self.find('input[type="radio"]').prop('checked','checked');
          self.siblings('label').find('input[type="radio"]').prop('checked', false);
          
          self.parents('form').attr({
              'action': gateWay,
              'name':  name
            });
          $('.payment-box').eq(index).show().siblings('.payment-box').hide();
          $('.payment-box:visible').find("input[type!='submit']").removeAttr("disabled");
          $('.payment-box:hidden').find("input[type!='submit']").attr("disabled","disabled");
        });
        $('.payment-box:visible').find("input[type!='submit']").removeAttr("disabled");
        $('.payment-box:hidden').find("input[type!='submit']").attr("disabled","disabled");
        //切换银行
         switchChoice(paybanks,'a');

        $(document).on('submit', 'form[name=bankdirect]',function() {
          
          var thirdIndex = $('.recharge-channel').find('.selected').index();
          var $paybanks = $('.pay-banks');
          var $amt = $(this).find('input[name=amt]');
          var amt = $amt.val();

          if (!$.isNumeric(amt)) {
            messageBox('请填写正确的金额', 2);
            $amt.val('');
            return false;
          } else if (parseFloat(amt) < 50) {
            messageBox('最小充值金额为50元', 2);
            $amt.val('');
            return false;
          }
          $paybanks.find('.selected input[type="radio"]').prop('checked', false);
          if ( $('.recharge-channel label[data-form-name="authpay"]').length > 0 && thirdIndex > $('.recharge-channel label[data-form-name="authpay"]').index()) {
            thirdIndex--;
          }
          $paybanks.eq(thirdIndex).find('.selected input[type="radio"]').prop('checked','checked');
          return true;
        });

        //金运通表单验证
        $(document).on('submit', 'form[name=authpay]',function() {
          var self = $(this),
              $amt = self.find('input[name=amt]'),
              $bankcode = self.find('input[name=bank_code]'),
              $phone = self.find('input[name=mobile]'),
              $verifyCode = self.find('input[name=verifyCode]'),
              $tradepw = self.find('input[name=tradepwd]');
            if ($(this).data('isInhandle')) {
              return false;
            }
            var amt = $.trim($amt.val()),            
              verifyCode = $.trim($verifyCode.val()),
              tradepwd = $.trim($tradepw.val()),
              bankcode = $.trim($bankcode.val()) || '',
              phone = $.trim($phone.val()) || '',
              regEpx = {
                phone: /^1[3-8][0-9]{9}$/,
                bankCode: /^\d{12,19}$/
              };

             if (!$.isNumeric(amt)) {
              messageBox('请填写正确的金额', 2);
              $amt.val('');
              return false;
            } else if (parseFloat(amt) < 1) {
              messageBox('最小充值金额为1元', 2);
              $amt.val('');
              return false;
            } else if ($bankcode.length && !bankcode) {
              messageBox('银行卡号不能为空', 2);
              return false;           
              
            } else if ( $bankcode.length && !regEpx.bankCode.test(bankcode)) {
              messageBox('银行卡号格式不正确', 2);
              $bankcode.val('');
              return false;
            } else if ($phone.length && !phone) {
              messageBox('手机号不能为空', 2);
              return false;
            } else if ($phone.length && !regEpx.phone.test(phone)) {
              messageBox('手机号格式不正确', 2);
              $phone.val('');
              return false;
            } else if ($verifyCode.length >0 && !verifyCode) {
              messageBox('请输入手机验证码', 2);              
              return false;
            } else if ( !tradepwd ) {
              messageBox('请输入交易密码', 2);              
              return false;
            }
            self.data('isInhandle', true);
            self.find('input[type=submit]').addClass('btn-invalid');
            var pay = function(form) {
              $.ajax({
                'url': '/authpay',
                'data': $('form').serialize(),
                'type':'POST',
                'complete':function(XMLHttpRequest, textStatus) {
                  var status = XMLHttpRequest.status,
                      text = XMLHttpRequest.responseText;
                  form.data('isInhandle', false);
                  form.find('input[type=submit]').removeClass('btn-invalid');
                  if (status === 400) {
                    messageBox(text, 2);
                  }else if(status === 500) {
                    messageBox('系统异常，请稍后重试', 2);
                  } else if(status === 504) {
                    messageBox('支付请求超时', 2);
                  } else {
                    recharge.tipBox(XMLHttpRequest.responseText, XMLHttpRequest.status);
                  }
                }
              });
            }

            if($(this).data('isAuthed') || $bankcode.length == 0) {
              pay(self);
            } else {
              $.ajax({
                'url' : '/authpay/auth',
                'data': $('form').serialize(),
                'type': 'POST',
                'complete': function(XMLHttpRequest, textStatus) {
                  var status = XMLHttpRequest.status,
                      text = XMLHttpRequest.responseText;
                  if (status == 200) {
                    self.data('isAuthed', 1);
                    self.data('isInhandle', true);
                    self.find('input[type=submit]').addClass('btn-invalid');
                    pay(self);
                  } else {
                    if (status == 504) {
                      messageBox('认证请求超时', 2);
                    } else if(status == 500) {
                      messageBox('系统异常，请稍后重试', 2);
                    } else {
                      messageBox(text, 2);
                    }
                    
                    self.data('isInhandle', false);
                    self.find('input[type=submit]').removeClass('btn-invalid');
                  }
                }
              })
            }
          return false;
        });

        //宝付
        $(document).on('submit', 'form[name=baofuAuthpay]', function() {
           var self = $(this),
              $amt = self.find('input[name=amt]'),
              $authBanks = self.find('select[name=authBanks]'),
              $bankcode = self.find('input[name=baofu_bank_code]'),
              $phone = self.find('input[name=baofu_mobile]'),
              $verifyCode = self.find('input[name=baofu_verifyCode]'),
              $tradepw = self.find('input[name=tradepwd]');
            if ($(this).data('isInhandle')) {
              return false;
            }
            var amt = $.trim($amt.val()),            
              verifyCode = $.trim($verifyCode.val()),
              tradepwd = $.trim($tradepw.val()),
              bankcode = $.trim($bankcode.val()) || '',
              phone = $.trim($phone.val()) || '',
              regEpx = {
                phone: /^1[3-8][0-9]{9}$/,
                bankCode: /^\d{12,19}$/
              };
            if (!$.isNumeric(amt)) {
              messageBox('请填写正确的金额', 2);
              $amt.val('');
              return false;
            } else if (parseFloat(amt) < 1) {
              messageBox('最小充值金额为1元', 2);
              $amt.val('');
              return false;
            } else if($authBanks.length > 0 && $authBanks.val() == '') {
              messageBox('请选择银行', 2);
              return false;
            }else if ($bankcode.length && !bankcode) {
              messageBox('银行卡号不能为空', 2);
              return false;       
            } else if ($bankcode.length && !regEpx.bankCode.test(bankcode)) {
              messageBox('银行卡号格式不正确', 2);
              return false;
            } else if ($phone.length && !phone) {
              messageBox('手机号不能为空', 2);
              return false;
            } else if ($phone.length && !regEpx.phone.test(phone)) {
              messageBox('手机号格式不正确', 2);
              return false;
            } else if ($verifyCode.length >0 && !verifyCode) {
              messageBox('请输入手机验证码', 2);              
              return false;
            }
            var bindThenPay = function(form) {
              form.data('isInhandle', true);
              form.find('input[type=submit]').addClass('btn-invalid');
              var bankName = $('select[name=authBanks] option:checked').attr('data-bank-name');
              if (bankName) {
                $('input[name=bankName]').remove();
                form.append('<input name="bankName" value="' + bankName + '" type="hidden"/>');
              }
              if($(form).data('isAuthed') || form.find('input[name=baofu_bank_code]').length == 0) {
                pay(form);
              } else {
                $.ajax({
                  'url' : '/BaofuAuthpay/bind',
                  'data': form.serialize(),
                  'type': 'POST',
                  'complete': function(XMLHttpRequest, textStatus) {
                    var status = XMLHttpRequest.status,
                        text = XMLHttpRequest.responseText;
                    if (status == 200) {
                      form.data('isAuthed', 1);
                      form.data('isInhandle', true);
                      form.find('input[type=submit]').addClass('btn-invalid');
                      pay(form);
                    } else {
                      if (status == 504) {
                        messageBox('认证请求超时', 2);
                      } else if(status == 500) {
                        messageBox('系统异常，请稍后重试', 2);
                      } else {
                        messageBox(text, 2);
                      }
                      
                      form.data('isInhandle', false);
                      form.find('input[type=submit]').removeClass('btn-invalid');
                    }
                  }
                })
              }
          }

            var pay = function(form) {
              $.ajax({
                'url': '/BaofuAuthpay/recharge',
                'data': form.serialize(),
                'type':'POST',
                'complete':function(XMLHttpRequest, textStatus) {
                  var status = XMLHttpRequest.status,
                      text = XMLHttpRequest.responseText;
                  form.data('isInhandle', false);
                  form.find('input[type=submit]').removeClass('btn-invalid');
                  if (status === 400) {
                    messageBox(text, 2);
                  }else if(status === 500) {
                    messageBox('系统异常，请稍后重试', 2);
                  } else if(status === 504) {
                    messageBox('支付请求超时', 2);
                  } else {
                    recharge.tipBox(XMLHttpRequest.responseText, XMLHttpRequest.status);
                  }
                }
              });
          }
          var isTips = true;
          var orginBankName = $('input[name=orginBankName]').val();
          var orginBankNo = $('input[name=orginBankNo]').val();
          var bankName = $('select[name=authBanks] option:checked').attr('data-bank-name');
          var bankNo = $('input[name=baofu_bank_code]').val();
          var tipBindBankTimes = self.data('tipBindBankTimes') || 0;
          if (orginBankName == '' || ((orginBankName == bankName) && (orginBankNo == bankNo))) {
            isTips = false;
          }
          if ($authBanks.length <= 0) { //第一次绑卡才提示
            isTips = false;
          }
          if (tipBindBankTimes >= 1) { //只提示一次
            isTips = false;
          }
          if (isTips) {
            self.data('tipBindBankTimes', tipBindBankTimes + 1);
            layer.confirm('如果您确定使用当前银行卡充值，这张银行卡将会替换您的绑定银行卡！', {title:'提示'}, function(index){
              bindThenPay(self);
              layer.close(index);
            }, function(index) {
               self.data('tipBindBankTimes', 0);
            });
          } else {
            bindThenPay(self);
          }
          return false;
        });

        $(document).on('click', '[data-toggle=authPayVerifyCode]', function(e) {
            e.preventDefault();
            var self = $(this);
            if (self.hasClass('btn-invalid')) {
                return;
            }
            var action = self.data('action');
            var tel = self.data('tel') || 'user';
            if (tel != 'user') {
                tel = $(tel).val();
                if (!(/^1[3-8][0-9]{9}$/.test(tel))) {
                    messageBox('请输入正确的手机号码', 2);
                    return;
                }
            }
            var bankCode = self.parents('form').find('input[name=baofu_bank_code]').val();
            if (bankCode == '') {
                messageBox('请输入银行开号', 2);
                return;
            }
            if (!/^(\d{12,19})$/.test(bankCode)) {
                messageBox('请输入正确的银行卡号', 2);
                return;
            }
            var bank = $('select[name=authBanks]').val();
            if (bank == '') {
              messageBox('请选择银行', 2);
              return;
            }
            var url = '/BaofuAuthpay/sms';
            self.addClass('btn-invalid').removeClass('btn-captcha');
            $.ajax({
                url: url,
                method: "post",
                data : {'baofu_mobile':tel, 'baofu_bank_code': bankCode, 'bank':bank},
                success: function(data) {
                    self.countdown(60);
                },
                error: function(xhr) {
                    var ct = xhr.getResponseHeader('content-type');
                    if (ct.indexOf('plain') > -1) {
                        messageBox(xhr.responseText, 2);
                    } else {
                        messageBox('系统繁忙请稍后重试，投之家客服电话 400-883-1803', 2);
                    }
                    self.addClass('btn-captcha').removeClass('btn-invalid');
                }
            });
        });
      },
      tipBox: function (responseText, status) {
        var area = ['540px', '220px'];
        if (status === 200) {
          area = ['320px', '220px'];
        }
        var tips = {
          202:'充值订单正在处理中，你可以查看<a href="https://account.touzhijia.com/wallet/rechargelist.html">充值记录</a>跟踪订单状态', 
          200:'恭喜您！充值成功'
        };
        var boxConfig = {
            title:'充值通知',
            icon: 1,
            area: area,
            content: '<div style="display:inline-block;*zoom:1;vertical-align:middle;">' + tips[status] + '</div>',
            btn : ['查看记录', '继续充值'],
            success: function(layero, index) {
              layero.find('.layui-layer-btn0').attr('href','https://account.touzhijia.com/wallet/rechargelist.html');
              var href= location.href;
              layero.find('.layui-layer-btn1').attr('href', href);
            }
        };
        layer.open(boxConfig);
      }
    }
    recharge.init();
});