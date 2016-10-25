function messageBox(text, type, timeout) {
  timeout = timeout || 3000;
  layer.msg(text, {
    icon: type,
    timeout: timeout
  });
}
function popOverTip(selector, text) {
  var index = null;
  $(document).on('mouseenter', selector, function() {
    var self = $(this),
      content = '<p style="color:#fff;font-size:12px;">' + text + '</p>';
    index = layer.tips(content, self);
  }).on('mouseleave', selector, function() {
    layer.close(index);
  });
}

var showMessage = (function() {
  var msgIcons = {
    success: '&#xe61b;',
    warning: '&#xe676;',
    error: '&#xe664;'
  };
  return function(obj, text, type) {
    var icon = msgIcons[type];
    obj.html('<div class="msg-' + type + '" ><i class="iconfont">' + icon + '</i><span>' + text + '</span></div>').show();
  }
}());

$.fn.extend({
  countdown: function(seconds) {
    var secs = seconds,
      timer = null,
      self = $(this);
    self.attr('disabled', 'disabled');

    function count() {
      if (!!secs) {
        self.removeClass('btn-captcha').addClass('btn-invalid');
        self.html(secs + '秒后重新发送');
        secs--;
        if (!!timer) {
          clearTimeout(timer);
        }
        timer = setTimeout(function() {
          count();
        }, 1000);
      } else {
        self.removeClass('btn-invalid').addClass('btn-captcha');
        self.html('重新发送');
        self.removeAttr('disabled');
      }
    }
    count();
  }
});

/*顶部广告关闭*/
(function(){
  var headEvent = $('#head-event');
  headEvent.find('.close-btn').on('click',function(){
    headEvent.slideUp();
  });
})();

