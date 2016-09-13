(function() {
  var mask = $('<div class="plat-mask"></div>');
  mask.insertBefore($('.plat-main'));
  $('.plat-box').on('mouseenter',function(){
    var thisMask = $(this).find('.plat-mask');
    if(!thisMask.is(':animated')){
      $(this).siblings().find('.plat-mask').fadeOut();
      thisMask.stop().fadeIn(300);
    }
  });
  $('.plat-box').on('mouseleave',function(){
    var thisMask = $(this).find('.plat-mask');
    if(!thisMask.is(':animated')){
      thisMask.stop().fadeOut(300);
    }
  });

  
  var quantity = $('.quantity');
  quantity.keyup(function(){
    checkInput();
  }).blur(function(){
    checkInput();
  });
  
  function checkInput(){
    var _regExp = /^[0-9]+$/;
    if(!_regExp.test(quantity.val())){
      quantity.val('');
      return false;
    }
    if(parseInt($('.amount').text()) === 0){
      return false;
    }
    if(quantity.val() >　parseInt($('.amount').text())){
      quantity.val('');
      return false;
    }
  }

  $('#exchange').dblclick(function(){
    return false;
  });
  
  function loginAlert() {
    layer.open({
      title:'登录',
      type: 1,
      area: ['350px', '220px'],
      content: '\<\div style="padding:30px 20px;text-align:center;">请登录后再进行操作\<\/div>',
      btn: ['立即登录'],
      success:function(layero,index) {
        layero.find('.layui-layer-btn0').attr('href','https://account.touzhijia.com/signin.html');
      }
    });
  }

  $('#exchange').on('click',function(e){
    e.preventDefault();
    var is_login = $("#is_login").val();
    var maxBuyNums = $('input[name=maxBuyNums]').val();
    if(is_login == 0) {
      loginAlert();
      return false;
    }
    if (maxBuyNums != -1) {
      if ($("#need_amount").val() > maxBuyNums) {
        layer.open({
          title:'提示',
          type: 1,
          area: ['350px', '220px'],
          content: '\<\div style="padding:30px 20px;text-align:center;">最多购买'+maxBuyNums+'张\<\/div>',
          btn: ['确定'],
          success:function(layero,index) {
            layer.closeAll('dialog');
          }
        });
        return false;
      }
    }
    layer.confirm('请确认是否兑换？',{
      title: '提示',
      btn: ['确定','取消'],
    },function() {
      layer.closeAll('dialog');
      var id = $("#itemId").val();
      var amount = $("#amount").html();
      var need_amount = $("#need_amount").val();
      var solded = $(".option").find("em").html();
      var itemType = $('#exchange').attr('item-type');
      //去激活改成查看使用
      var buttonText = itemType==1?"查看使用":"填写地址";
      $.ajax({
        url:"/shop/buy",
        type: 'post',
        dataType: 'json',
        data:{"Amount":need_amount,"Id":id},
        error:function(){   
          layer.msg('请求服务失败',{icon:2,time:3000});
        },   
        success:function(data){   
          if(data.ret > 0) {
            $("#need_amount").val(0);
            $("#amount").html(amount-parseInt(need_amount));
            $(".option").find("em").html(parseInt(solded)+parseInt(need_amount));
            var isRaiseRateCoupon = (data.data.VirtualItemCategory == 4) ? true : false;
            var isJiaCoupon = (data.data.VirtualItemCategory == 6) ? true : false;
            if (isRaiseRateCoupon) {
              showRaiseRateCouponTipBox(data.data);
              return ;
            }
            if (isJiaCoupon) {
              return showJiaCouponTipBox(data.data);
            }
            if (data.goodsType == 'zczj') {
            	$('#exchange').css({
            		'backgroundColor': '#CCC',
            		'cursor': 'not-allowed'	
            	}).off();
            }
            layer.open({
              type: 1,
              title:'提示',
              area: ['400px', '240px'],
              content: '\<div class="exchange-tip"><h3>尊敬的用户,您已经兑换成功！</h3><p>'+data.msg+'</p>\<\/div>',
              btn: data.goodsType == 'zczj' ? ['立即去领取'] : [buttonText,'继续兑换'],
              success:function(layero,index) {
                if(itemType === '1'){
                  layero.find('.layui-layer-btn0').attr('href','http://account.touzhijia.com/shop.html');
                }else if(itemType === '2'){
                  layero.find('.layui-layer-btn0').attr('href','http://account.touzhijia.com/shop.html#presents');
                }
                if (data.goodsType == 'zczj') {
                  layero.find('.layui-layer-btn0').attr('href','http://www.zczj.com/passport/reg?source=tzj');
                } else {
                  layero.find('.layui-layer-btn1').attr('href','/shop/item/'+id);
                }
              }
            });
          } else { 
            if (data.ret == -1){
              layer.open({
                title:'登录',
                type: 1,
                area: ['350px', '220px'],
                content: '\<\div style="padding:30px 20px;text-align:center;">请登录后再进行操作\<\/div>',
                btn: ['立即登录'],
                success:function(layero,index) {
                  layero.find('.layui-layer-btn0').attr('href','https://account.touzhijia.com/signin.html');
                }
              });
            } else {
              layer.msg(data.msg,{icon:5,time:3000});
  
            }
          }
        }
      })
    },function(){
      layer.close();
    });
  });

function showRaiseRateCouponTipBox(data) {
  layer.open({
    type: 1,
    title:'提示',
    area: ['400px', '240px'],
    content: '\<div class="exchange-tip"><h3>恭喜您兑换成功！</h3><p>\
    立即前往<span style="color:#FA8128">'+data.TicketInfo.PlatformCnName+'</span>投资，享受<span style="color:#FA8128">'+data.TicketInfo.InterestRate+'%</span>的加息吧\
    </p>\<\/div>',
    btn: ['立即投资', '查看详情'],
    success:function(layero,index) {
      layero.find('.layui-layer-btn0').attr('href', data.TicketInfo.PlatformUrl);
      layero.find('.layui-layer-btn1').attr('href', 'https://account.touzhijia.com/coupon/index.html');
    }
  });
}


function showJiaCouponTipBox(data) {
  layer.open({
    type: 1,
    title:'提示',
    area: ['400px', '240px'],
    content: '\<div class="exchange-tip"><h3>恭喜您兑换成功！</h3><p>请前往个人中心查看使用</p>\<\/div>',
    btn: ['查看详情','立即使用'],
    success:function(layero,index) {
      layero.find('.layui-layer-btn1').attr({'href':'http://www.jia.com/page/bd/zztzj/94787.html?code=' + data.VirtualItem.Code, 'target':'_blank'});
      layero.find('.layui-layer-btn0').attr('href', 'https://account.touzhijia.com/shop.html');
    }
  });
}

}());
