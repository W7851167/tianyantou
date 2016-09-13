(function(){
  //常见问题收缩
  $('#question-list').on('click', 'dt',function(e){
    var _this = $(this);
    var thisDd = _this.next('dd');
    if(thisDd.hasClass('active')){
      thisDd.removeClass('active').slideUp();
    }
    else{
      $('#question-list').find('dd').removeClass('active').slideUp();
      thisDd.addClass('active').slideDown();
    }
  });
  
  //转化字符串为保留两位小数的数字
  function getFixedNumber(text){
    return parseFloat(text.split(',').join('')).toFixed(2);
  }

  var aShare = $('#availableShare').data('amount');
  var aAmount = getFixedNumber($('#availableAmount').text());
  var leftBuyAmount = getFixedNumber($('#leftBuyAmount').text());
  var maxBuyAmount = Math.min(aShare,aAmount,leftBuyAmount);
  
  //剩余存入额度提示
  var investMoney = parseInt($('#credits').val());
  $('#credits').on('keyup', function () {
    investMoney = parseInt(this.value);
    if(isNaN(investMoney)){
      messageBox('请输入金额',2);
      $(this).val('');
      return;
    }
    if (investMoney > leftBuyAmount) {
      $('.spare').removeClass('hidden');
      $(this).val(parseInt(leftBuyAmount)).blur();
    } else {
      $('.spare').addClass('hidden');
      $(this).val(investMoney).focus();
    }
  });
  $('#credits').on('focus',function(){
    if(this.value.toString() == '50,000.00'){
      $(this).val('');
    }
  });

  //忘记交易密码提示
  $('.forget-pass').find('.iconfont').hover(function(){
    $('.pass-tip').show();
  },function(){
    $('.pass-tip').hide();
  });
  
  //活期特效
  function startAnimate(){
    $(this).addClass('shadowOn')
    .find('.icon-feature').addClass('transition');
  }
  function stopAnimate(){
    $(this).removeClass('shadowOn')
    .find('.icon-feature').removeClass('transition');
  }
  $('.feature').on('mouseenter','.feature-box',startAnimate);
  $('.feature').on('mouseleave','.feature-box',stopAnimate);

  //协议勾选
  $('.is-check').on('click',function(){
    var _this = $(this);
    if(!_this.hasClass('checked')){
      _this.addClass('checked').find('.iconcheck').css('background-position','-22px center');
    }else{
      _this.removeClass('checked').find('.iconcheck').css('background-position','left center');
    }
  });

  //默认勾选
  $('.is-check').click();

  //最大购买
  $('#maxinvest').on('click',function(){
    $('#credits').val(maxBuyAmount);
    investMoney = parseInt($('#credits').val());
  });
  //按钮事件
  $('a[rel="invest-btn"]').on('click',function(){
	    
    $('#credits').trigger('keyup');
    //验证
    var self = $(this);
    if(self.hasClass('btn-invalid')) {
      return;
    }
    var _data = {};
    _data.password =  $.trim($('#dealpass').val());
    _data.amount = parseFloat($('#credits').val());
    _data.protocol = $('.is-check').hasClass('checked');

    if(_data.password.length<1) {
      messageBox('请输入交易密码',2);
      return;
    }
    if(!_data.protocol){
      messageBox('请先阅读并同意投资协议',2);
      return;
    }
    self.addClass('btn-invalid');
    $.ajax({
      type:'post',
      url: $('input[name=investurl]').val(),
      data:_data,
      success:function(data) {
        //存入成功
        layer.open({
          title: '存入成功',
          type: 1,
          area: ['500px'],
          content: '\<\div class="done"><h3><i class="iconfont">&#xe6a3;</i>恭喜您存入活期成功</h3><p>存入份额(元)：<span class="moneyPaid">' + data.amount + '</span><br>'+data.timeStr+'<span class="date">' + data.startIncomeDatestr + '<span></span></p>\<\/div>',
          btn: ['查看详情'],
          success: function (layero, index) {
            layero.find('.layui-layer-btn0').attr('href', $('input[name=accounturl]').val());
          },
          cancel:function(){
            location.reload();
          }
        });
      },
      error:function(xhr) {
    	messageBox(xhr.responseText,2);
      },
      complete:function(){
      	self.removeClass('btn-invalid');
      }
    });
  });
  //申请提额
  $('a[rel="raise-amount"]').click(function(){
    var activityEffect = $('input[name=activityEffect]').val();
    if (!activityEffect) {
      layer.open({
        title: '活动提示',
        type: 1,
        area: ['560px'],
        content: '\<\div class="done"><h3><i class="iconfont">&#xe61b;</i>活动已结束！</h3>\<\/div>',
        btn: ['确定']
      });
    } else {
      var awaitReceive = $('input[name=awaitReceive]').val();
      var maxBuyAmount = $('input[name=maxBuyAmount]').val();
      var maxLimitAmount = $('input[name=maxLimitAmount]').val();
      var leftBuyAmount = $('input[name=leftBuyAmount]').val();
      var canApply = $('input[name=canApply]').val();
      var appendStr = '';
      if (canApply) {
        appendStr = '，本次申请可达到'+maxLimitAmount+'元';
      } else {
        if (leftBuyAmount >= 1 && awaitReceive < 50000) {
          appendStr = ' （未满足条件：未使用完现有活期额度且当前代收总额不达标）';
        } else {
          if (leftBuyAmount >= 1) {
            appendStr = ' （未满足条件：未使用完现有活期额度）';
          } else if (awaitReceive < 50000) {
            appendStr = ' （未满足条件：当前代收总额不达标）';
          } else {
            appendStr = ' （未满足条件，不能申请提额）';
          }
        }
      }
      layer.open({
        title: '活期提额申请',
        type: 1,
        area: ['925px'],
        content: '\<\div class="raise-amount">\<div class="main"><p><span class="item">1、</span><span class="text">申请前提：申请提额的用户必须已使用完现有活期额度；</span></p><p><span class="item">2、</span><span class="text">首次申请：用户所能申请的提增额度，根据个人当前的待收(包含定期、全网通和个人转让，且债权期限≥30天)总额而定，具体活期提额标准如下：</span></p><table class="raise-amount-table"><tbody><tr><td class="text-title">待收总额所在区间</td><td>5万元≤待收<10万元</td><td>10万≤待收<20万元</td><td>20万元≤待收<50万元</td><td>50万元≤待收</td></tr><tr><td class="text-title">活期提增额度</td><td>2万</td><td>4万</td><td>6万</td><td>10万</td></tbody></table><p><span class="item">3、</span><span class="text">多次申请：如果用户多次申请活期提额，定期待收额必须处在下一个申请区间，同一个区间内只能申请一次。（例如：用户当前定期待收额为：5万元≤待收＜10万元申请一次，下次申请提额必须是当前定期待收额为：10万元≤待收）；</span></p><p><span class="item">4、</span><span class="text">提增额度一经申请成功，立即生效。活动时间：4月8日-4月30日。</span></p><span class="tips">提示：您当前定期待收( ≥30天)为'+awaitReceive+'元，当前活期额度为'+maxBuyAmount+'元'+appendStr+'</span></div><\/div>',
        btn: ['确认提交'],
        success: function (layero, index) {
          //判断是否有条件申请提额
          if (!canApply) {
            layero.find('.layui-layer-btn0').addClass('disabled');
            layero.find('.layui-layer-btn0').on('click', function(){
              $(this).preventDefault();
            })
          } else {
            layero.find('.layui-layer-btn0').on('click',function(){
              //不满足条件按钮无效
              if(!canApply && $(this).hasClass('disabled')){
                $(this).preventDefault();
              } else {
                $.ajax({
                  type:'get',
                  url: 'current/increaseAmount',
                  success:function(data) {
                    var myDate = new Date();
                    var currentDate = myDate.toLocaleDateString();
                    layer.open({
                      title: '提交成功',
                      type: 1,
                      area: ['560px'],
                      content: '\<\div class="done"><h3><i class="iconfont">&#xe61b;</i>恭喜您活期提额申请提交成功</h3><p class="text">申请说明：活期提额申请已经后台进行审核，一个工作日内审核完成。</p><p class="text">申请时间：' + currentDate +'</p>\<\/div>',
                      btn: ['确定']
                    });
                  },
                  error:function(xhr) {
                    messageBox(xhr.responseText,2);
                  }
                });
              }
            });
          }
        }
      });
    }
  });
})();