(function() {
  /*******浮动导航效果*******/
  //头部二维码效果
  $('#loginStart').hover(function() {
    $(this).siblings('.code-login').css('display', 'block');
  }, function() {
    $(this).siblings('.code-login').css('display', 'none');
  });
  
  var flostNav = $("#main-float-navo"),
      closeflNav = flostNav.find(".close-nav"),
      showbtn = flostNav.find(".onoroff"),
      ads=$(".ad-float"),
      flnavTimer = null;
  $(".returntop").on("click", function() {
    $("html,body").animate({
      "scrollTop": 0
    }, 500);
  })
  setPos();
  //窗口缩小，动态设置浮动导航的位置
  $(window).on("resize", function() {
      clearTimeout(flnavTimer);
      flnavTimer = setTimeout(function() {
        setPos();
      }, 300);
    })
    /*flostNav.on("click",function(ev){
      if(ev.target.className=="peoplelink"){
        $(this).attr("closebz","0").stop().animate({"right":"-10px"},400);
        return false;
      }
    })*/
  showbtn.on("click", function() {
    openFloat();
  })
    //点击关闭按钮，往里面收缩浮动导航
  closeflNav.on("click", function() {
    closeFloat();
  })
  ads.find('.close-btn').on('click',function(){
    ads.animate({'right' : '-220px'},400);
  });
    //动态设置左导航位置
  function setPos(){
    if(flostNav.length>0){
      var windoww=$(window).width(),
          windowh=$(window).height();
          
      if(ads.length>=1){
        if(windowh < 600){
          //flostNav.hide();
          ads.removeClass("fixed-bottom")
          return;
        }else{
          ads.addClass("fixed-bottom")
        }
      }
        
      if(windoww<1400){
          closeFloat();
      } else if(windoww < 1200){
        ads.removeClass("fixed-bottom")
      }else if(windoww>=1400){
        ads.addClass("fixed-bottom")
        openFloat()
      }
    } 
  }

  function closeFloat() {
    flostNav.show().stop().animate({
      "right": "-95px"
    }, 400, function() {
      //showbtn.show();
      peopleShow();
    });
  }

  function openFloat() {
    //showbtn.hide();
    peopleHide();
      //518修改为"right":"0"
    flostNav.show().stop().delay(500).animate({
      "right": "0px"
    }, 400);
  }

  function peopleShow() {
    showbtn.animate({
      "left": "-52px"
    }, 500);
  }

  function peopleHide() {
    showbtn.animate({
      "left": "95px"
    }, 500);
  }
  //人物交互JS
  if ($("#eye1").length == 1) {
    var r = 2,
      T1 = 42,
      L1 = 22,
      T2 = 40,
      L2 = 58;

    document.onmousemove = function(ev) {
        var ev = ev || window.event;

        change(gid('eye1'), ev.clientX, ev.clientY, T1, L1);
        change(gid('eye2'), ev.clientX, ev.clientY, T2, L2);

        function change(obj, x, y, t, l) {

          var zhi1 = getOffset(obj).left;
          var zhi2 = getOffset(obj).top;

          var a = Math.abs(x - zhi1);
          var b = Math.abs(y - zhi2);

          var reg = Math.atan(a / b);
          var chax = r * Math.sin(reg);
          var chay = r * Math.cos(reg);

          if (x > zhi1 && y < zhi2) {
            //右上

            obj.style.left = l + chax + 'px';
            obj.style.top = t - chay + 'px';

          } else if (x > zhi1 && y > zhi2) {
            //右下
            obj.style.left = l + chax + 'px';
            obj.style.top = t + chay + 'px';
          } else if (x < zhi1 && y > zhi2) {
            //左下
            obj.style.left = l - chax + 'px';
            obj.style.top = t + chay + 'px';
          } else if (x < zhi1 && y < zhi2) {
            //左上
            obj.style.left = l - chax + 'px';
            obj.style.top = t - chay + 'px';
          }
        }
      }
      //获取眼睛的offset位置
    function getOffset(obj) {
      var itop = 0,
        tleft = 0;
      while (obj) {
        itop += obj.offsetTop;
        tleft += obj.offsetLeft;
        obj = obj.offsetParent;
      }
      return {
        left: tleft,
        top: itop
      };
    }
    //根据ID获取属性
    function gid(v) {
      return document.getElementById(v);
    }
  }
  /*计算器代码*/
  var calcFormo = $("#calcform");
  $('#calcBtn').click(function() {
    $("#sumAmount").text("0");
    $("#interest").text("0");
    var amountForm = $("#amount"),
      deadlineForm = $("#deadline"),
      interestRateForm = $("#interestRate"),
      repaymentTypeForm = $("#repaymentType"),
      creditRateForm = $("#creditRate");
    if (amountForm.val() == "") {
      //alert("请输入投资金额!");
      layer.msg("请输入投资金额!", {
        time: 2000,
        skin: "yzform-tips",
        icon: 2,
        end: function() {
          amountForm.focus();
        }
      })
      return false;
    }
    if (deadlineForm.val() == "") {
      //alert("请输入投入时长!");
      layer.msg("请输入投入时长!", {
        time: 2000,
        skin: "yzform-tips",
        icon: 2,
        end: function() {
          deadlineForm.focus();
        }
      })
      return false;
    }
    if (deadlineForm.val() == "") {
      //alert("请输入年化利率!");
      layer.msg("请输入年化利率!", {
        time: 2000,
        skin: "yzform-tips",
        icon: 2,
        end: function() {
          deadlineForm.focus();
        }
      })
      return false;
    }
    if (repaymentTypeForm.val() == "") {
      //alert("请选择还款方式!");
      layer.msg("请选择还款方式!", {
        time: 2000,
        skin: "yzform-tips",
        icon: 2,
        end: function() {
          repaymentTypeForm.focus();
        }
      })
      return false;
    }
    var amount = parseInt($("#amount").val()); //金额
    var deadline = parseInt(deadlineForm.val()); //月
    var interestRate = $("#interestRate").val(); //利率
    var creditRate = creditRateForm.val(); //奖励
    var repaymentType = $("#rePayWaySelect1").val();
    if ($("#amount").val() == "") {
      amount = 0;
    }

    if (creditRate == "") {
      creditRate = 0;
    }
    if (parseInt(creditRate) >= 100) {
      //alert("奖励比率不能超过100!");
      layer.msg("奖励比率不能超过100!", {
        time: 2000,
        skin: "yzform-tips",
        icon: 2,
        end: function() {
          creditRateForm.focus();
        }
      })
      creditRateForm.val("");
      return false;
    }
    //creditRate=parseInt(creditRate);
    var result = "";
    var unitVal = $('input:radio[name="time"]:checked').val();
    if (unitVal == "1") {
      if (repaymentType == '1' && $("#interestRate").val() != "" && $("#deadline").val() != "") {
        result = calcDQHBX(amount, deadline, interestRate, creditRate);
      } else if (repaymentType == "2" && $("#interestRate").val() != "" && $("#deadline").val() != "") {
        result = calcAYHBX(amount, deadline, interestRate, creditRate);
      } else if (repaymentType == "3" && $("#interestRate").val() != "" && $("#deadline").val() != "") {
        if (deadline % 3 > 0) {
          layer.msg("当还款方式为【按季还本息时】投入时长必须为3的整数倍!", {
            time: 2000,
            skin: "yzform-tips",
            icon: 2,
            end: function() {
              deadlineForm.focus();
            }
          })
          return false;
        }
        result = calcAJHBX(amount, deadline, interestRate, creditRate);
      }
    } else {
      result = calcDQHBXR(amount, deadline, interestRate, creditRate);
    }
    $("#resultCon").show();
    $("#sumAmount").text(result.toFixed(2));
    $("#interest").text((result - amount).toFixed(2));
  });

  $('#cancelCalcBtn').click(function() {
    calcreset();
  });
  //计算器弹出调用代码
  $("#calcStart").on("click", function() {
      layer.open({
        type: 1,
        title: "计算器",
        area: ["540px"],
        content: $("#a_calc"),
        success: function() {
          calcreset();
        }
      })
    })
    //到期还本息
  function calcDQHBX(amount, time, rate, bonus) {
    var result = amount * (1 + (rate / 100) * (time / 12)) + amount * (bonus / 100);
    return result;
  }
  //按月还本息
  function calcAYHBX(amount, time, rate, bonus) {
    //月利率
    rate = rate / (100 * 12);
    var result = (amount * rate * Math.pow((1 + rate), time)) / (Math.pow((1 + rate), time) - 1);
    result = result * time + amount * (bonus / 100);
    return result;
  }
  //按季还本息
  function calcAJHBX(amount, time, rate, bonus) {
    var size = time / 3;
    var result = 0;
    //月利率
    rate = rate / (100 * 12);
    for (var i = 0; i < size; i++) {
      //每一轮的前两个月还款利息
      var tmpA = amount * (1 - ((3 * i) / time)) * rate * 2;
      //每一轮的最后一个月还款金
      var tmpB = amount * (1 - ((3 * i) / time)) * rate + (3 / time) * amount;
      result += tmpA + tmpB;
    }
    result += amount * (bonus / 100);
    return result;
  }
  //到期还本息(日)
  function calcDQHBXR(amount, time, rate, bonus) {
    var result = amount * (1 + (rate / 100) * (time / 365)) + amount * (bonus / 100);
    return result;
  }
  //重置函数
  function calcreset() {
    calcFormo[0].reset();
    $("#resultCon").hide();
    $("#sumAmount").text('0');
    $("#interest").text('0');
  }
})();


