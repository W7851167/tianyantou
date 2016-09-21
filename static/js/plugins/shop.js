(function() {
    /*商城*/
    //new Playmoveimg('mall-carousel');
    new Listmove('notice-move', {
          time: 3000,
          height: 28
        });
    new Listmove('lucky-move', {
          time: 3000,
          height: 28
        });
        
    if($('#my-score').text() === '请登录'){
      $('#my-score').on('click',function(){
        window.location = DOMAIN.account + '/signin.html';
      });
    }
    $('#my-item').on('click',function(){
      location.href = DOMAIN.account + '/shop.html';
    });
    
    var mask = $('<div class="item-mask"></div>');
    var logining = $("#logining").val();
    mask.insertBefore($('.item-main'));
    $('.item-box').hover(function(){
      var thisMask = $(this).find('.item-mask');
      $(this).find('.btn').removeClass('btn-gray').addClass('btn-blue');
      $(this).siblings().find('.item-mask').fadeOut();
      setTimeout(function(){
        thisMask.stop().fadeIn(300);
      },10);
    },function(){
      var thisMask = $(this).find('.item-mask');
      $(this).find('.btn').removeClass('btn-blue').addClass('btn-gray');
      $(this).siblings().find('.item-mask').fadeOut();
      setTimeout(function(){
        thisMask.stop().fadeOut(300);
      },10);
    });

    /*签到*/

    $('#checkin').one('click', function(e){
      
      $.ajax({
        url : '/shop/signin',
        type:'get',
        dataType:'json',
        success : function(data){
          if(data.ret < 0) {
            layer.msg('已经签到！',{icon:7,time:3000});
          } else {
            // 当前一共签到多少天:
            signinCount = data.info.SignCount;
            // 天数奖励列表
            signInReward = data.info.SignInReward;
            tomorrowCount = signinCount + 1;
            if(tomorrowCount > 7) {
              tomorrowReward = tomorrowCount%7==0? 7: tomorrowCount%7;
            } else {
              tomorrowReward = tomorrowCount;
            }
            text = '您已连续签到 '+signinCount+' 天，明日签到+'+signInReward[tomorrowReward]+''
            layer.msg(text,{icon:1,time:3000});
            $('#my-score').text(parseInt($('#my-score').text())+data.info.Score);
            $("#checkin").removeClass('btn-orange').addClass('btn-invalid').html('<i class="iconfont">&#xe69c;</i>明日签到+'+signInReward[tomorrowReward]+'');
          }
        }
      });
    });
    
    $('.mall-item-list').on('click','.item-box',function(e){
      var thisHref = $(this).find('a').attr('href');
      
      //如果是幸运抽奖物品
      if($(e.target).attr('rel') === 'lucky' || $(this).find('a').attr('rel') === 'lucky'){
        return false;
      }
      //如果点击了查看详情按钮
      if(e.target.tagName === 'A'){
        window.open(thisHref,'_blank');
        return false;
      }
      //如果点击了查看详情按钮
      window.open(thisHref,'_blank');
    });
    
    /*幸运抽奖*/
    $('a[rel="lucky"]').on('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      var $thisItemBox = $(this).parents('.item-box');
      //判断登录
      if(logining == 0) {
        layer.open({
            title:'登录',
            type: 1,
            area: ['350px', '220px'],
            content: '\<\div style="padding:30px 20px;text-align:center;">请登录后再进行操作\<\/div>',
            btn: ['立即登录'],
            success:function(layero,index) {
            layero.find('.layui-layer-btn0').attr('href',DOMAIN.account + '/signin.html');
          }
        });

        return ;

      }
      //判断商品是否抢光
      if($thisItemBox.find('.soldout').length > 0){
        layer.msg('商品已经抢光了',{icon:5,time:3000});
        return false;
      }
      
      itemId = $(this).attr("data-id");
      var html = '<div class="lucky-box"><h3></h3><img class="icon-pointer" src="http://static.tianyantou.com/images/mall/icon-pointer.png" /><div class="boxs"><i class="unopened"></i><i class="unopened"></i><i class="unopened"></i></div></div>',
          //积分值
          $payScore = parseInt($(this).parent().find('.rate').text()),
          $myScore = parseInt($('#my-score').text());
      layer.open({
        title: '幸运抽奖',
        type: 1,
        area: ['720px', '350px'],
        content:html,
        btn:['兑奖记录','逛商城'],
        success:function(layero,index) {
          layero.find('.layui-layer-btn').css('display','none');
        }
      });
      //抽中状态
       $('.lucky-box').on('click', 'i', function(e) {   
        //积分不足
        if($myScore < $payScore){
          layer.msg('积分不足',{icon:5,time:3000});
          return false;
        }     
        var self = $(this),
            $boxs = self.parent('.boxs'),
            $sibs = self.siblings('i'),
            url = '/shop/lottery/?itemId='+itemId,
            $pointer = $('.icon-pointer'),
            classname = 'pointer-box'+self.index();
            
            if(self.hasClass('disabled')){
              return;
            }
            
            self.addClass('disabled');
            $sibs.addClass('disabled');
          $.ajax({
            url : url,
            type : 'get',
            dataType: 'json',
            success : function(d){
              $pointer.show().addClass(classname);
              var code  = d.ret,
                result = d.msg;
                if(code === 1){
                  self.removeClass('unopened').addClass('winning');
                  setTimeout(function(){
                    $sibs.removeClass('unopened').addClass('missed');
                    var newHtml = $('<div class="exchange-tip"><h3>尊敬的用户,恭喜您已中奖！</h3><p>请前往个人中心-积分商城查看</div>') 
                    setTimeout(function(){
                      $('.layui-layer').css({
                        'width':'400px',
                        'height':'240px',
                        'left':'50%',
                        'margin-left':'-200px'
                      }).find('.lucky-box').remove().end()
                      .find('.layui-layer-title').text('提示').end()
                      .find('.layui-layer-content').css('height','112px').append(newHtml).end()
                      .find('.layui-layer-btn').css('display','block').end()
                      .find('.layui-layer-btn0').attr('href',DOMAIN.account + '/shop.html').end()
                      .find('.layui-layer-btn1').on('click',function(){
                        $('.layui-laye').fadeOut(200);
                      });
                    },1000);
                  }, 1000);
                } else if(code < 0) {
                  layer.msg(result,{icon:5,time:3000});
                  return false;
                }
                else{
                   self.removeClass('unopened').addClass('missed');
                   var index0 = Math.round( Math.random()*1),index1 = index0 === 0 ? 1:0;
                    setTimeout(function(){
                      $sibs.eq(index0).removeClass('unopened').addClass('missed');
                      $sibs.eq(index1).removeClass('unopened').addClass('winning');
                    }, 1000);
                }
              $('#my-score').text($myScore-$payScore);
            },
            error : function(d){
              console.log(d);
            }
          });
      });
    });

    // 从庆祝加入中国金融协会专题页跳转的处理
    var hashz=location.hash,
        tabNav=null,
        conNav=null;
    if(hashz=="#jiaxi"){
        tabNav=$(".tab-nav").find("li");
        conNav=$(".tab-main").children();
        tabNav.eq(2).addClass("active").siblings().removeClass("active");
        conNav.eq(2).addClass("active").siblings().removeClass("active");
    }
    
    
    //点击弹窗按钮关闭弹窗
    $('.layer-close').on('click',function(){
      $(this).parents('.overlayer').fadeOut(200);
    });
    
    /*幸运大抽奖*/
    //背景闪烁，选中效果
    var flash = $('<div class="flash"><div class="light-style1"></div><div class="light-style2"></div><div class="light-style1"></div><div class="light-style2"></div><div class="light-style1"></div><div class="light-style2"></div><div class="light-style1"></div><div class="light-style2"></div><div class="light-style1"></div><div class="light-style2"></div><div class="light-style1"></div><div class="light-style2"></div><div class="light-style1"></div><div class="light-style2"></div></div>');
    var selected = $('<div class="selected"></div>');
    $('#lottery1').append(flash);
    $('#lottery1').find('.lottery-unit').append(selected);
    
    //转盘
    (function(){
      var lottery = {
        index: 0, //当前转动到哪个位置，起点位置
        count: 0, //总共有多少个位置
        timer: 0, //setTimeout的ID，用clearTimeout清除
        speed: 20, //初始转动速度
        times: 0, //转动次数
        cycle: 50, //转动基本次数：即至少需要转动多少次再进入抽奖环节
        prize: 0, //中奖位置
        isWinning: false,
        init: function(id) {
          if ($("#" + id).find(".lottery-unit").length > 0) {
            $lottery = $("#" + id);
            $units = $lottery.find(".lottery-unit");
            this.obj = $lottery;
            this.count = $units.length;
            //$lottery.find(".lottery-unit-" + this.index).addClass("active");
          }
        },
        roll: function() {
          var index = this.index;
          var count = this.count;
          var lottery = this.obj;
          $(lottery).find(".lottery-unit-" + index).removeClass("active");
          index += 1;
          if (index > count - 1) {
            index = 0;
          }
          $(lottery).find(".lottery-unit-" + index).addClass("active");
          this.index = index;
          return false;
        },
        stop: function(index) {
          this.prize = index;
          return false;
        }
      };
  
      function roll() {
        lottery.times += 1;
        lottery.roll();
        var prize_site = $("#lottery1").attr("prize_site");
        //抽奖扣除积分
        if (lottery.times > lottery.cycle + 10 && lottery.index == prize_site) {
          if(lottery.isWinning){//中奖
            //弹出中奖提示框
            var prize_name = $("#lottery1").attr("prize_name"),
                prize_img = $("#lottery1").attr("prize_img");
            $('#prize .layer-content').find('.title').text(prize_name);
            $('#prize .layer-content').find('.stuff').attr('src',prize_img);
            $('#prize').delay(1000).fadeIn(200); 
            
            $('#my-score').html(score);
          }else{//没中奖
            setTimeout(function(){
              layer.msg('谢谢参与',{icon:5,time:3000});
            },1000);
          }
          clearTimeout(lottery.timer);
          lottery.prize = -1;
          lottery.times = 0;
          click = false;
        } else {
          if (lottery.times < lottery.cycle) {
            lottery.speed -= 10;
          } else if (lottery.times == lottery.cycle) {
            var index = Math.random() * (lottery.count) | 0;
            lottery.prize = index;
          } else {
            if (lottery.times > lottery.cycle + 10 && ((lottery.prize == 0 && lottery.index == 7) || lottery.prize == lottery.index + 1)) {
              lottery.speed += 110;
            } else {
              lottery.speed += 20;
            }
          }
          if (lottery.speed < 40) {
            lottery.speed = 40;
          }
          lottery.timer = setTimeout(roll, lottery.speed);
        }
        return false;
      }
      var click = false;
      var score = 0;
      $(function() {
        
        lottery.init('lottery1');
        $('#lottery1 a[rel="go"]').click(function() {
          if (click) {
            return false;
          } else {
            lottery.speed = 100;
            $.post('/shop/lottery',function(data) { //获取奖品，也可以在这里判断是否登陆状态
              if (data.ret == -100) {//没有登录
                layer.open({
                  title:'登录',
                  type: 1,
                  area: ['350px', '220px'],
                  content: '\<\div style="padding:30px 20px;text-align:center;">请登录后再进行操作\<\/div>',
                  btn: ['立即登录'],
                  success:function(layero,index) {
                  layero.find('.layui-layer-btn0').attr('href',DOMAIN.account + '/signin.html');
                  }
                });
                return;   
              }else if(data.ret == 1001){//积分不足
                layer.msg(data.msg,{icon:5,time:3000});
                return;
              }else if(data.ret == 0){//没中奖
                lottery.isWinning = false;
                $('#lottery1').attr('prize_site', 8);
                roll();
                //抽奖积分-50
                $('#my-score').html($('#my-score').text()-50);
              }else if(data.ret == 1){//中奖
                score = data.userScoreInfo.score;
                lottery.isWinning = true;
                
                dataid = data.info.ItemId;
                img = $('[data-id='+dataid+']').find('img').attr('src');
                classid = $('[data-id='+dataid+']').attr('class-id');
                console.log(classid);
                $('#lottery1').attr('prize_site', classid);
                $('#lottery1').attr('prize_id', classid+1);
                $('#lottery1').attr('prize_name', data.info.ItemName);
                $('#lottery1').attr('prize_img', img);
                
                roll();
                //抽奖积分-50
                $('#my-score').html($('#my-score').text()-50);
              }
              click = true;
              return false;
            }, 'json');
          }
        });
      });
    })();
    
  })();