var Ucenter = (function() {
  var sidenav = $('.user-center .l-side-menu'),
    main = $('.user-center .main');

  /*common interactive effect*/
  function commonInteract() {
    /*top dropdown*/
    var myMenu = $('.my-menu'),
      menuBox = myMenu.find('.menu-box');

    myMenu.hover(
      function() {
        $(this).addClass('menu-bg');
        menuBox.show();
      },
      function() {
        $(this).removeClass('menu-bg');
        menuBox.hide();
      }
    );

    /* scan weixin qrcode */
    $('#h_weixin,#phone-code').hover(
      function() {
        $(this).next().show();
      },
      function() {
        $(this).next().hide();
      }
    );
 
    /*数字加载动画*/
    $(".data-num").each(function(i,e){
      var o = $(this);
      var t = 10;
      var changenum=o.attr("datanum");
      var val = parseInt(changenum.replace(/,/g,""))/t;
      var setIntervalId = window.setInterval(function(){
        if(t--){
          var v = parseInt(val*(10-t)).toString();
          var varr = v.split("");
          for (var i = varr.length-4; i >= 0; i -= 3) varr[i] += ",";
          o.text(varr.join(""));
        }
        else{clearInterval(setIntervalId);}
      },100);
    });
    /*side menu slide up and down */
    $('.first-menu').each(function() {
      var self = $(this),
        active = self.find('.active'),
        unfold = '&#xe671;',
        fold = '&#xe670;';

      self.find('.current').parent('.second-menu').show();
      active.find('.second-menu').show();
      self.find('.arrow').html(unfold);
      active.find('.arrow').html(fold);

      self.on('click', 'h3', function() {
        var that = $(this),
          curli = that.parent(),
          isActive = curli.hasClass('active');

        if (isActive) {
          curli.removeClass('active').find('.second-menu').slideUp();
          that.find('.arrow').html(unfold);
        } else {
          curli.addClass('active').find('.second-menu').slideDown(function() {
            Ucenter.readaptSidemenuAndMainpanel();
          });
          that.find('.arrow').html(fold);
          curli.siblings().removeClass('active').find('.second-menu').slideUp();
          that.siblings().find('.arrow').html(unfold);
        }
      });
    });

    $('.user-center').on('click', '.tab', function() {
      readaptSidemenuAndMainpanel();
    });

    /*pagination paging*/
    $('.user-center').on('click', '.pagination i,.paging i', function() {
      $(this).parent('a').trigger('click');
    });

    /*platform manage*/
    $(function(){
      var $platformManage = $('.platform-manage');
      if (!$platformManage.length) {
        return;
      }
      var $projectOrigin = $platformManage.find('.project-origin');
      var activeIndex = $projectOrigin.find('.active').index();
      var $openFilterBtn = $('.filterBtnOpen');
      var $closeFilterBtn = $('.filterBtnClose');
      if (activeIndex > 10) {
        $closeFilterBtn.show();
        $openFilterBtn.hide();
        $projectOrigin.css('height', 'auto');
      }
    });

  }

  /*reset the height of sidemenu and main panel*/
  function readaptSidemenuAndMainpanel() {
    var mainInner = $('.main-inner'),
      sideMenuList = sidenav.find('.first-menu');
    if (!mainInner.length) {
      return;
    }
    var content_h = mainInner[0].offsetHeight || mainInner.height(),
      main_h = main.height(),
      side_h = sidenav.height(),
      list_h = sideMenuList[0].offsetHeight || sideMenuList.height();

    if (content_h > list_h) {
      sidenav.height(content_h);
      main.height(content_h);
    } else if (content_h <= list_h) {
      sidenav.height(list_h);
      main.height(list_h);
    } else {
      return;
    }
  }
  
  //check in effect
  $('.checkin-area').on('click', '.check-in', function() {
    var self = $(this),
      $span = self.find('span'),
      point = $span.text(),
      $i = self.siblings('i'),
      score = 10,
      isChecked = self.hasClass('checked');
    point = parseInt(point, 10);
    if (!isChecked) {
      $.ajax({
        url: '/shop/signin',
        type: 'get',
        dataType: 'json',
        success: function(data) {
          if (data.ret < 0) {
            messageBox('您今天已经签过到了哦', 2, 1000);
          } else {
            score = data.info.Score;
            $i.text('+' + score);
            $i.animate({
              opacity: 1,
              top: '-36px',
              left: '150px'
            }, 600, function() {
              $(this).animate({
                opacity: 0,
                top: '-48px',
                left: '160px'
              }, 600);
            });
            self.addClass('checked');
            point += score;
            $span.text(point);

            // 当前一共签到多少天:
            signinCount = data.info.SignCount;
            // 天数奖励列表
            signInReward = data.info.SignInReward;
            tomorrowCount = signinCount + 1;

            if (tomorrowCount > 7) {
              tomorrowReward = tomorrowCount % 7 == 0 ? 7 : tomorrowCount % 7;
            } else {
              tomorrowReward = tomorrowCount;
            }

            h = '<p>您已连续签到 <em class="checkin-days">' + signinCount + '</em>天，明日签到<em class="check-points">+' + signInReward[tomorrowReward] + '</em></p>';
            $(".checkin-rules").children().html(h);

          }
        }
      });


    } else {
      messageBox('您今天已经签过到了哦', 2, 1000);
    }

  });

  function getCookie() {
    var allCookies = document.cookie,
      cookieArray = allCookies.split('; '),
      cookieObject = {},
      lens = cookieArray.length,
      key = '',
      value = '',
      i = 0;
    for (; i < lens; i++) {
      key = cookieArray[i].split('=')[0];
      value = cookieArray[i].split('=')[1];
      cookieObject[key] = value;
    }
    return cookieObject;
  }

  //markAsNew('shop', 30, '2015/11/17')     
  function markAsNew(identifier, days, start) {
    var cookie = getCookie(),
      days = days || 0;
    cookie = cookie['isinformedof' + identifier];
    //if the cookie is undefined, then the user isn't informed
    if (!cookie) {
      //insert the dot to inform our user of the new program
      $('.l-side-menu').find('a').each(function() {
        var self = $(this),
          href = $(this).attr('href'),
          secondMenuParent = self.parents('.second-menu'),
          isNew = href.indexOf(identifier);
        if (isNew !== -1) {
          self.append('<b class="newnoticedot"></b>');

          if (secondMenuParent.length) {
            secondMenuParent.siblings('h3').append('<b class="newnoticedot"></b>');
          }
          //when user view the program , create cookie
          self.parent('li').on('click', function() {
            var date = new Date(start),
              expires = '';
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toGMTString();
            document.cookie = 'isinformedof' + identifier + "=true" + expires + '; path=/';
          });
        }
      });
    }
    return;
  }

  function setupSendVerifyCodeBtn() {
    $(document).on('click', '[data-toggle=verifyCode]', function(e) {
      e.preventDefault();
      var self = $(this);
      if (self.hasClass('btn-invalid')) {
        return;
      }
      var action = self.data('action');
      var tel = self.data('tel') || 'user';
      if (tel != 'user') {
        tel = $(tel).val();
        if (!(/^1[3|4|5|7|8][0-9]\d{4,8}$/.test(tel))) {
          messageBox('请输入正确的手机号码', 2);
          return;
        }
      }
      var url = '/common/sendVerifyCode?action=' + action + '&telephone=' + tel;
      if (action == 'register') {
        var $captcha = self.parent().prev();
        var _captcha = $captcha.find('input[name=captcha]').val();
        var _captcha_token = $captcha.find('input[name=captcha_token]').val();
        if (_captcha.length < 1) {
          messageBox('请输入图形验证码以发送短信', 2);
          return;
        }
        url = url + '&captcha=' + _captcha + '&captcha_token=' + _captcha_token;
      }
      self.addClass('btn-invalid').removeClass('btn-captcha');
      $.ajax({
        url: url,
        method: "post",
        success: function(data) {
          self.countdown(60);
        },
        error: function(xhr) {
          var ct = xhr.getResponseHeader('content-type');
          if (ct.indexOf('plain') > -1) {
            messageBox(xhr.responseText, 2);
          } else {
            messageBox('系统繁忙请稍后重试，天眼投客服电话 400-883-1803', 2);
          }
          self.addClass('btn-captcha').removeClass('btn-invalid');
        }
      });
    });
  }

  function setupSendEmailBtn() {
    $(document).on('click', '[data-toggle=verifyEmail]', function(e) {
      e.preventDefault();
      var self = $(this);
      if (self.hasClass('btn-invalid')) {
        return;
      }
      var url = self.data('url');
      var email = self.data('email') || '';
      var action = self.data('action');
      if (email != '') {
        var _emailp = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
        email = $(email).val();
        if (!_emailp.test(email)) {
          messageBox('请输入正确的邮箱', 2, 2000);
          return false;
        }
        url = url + '?action=' + action + '&email=' + email;
      }
      self.addClass('btn-invalid').removeClass('btn-captcha');
      $.ajax({
        url: url,
        method: "post",
        success: function(data) {
          if(data.status){
            self.countdown(60);
          }else{
            self.addClass('btn-captcha').removeClass('btn-invalid');
            messageBox(data.message,2);
          }
        },
        error: function(xhr) {
          var ct = xhr.getResponseHeader('content-type');
          if (ct.indexOf('plain') > -1) {
            messageBox(xhr.responseText, 2);
          } else {
            messageBox('系统繁忙请稍后重试，天眼投客服电话 400-883-1803', 2);
          }
          self.addClass('btn-captcha').removeClass('btn-invalid');
        }
      });

    });
  }

  return {
    init: function() {
      $(document).on('click', '.btn-invalid', function(e) {
        e.preventDefault();
        e.stopPropagation();
      });
      commonInteract();
      /*左侧栏自适应*/
      readaptSidemenuAndMainpanel();
      setupSendEmailBtn();
      setupSendVerifyCodeBtn();
    },
    readaptSidemenuAndMainpanel: function() {
      readaptSidemenuAndMainpanel();
    },
    disableSubmit: function(obj) {
      obj.prop('disabled', 'disabled');
      obj.removeClass('btn-blue').addClass('btn-invalid');
    },
    enableSubmit: function(obj) {
      obj.removeProp('disabled');
      obj.removeClass('btn-invalid').addClass('btn-blue');
    }
  }
}());
Ucenter.init();
