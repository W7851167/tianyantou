/*菜单*/
(function(){
  /*头部菜单*/
  var myMenu = $('.my-menu');
  myMenu.hover(function(){
    $(this).addClass('menu-bg').find('.menu-box').show();
  },function(){
    $(this).removeClass('menu-bg').find('.menu-box').hide()
  });
  /*一级菜单折叠效果*/
  var firstMenu = $('.first-menu');
  firstMenu.find('.second-menu').hide();
  firstMenu.find('.active').find('.second-menu').show();
  firstMenu.find('.arrow').html('&#xe671;');
  firstMenu.find('.active').find('.arrow').html('&#xe670;');
  firstMenu.on('click', 'h3',function(e){
    if(e.target.className == "btn btn-blue") return;
    var _this = $(this);
    var thisLi = _this.parent();
    if(thisLi.hasClass('active')){
      thisLi.removeClass('active').find('.second-menu').slideUp();
      _this.find('.arrow').html('&#xe671;');
    }
    else{
      thisLi.addClass('active').find('.second-menu').slideDown();
      _this.find('.arrow').html('&#xe670;');
      thisLi.siblings().removeClass('active').find('.second-menu').slideUp();
      thisLi.siblings().find('.arrow').html('&#xe671;');
    }
  });
})();

/*头部微信扫码*/
(function(){
  $('#h_weixin,#phone-code').hover(function(){
    $(this).next().fadeIn(100);
  },function(){
    $(this).next().fadeOut(100);
  });
  $('#loginStart').hover(function(){
    $(this).siblings('.code-login').fadeIn(100);
  },function(){
    $(this).siblings('.code-login').fadeOut(100);
  });
})();

/*顶部广告关闭*/
(function(){
  var headEvent = $('#head-event');
  headEvent.find('.close-btn').on('click',function(){
    headEvent.slideUp();
  });
  //5秒关闭最上518入口
  setTimeout(function(){
    headEvent.slideUp()
  },5000)
})();

/*筛选表单*/
(function(){
  var filter = $('.filter');
  filter.on('click','a',function(e){
    var _this = $(e.target);
    _this.parent().addClass('active')
    .siblings().removeClass('active');
   bidding_filter();
  });
})();

/*排序按钮*/
(function(){
  var rankBtn = $('#networth .filter-title').find('.btn');
  rankBtn.on('click',function(e){
    e.preventDefault();
    var _this = $(this);
    if(_this.hasClass('btn-white')){
      _this.removeClass('btn-white').addClass('btn-blue').find('.iconfont').addClass('arrowDown').show().end()
      .siblings().removeClass('btn-blue').addClass('btn-white').find('.iconfont').removeClass('arrowDown').hide();
    }
    if(_this.hasClass('btn-blue')){
      var icon = _this.find('.iconfont');
      if(icon.hasClass('arrowDown')){
        icon.removeClass('arrowDown').html('&#xe682;');
        return;
      }
      icon.addClass('arrowDown').html('&#xe674;');
    }
  });
})();
/*平台等页面Hover样式*/
(function(){
  $('#project .first-menu,#transfer .first-menu,#networth .first-menu,#marketlist .first-menu, #applist .first-menu, #huoqi .first-menu').on('mouseover', 'h3', function(){
    $(this).css({
      'background-color':'#FAFAFA'
    });
  });

  $('#project .first-menu,#transfer .first-menu,#networth .first-menu,#marketlist .first-menu, #applist .first-menu, #huoqi .first-menu').on('mouseout', 'h3', function(){
    $(this).css({
      'background-color':'#FFF'
    });
  });
})();
function showPlatDown()
{
  layer.open({
      title:'提示',
      type: 1,
      area: ['500px', '220px'],
      content: '\<\div class="plat-layer"><h3>万盈金融资金存管系统上线中，8月9日10:00至11日22:00系统维护无法访问，带来不便敬请谅解。</h3>\<\/div>',
      btn: ['确认'],
      success: function(layero, index){
      layero.find('.layui-layer-btn0').on('click', function() {
        layer.close();
      })}
    });
  return true;
}
/*弹出层*/
(function(){
  $('#alert').on('click', function(){
    layer.alert('这是测试',{
      title:'温馨提示',
      area: ['474px'],
      btn: ['确定','取消']
    });
  });
  $('#tip').on('click', function(){
    layer.msg('及时提示及时提示',{
      icon:1,
      time:3000
    });
  });
  $('#layer').on('click', function(){
    layer.open({
      type: 1,
      area: ['600px', '360px'],
      shadeClose: true, //点击遮罩关闭
      content: '\<\div style="padding:20px;">自定义内容\<\/div>'
    });
  });

  $('a[rel="layer"]').on('click', function(e){
    e.preventDefault();
    e.stopPropagation();
    var platLink = $(this).attr('href'); 
    layer.open({
      title:'登录天眼投账号',
      type: 1,
      area: ['600px', '320px'],
      content: '\<\div class="plat-layer"><i class="icon-layer"></i><h4>额外加息送收益，积分豪礼送不停！</h4><p>您只需通过天眼投绑定平台！一站式管理多个平台投资，还能享受天眼投的<span>T盾计划</span>保障服务！</p>\<\/div>',
      btn: ['注册绑定平台','登录'],
      success: function(layero, index){
        
      layero.find('.layui-layer-btn0').on('click', function() {
        location.href= 'http://account.phpad.net/register.html';
      })
      layero.find('.layui-layer-btn1').attr('href',platLink).attr('onclick',"javascript:_paq.push(['trackEvent', 'home-click', 'ad-hot-plat-click', 'signin']);");

//     layero.find('.layui-layer-btn1').attr('href','http://account.phpad.net/signin.html').attr('onclick',"javascript:_paq.push(['trackEvent', 'home-click', 'ad-hot-plat-click', 'direct-go']);");
      }
    });
  });
  $('a[rel="login"]').on('click',function(e){
    e.preventDefault();
    e.stopPropagation();
    layer.open({
      title: '请先登录',
      type: 1,
      area: ['400px','540px'],
      content: '\<form id="login" method="post" action=""><p>还不是会员？<a href="http://www.phpad.net/user/register.html">新用户注册</a></p><div id="log-error" class="error"><i class="iconfont">&#xe664;</i><span>用户不存在</span></div><div class="input-box"><input id="log-username" class="input-style input-size" type="text" placeholder="请输入您的用户名/邮箱/手机" /><i class="iconfont">&#xe604;</i></div><div class="input-box"><input id="log-password" class="input-style input-size" type="text" placeholder="请输入登录密码"/><i class="iconfont">&#xe603;</i></div><p class="submit-box"><span id="is-check"><i class="iconfont">&#xe619;</i>记住用户名</span><a href="https://www.touzhijia.cn/user/reset_password.html">忘记密码？</a></p><div class="btn-box"><input id="log-submit" type="submit" class="btn-blue button-size" value="登录"></div><p><span>您还可以通过使用合作账号登录：</span><div class="partner-box"><a class="partner" href="https://www.touzhijia.cn/ologin/wdzj.html"><i id="partner-wdzj"></i>网贷之家账号</a><a class="partner" href="https://www.touzhijia.cn/ologin/sina.html"><i id="partner-weibo"></i>新浪微博账号</a></div></p>\<\/form>',
      success: function(layero, index){
        formCheckBtn();
        formLoginCheck();
        formRegisterCheck(); 
      }
    })
  });

  $('a[rel="invest"]').on('click', function(e){
    e.preventDefault();
    e.stopPropagation();
    layer.open({
      title:'购买成功',
      type: 1,
      area: ['500px', '350px'],
      content: '\<\div class="invest-completed"><h3><i class="iconfont">&#xe61b;</i>恭喜您！购买成功。债权信息如下：</h3><p>债权名称：<span>精选债权组合20151008004</span><br />债权规模：<span class="money">12323.00元</span><br />购买期限：<span class="time">3个月</span><br />回购利率<span class="rate">12.00%</span><br />预约自动续购还可享受<span style="color:red">加息奖励</span>,<a href="#">查看详情>></a></p>\<\/div>',
      btn: ['返回首页','继续购买'],
      success: function(layero, index){
        layero.find('.layui-layer-btn0').attr('href','../index/index.html');
        layero.find('.layui-layer-btn1').attr('href','');
      }
    });
  });
  $('a[rel="q-add"]').on('click', function(e){
    e.preventDefault();
    e.stopPropagation();
    layer.open({
      title:'问题补充',
      type: 2,
      area: ['800px', '360px'],
      content: '../wenda/q-add.html'
    });
  });
  $('a[rel="q-best"]').on('click', function(e){
    e.preventDefault();
    e.stopPropagation();
    layer.open({
      title:'采纳为满意回答',
      type: 1,
      area: ['450px', '250px'],
      content: '\<\div class="q-best"><p></p>\<\/div>',
      btn: ['确认','取消'],
      success: function(layero, index){
        layero.find('.layui-layer-btn0').attr('href','../index/index.html');
      }
    });
  });
})(); 

/*轴线*/
(function(){
  var hei = $('.axis-box').height();
  /*if($('.event').length > 0){
    var minusHei = parseInt($('.axis-info:last').height()) - parseInt($('.term').outerHeight()) + parseInt($('.term').css('margin-bottom'))/2;
    hei = parseInt(hei) - minusHei + 'px';
    $('.axis-line').css('height',hei);
  }*/
  $('.axis-line').css('height',hei);
})();

/*筛选表单*/
(function(){
  $('#project,#platform').each(function(){
    var hei = $(this).find('.project-origin').height() - 28;
    $(this).find('.project-origin').find('dt').css('margin-bottom',hei+'px');
  });
})();

/*倒计时*/
function countDown() {
  $('.countDown').each(function(){
    var _this = $(this),
        _hour = _this.get(0).getElementsByTagName('em')[0] || null,
        _minute = _this.get(0).getElementsByTagName('em')[1] || null,
        _second = _this.get(0).getElementsByTagName('em')[2] || null,
        _interval = 1000,
        aBtn = $(this).parent().hasClass('btn') ?  $(this).parent() : null,
        timer = setInterval(function(){
          if(_hour === null && _minute === null && _hour === null){
            return;
          }
          if(_second.innerHTML <= 0){
            if(_hour.innerHTML <= 0 && _minute.innerHTML <= 0){
              _second.innerHTML = 0;
              clearInterval(timer);
              if(aBtn === null ){
                if(_this.parent().text().slice(0,4) === '剩余时间'){
                  _this.parent().html('剩余时间：<span>已结束</span>');
                }else if(_this.parent().text().slice(0,4) === '倒计时中') {
                    if($('#debt-invalid').length > 0) { //债权详情页面
                      $('#debt-invalid').after('<a href="javascript:;" onclick="invest_submit();" class="btn btn-blue btn-allwidth" id="debt-buy-btn">立即购买</a>').remove();
                    }else if($('#activity-invalid').length > 0) { //新手标详情页面
                      $('#activity-invalid').after('<a href="javascript:;" onclick="invest_submit(this);" class="btn btn-blue btn-allwidth" data-id="'+$('#activity-invalid').attr('data-id')+'">立即购买</a>').remove();
                    }
                }else if(_this.parent().text().slice(0,4) === '剩余份额'){
                    if($('#borrows-box').length > 0) { //债权和移动债权列表页面
                      _this.parents('tr').find('.btn-blue-will').removeClass('btn-green-will').addClass('btn-green').text('立即购买');
                    } 
                  }
              }else if (aBtn.hasClass('changeBtn')){
                _this.remove();
                aBtn.removeClass('btn-invalid').removeClass('btn-blue-will').addClass('btn-blue').text('立即购买');
              }else if (aBtn.hasClass('mobile-btn')){
                _this.remove();
                aBtn.removeClass('btn-invalid').addClass('btn-green').removeClass('btn-green-will').text('立即扫码购买').css('cssText', 'color:#fff!important');
              }else if (aBtn.hasClass('changeBtn_')){
            	  _this.remove();
                  aBtn.removeClass('btn-invalid').removeClass('btn-blue-will').addClass('btn-blue').text('去投资');
              }else if (aBtn.hasClass('changeBtn_Center')){
            	  _this.remove();
                  aBtn.removeClass('btn-invalid').removeClass('btn-blue-will').addClass('btn-blue').text('投资');
              }
              return;
            }
            _second.innerHTML = 60;
            if(_minute.innerHTML <= 0){
              if(_hour.innerHTML <= 0 ){
                _minute.innerHTML = 0;
              }
              _minute.innerHTML = 60;
              if(_hour.innerHTML <= 0){
                _hour.innerHTML = 0;
              }
              _hour.innerHTML = _hour.innerHTML-1;
            }
            _minute.innerHTML = _minute.innerHTML-1;
          }
          _second.innerHTML = _second.innerHTML-1;
        },_interval);
  });
}
function addFilterEventTag() {
  $('span[data-platform-name="rxdai"]').parent().addClass('event-icon').prepend('<a href="http://topics.touzhijia.com/activities/anniversaryParty" target="_blank"></a>');
  $('dd.event-icon').find('a').on('click',function(e){
    e.stopPropagation();
  });
  $('span[data-platform-name="chenengdai"]').parent().addClass('event-icon').prepend('<a href="http://topics.touzhijia.com/activities/anniversaryParty" target="_blank"></a>');
  $('dd.event-icon').find('a').on('click',function(e){
    e.stopPropagation();
  });
  $('span[data-platform-name="huiyingdai"]').parent().addClass('event-icon').prepend('<a href="http://topics.touzhijia.com/activities/anniversaryParty" target="_blank"></a>');
  $('dd.event-icon').find('a').on('click',function(e){
    e.stopPropagation();
  });
  $('span[data-platform-name="duanrongwang"]').parent().addClass('event-icon').prepend('<a href="http://topics.touzhijia.com/activities/anniversaryParty" target="_blank"></a>');
  $('dd.event-icon').find('a').on('click',function(e){
    e.stopPropagation();
  });
  $('span[data-platform-name="51rzy"]').parent().addClass('event-icon').prepend('<a href="http://topics.touzhijia.com/activities/anniversaryParty" target="_blank"></a>');
  $('dd.event-icon').find('a').on('click',function(e){
    e.stopPropagation();
  });
  $('span[data-platform-name="xinyongbao"]').parent().addClass('event-icon').prepend('<a href="http://topics.touzhijia.com/activities/anniversaryParty" target="_blank"></a>');
  $('dd.event-icon').find('a').on('click',function(e){
    e.stopPropagation();
  });
  $('span[data-platform-name="huitouwang"]').parent().addClass('event-icon').prepend('<a href="http://topics.touzhijia.com/activities/anniversaryParty" target="_blank"></a>');
  $('dd.event-icon').find('a').on('click',function(e){
    e.stopPropagation();
  });
}

function addBidlistEventTag() {
  $('img[alt="投哪网"]').parent().append('<i class="event-icon"></i>');
  $('img[alt="投哪网"]').parent().on('click','i.event-icon',function(e){
   e.stopPropagation();
   window.open('http://topics.touzhijia.com/activities/anniversaryParty');
  });
  $('img[alt="车能贷"]').parent().append('<i class="event-icon"></i>');
  $('img[alt="车能贷"]').parent().on('click','i.event-icon',function(e){
   e.stopPropagation();
   window.open('http://topics.touzhijia.com/activities/anniversaryParty');
  });
  $('img[alt="汇盈金服"]').parent().append('<i class="event-icon"></i>');
  $('img[alt="汇盈金服"]').parent().on('click','i.event-icon',function(e){
   e.stopPropagation();
   window.open('http://topics.touzhijia.com/activities/anniversaryParty');
  });
  $('img[alt="短融网"]').parent().append('<i class="event-icon"></i>');
  $('img[alt="短融网"]').parent().on('click','i.event-icon',function(e){
   e.stopPropagation();
   window.open('http://topics.touzhijia.com/activities/anniversaryParty');
  });
  $('img[alt="融资易"]').parent().append('<i class="event-icon"></i>');
  $('img[alt="融资易"]').parent().on('click','i.event-icon',function(e){
   e.stopPropagation();
   window.open('http://topics.touzhijia.com/activities/anniversaryParty');
  });
  $('img[alt="汇投网"]').parent().append('<i class="event-icon"></i>');
  $('img[alt="汇投网"]').parent().on('click','i.event-icon',function(e){
   e.stopPropagation();
   window.open('http://topics.touzhijia.com/activities/anniversaryParty');
  });
  $('img[alt="信用宝"]').parent().append('<i class="event-icon"></i>');
  $('img[alt="信用宝"]').parent().on('click','i.event-icon',function(e){
   e.stopPropagation();
   window.open('http://topics.touzhijia.com/activities/anniversaryParty');
  });
}

function addStopCoroperateTag() {
  var $platbox = $('img[alt="美利金融"]').parents('.plat--box');
  $platbox.prepend('<div style="position:absolute;top:0; right:0; color:#fff;background-color:#ccc;padding:0 20px;">暂停合作 请提现</div>');
  $platbox.find('.plat-info').find('img').remove();
}

$(function(){
  //倒计时
  countDown();
  //选平台页面
  if($('#platform').length > 0) {
    addStopCoroperateTag();
    
    $('#platform .plat-filter').on('click', 'dd', function(){
      var filters = $('dd.active');
      var grade = filters.eq(0).children('a').attr('data');
      var overall = filters.eq(1).children('a').attr('data');
      var time = filters.eq(2).children('a').attr('data');
      var city = filters.eq(3).children('a').attr('data');
      var requestData = {"page": 1, "grade":grade,"overall":overall,"time":time,"city":city,sorttype:0,sortorder:'',operation:'sort'};
      $.ajax({
        url: '/platform/platform/lists',
        type: 'GET',
        dataType: 'json',
        data:requestData,
        success: function(data) {
          $('#platform .content').html(data.platformStr);
          laypage({
            cont: 'platform_pagination',
            pages: data.pages, 
            skip: false,
            groups:7,
            first: false,
            last: false,
            skin: 'radius',
            prev:'&#xe65f;',
            next:'&#xe660;',
            jump: function(e, first){ 
              if(first) return;
              var filters = $('dd.active');
              var grade = filters.eq(0).children('a').attr('data');
              var overall = filters.eq(1).children('a').attr('data');
              var time = filters.eq(2).children('a').attr('data');
              var city = filters.eq(3).children('a').attr('data');
              var requestData = {"page": 1, "grade":grade,"overall":overall,"time":time,"city":city,sorttype:0,sortorder:'',operation:'sort'};
              requestData.page = e.curr;
              $.ajax({
                url: '/platform/platform/lists',
                type:'GET',
                data: requestData,
                dataType: 'json',
                success:function(data){
                  $('#platform .content').html(data.platformStr);
                },
                error:function() {
                  ajaxErrorTip('获取平台数据失败');
                }
              });
            }
          });
        },
        error: function() {
          ajaxErrorTip('获取平台数据失败');
        }
      })
    });

    //初始化分页
    laypage({
            cont: 'platform_pagination',
            pages: $('#platform_pagination').attr('data-pagesize'), 
            skip: false,
            groups:7,
            first: false,
            last: false,
            skin: 'radius',
            prev:'&#xe65f;',
            next:'&#xe660;',
            jump: function(e, first){ 
              if(first) return;
              var filters = $('dd.active');
              var grade = filters.eq(0).children('a').attr('data');
              var overall = filters.eq(1).children('a').attr('data');
              var time = filters.eq(2).children('a').attr('data');
              var city = filters.eq(3).children('a').attr('data');
              var requestData = {"page": 1, "grade":grade,"overall":overall,"time":time,"city":city,sorttype:0,sortorder:'',operation:'sort'};
              requestData.page = e.curr;
              $.ajax({
                url: '/platform/platform/lists',
                type:'GET',
                data: requestData,
                dataType: 'json',
                success:function(data){
                  $('#platform .content').html(data.platformStr);
                },
                error:function() {
                  ajaxErrorTip('获取平台数据失败');
                }
              });
            }
          });
  }

    $('a[rel="platform_join"]').click(function(e){
      e.stopPropagation();
      var third_url = $(this).attr("data-plat-url");
      // if (third_url == 'http://www.wyjr168.com') {
      //   return showPlatDown();
      // }
      if(!USER.islogin) {
        layer.open({
          title:'登录天眼投账号',
          type: 1,
          area: ['600px', '320px'],
          content: '\<\div class="plat-layer"><i class="icon-layer"></i><h4>额外加息送收益，积分豪礼送不停！</h4><p>您只需通过天眼投绑定平台！一站式管理多个平台投资，还能享受天眼投的<span>T盾计划</span>保障服务！</p>\<\/div>',
          btn: ['注册绑定平台','登录'],
          success:function(layero, index) {
            layero.find('.layui-layer-btn0').on('click', function(){
              location.href= 'http://account.phpad.net/register.html';
            })
            layero.find('.layui-layer-btn1').on('click', function() {
              location.href= 'http://account.phpad.net/signin.html';
            })
          }
        });
      }else {
          //用户已登录且已完成认证信息
          if(USER.invest_flag) {
            $(this).attr('href', $(this).attr('data-sso-url'));
            $(this).attr('target', "_blank");
            return true;
          }else {
            layer.open({
              title:'认证提醒',
              type: 1,
              area: ['550px', '220px'],
              content: '<div style="padding:30px 20px;">亲，设置用户名、完成实名认证和邮箱验证,天眼投才能更好为您服务哦！</div>',
              btn: ['去认证'],
              success:function(layero, index) {
                layero.find('.layui-layer-btn0').on('click', function() {
                    location.href= 'http://account.phpad.net/safe.html#valid-nickname';
                })
              }
            });
          }
          
      }
      return false;
    });
  
  //平台详情页面
  if($('#platform-page').length > 0) {
    pie('time-distribution');
    pie('amount-distribution');
    bar();
    radar();
    new Playmoveimg('plat-team',{
      time:0,
      backfn:function(){
        memberHover();
      }
    });
    new Playimg('carousel-photo01',{
      time:0,
      lrbtn:true
    });
    new Playimg('carousel-photo02',{
      time:0,
      lrbtn:true
    });
    new Playimg('carousel-photo03',{
      time:0,
      lrbtn:true
    });
    $('a[rel="prettyPhoto[pp_gal]"]').prettyPhoto();
    $('.tworow h2').find('.btn').on('click',function(e){
      e.preventDefault();
      var _this = $(this);
      _this.removeClass('btn-white').addClass('btn-blue').find('.iconfont').show().end().siblings().removeClass('btn-blue').addClass('btn-white').find('.iconfont').hide();
    });

    function memberHover(){
      var memberBox = $('.member-box');
      memberBox.hover(function(){
        var thisMask = $(this).find('.circle-mask');
        $(this).animate({'margin-top':'-5px'},250).find('h4').css('color','#2AA3CE');
        if(!thisMask.is(':animated')){
          $(this).siblings().find('.circle-mask').fadeOut();
          thisMask.stop().fadeIn();
        }
      },function(){
        $(this).animate({'margin-top':'0'},250).find('h4').css('color','#646567');
        var thisMask = $(this).find('.circle-mask');
        if(!thisMask.is(':animated')){
          thisMask.stop().fadeOut();
        }
      });
    }
  memberHover();
  }
  //选标
  $('#platform-page h2.filter-title .btn').on('click',function(e){
    e.preventDefault(); 
    var $this = $(this);
    var $icon = $(this).find('.iconfont');
    if($icon.hasClass('arrowDown')) {
        $icon.removeClass('arrowDown').html('&#xe682;');
        $this.attr('sortorder', 'asc');
    }else {
        $this.removeClass('btn-white').addClass('btn-blue').siblings().removeClass('btn-blue').addClass('btn-white');
        $('#platform-page h2.filter-title i').removeClass('arrowDown');
        $icon.addClass('arrowDown').html('&#xe674;');
        $this.attr('sortorder', 'desc');
    }
    var sorttype    = $(".filter-title a.btn-blue").attr("sorttype");
    var sortorder   = $(".filter-title a.btn-blue").attr("sortorder");
    var from        = $(".filter-title").attr('data-en-name');
    var page        = 1; 
    var requestData = {sorttype:sorttype,sortorder:sortorder, from:from,page:page};
    $.ajax({
      url: '/platform/project/plists',
      type: 'GET', 
      data: requestData, 
      dataType: 'json',
      success:function(data){
    	  
        $('#platfrom_bid_list').html(data.bidstr);
        countDown(); 
        laypage({
            cont: 'palt_bidding_page',
            pages: data.pages, 
            skip: false,
            groups:7,
            first: false,
            last: false,
            skin: 'radius',
            prev:'&#xe65f;',
            next:'&#xe660;',
            jump: function(e, first){ 
              if(first) return;
              requestData.page = e.curr;
              $.ajax({
                url: '/platform/project/plists',
                type:'GET',
                data: requestData,
                dataType: 'json',
                success:function(data){
                  $('#platfrom_bid_list').html(data.bidstr);
                  countDown();
                },
                error:function() {
                  ajaxErrorTip('获取平台标的信息失败')
                }
              });
            }
          });
      },
    error: function() {
      ajaxErrorTip('获取平台标的信息失败')
    }
  });
  }).eq(0).trigger('click');

  //债权市场 债权筛选
  $('#marketlist .filter-title .btn').on('click',function(e){
    e.preventDefault();
    var $this = $(this);
    var $icon = $(this).find('.iconfont');
    if($icon.hasClass('arrowDown')) {
      $icon.removeClass('arrowDown').html('&#xe682;');
      $this.attr('sortorder', 'asc')
    }else {
      $(this).removeClass('btn-white').addClass('btn-blue').siblings().removeClass('btn-blue').addClass('btn-white');
      $('#marketlist h2.filter-title i').removeClass('arrowDown');
      $icon.addClass('arrowDown').html('&#xe674;');
      $this.attr('sortorder', 'desc');
    }
    var sorttype  = $(".filter-title a.btn-blue").attr("sorttype");
    var sortorder = $(".filter-title a.btn-blue").attr("sortorder");
    var requestData = {
      "sorttype" : sorttype,
      "sortorder" : sortorder,
      "page" : 1
    }
    $('#borrows_pagination').empty();
    $.ajax({
      url:'/debt/borrows/lists', 
      type: 'GET',
      data: requestData, 
      dataType: 'json',
      success: function(data) {
        $('#borrows-box').html(data.borrowstr);
       // countDown();
        laypage({
          cont: 'borrows_pagination',
          pages: data.pages, 
          skip: false, 
          groups:7,
          first: false,
          last: false,
          skin: 'radius',
          curr:1,
          prev:'&#xe65f;',
          next:'&#xe660;',
          jump: function(e, first){ 
            if(first) return;
            requestData.page = e.curr;

            $.ajax({
              url: '/debt/borrows/lists', 
              type: 'GET',
              data: requestData,
              dataType: 'json', 
              success:function(data){
                $('#borrows-box').html(data.borrowstr);
              },
              error:function() {
                ajaxErrorTip('获取债权列表信息失败');
              }
            })
          }
        });
    },
    error: function() {
      ajaxErrorTip('获取债权列表信息失败');
    }
    })
  });
  if($('#marketlist').length > 0) {
    laypage({
        cont: 'borrows_pagination',
        pages: $('#borrows_pagination').attr('data-pagesize'),//data.pages, 
        skip: false, 
        groups:7,
        first: false,
        last: false,
        skin: 'radius',
        curr:1,
        prev:'&#xe65f;',
        next:'&#xe660;',
        jump: function(e, first){ 
          if(first) return;
          var sorttype  = $(".filter-title a.btn-blue").attr("sorttype");
          var sortorder = $(".filter-title a.btn-blue").attr("sortorder");
          var requestData = {
            "sorttype" : sorttype,
            "sortorder" : sortorder
          }
          requestData.page = e.curr;
          $.ajax({
            url: '/debt/borrows/lists', 
            type: 'GET',
            data: requestData, 
            dataType: 'json',
            success:function(data){
              $('#borrows-box').html(data.borrowstr);
              countDown();
            },
            error: function() {
              ajaxErrorTip('获取债权列表信息失败');
            }
          })
        }
      });
  }

  
  
  $('#applist .filter-title .btn').on('click',function(e){
    e.preventDefault();
    var $this = $(this);
    var $icon = $(this).find('.iconfont');
    if($icon.hasClass('arrowDown')) {
      $icon.removeClass('arrowDown').html('&#xe682;');
      $this.attr('sortorder', 'asc')
    }else {
      $(this).removeClass('btn-white').addClass('btn-blue').siblings().removeClass('btn-blue').addClass('btn-white');
      $('#applist h2.filter-title i').removeClass('arrowDown');
      $icon.addClass('arrowDown').html('&#xe674;');
      $this.attr('sortorder', 'desc');
    }
    var sorttype  = $(".filter-title a.btn-blue").attr("sorttype");
    var sortorder = $(".filter-title a.btn-blue").attr("sortorder");
    var requestData = {
      "sorttype" : sorttype,
      "sortorder" : sortorder,
      "page" : 1
    }
    $('#borrows_pagination').empty();
    $.ajax({
      url: '/debt/borrows/mlists', 
      type: 'GET',
      data: requestData, 
      dataType: 'json',
      success:function(data){
      $('#borrows-box').html(data.borrowstr);
      countDown();
      laypage({
        cont: 'borrows_pagination',
        pages: data.pages, 
        skip: false, 
        groups:7,
        first: false,
        last: false,
        skin: 'radius',
        curr:1,
        prev:'&#xe65f;',
        next:'&#xe660;',
        jump: function(e, first){ 
          if(first) return;
          requestData.page = e.curr;
          $.ajax({
            url: '/debt/borrows/mlists',
            type: 'GET', 
            data: requestData, 
            dataType:'json',
            success: function(data){
              $('#borrows-box').html(data.borrowstr);
            },
          error: function() {
            ajaxErrorTip('获取移动专属债权列表失败');
          }
        })
        }
      });
    },
    error:function() {
      ajaxErrorTip('获取移动专属债权列表失败');
    }
  })
  });

  if($('#applist').length > 0) {
    laypage({
        cont: 'borrows_pagination',
        pages: $('#borrows_pagination').attr('data-pagesize'),//data.pages, 
        skip: false, 
        groups:7,
        first: false,
        last: false,
        skin: 'radius',
        curr:1,
        prev:'&#xe65f;',
        next:'&#xe660;',
        jump: function(e, first){ 
          if(first) return;
          var sorttype  = $(".filter-title a.btn-blue").attr("sorttype");
          var sortorder = $(".filter-title a.btn-blue").attr("sortorder");
          var requestData = {
            "sorttype" : sorttype,
            "sortorder" : sortorder
          }
          requestData.page = e.curr;
          $.ajax({
            url: '/debt/borrows/mlists', 
            type: 'GET',
            data: requestData, 
            dataType: 'json',
            success:function(data){
              $('#borrows-box').html(data.borrowstr);
              countDown();
          },
          error: function() {
            ajaxErrorTip('获取移动专属债权列表失败');
          }
        })
        }
      });
  }

   //选标中心页面
  if($('#project').length) {
    //根据hash值动态更改筛选结果
    getHashChange();
    //初始化
    bidding_filter_init(); 
    filterEllipsis('.project-origin',19,76);
    //选标中心增加活动标签
    addFilterEventTag();
    addBidlistEventTag();
  }
  $('#project .is-check').on('click',function(){
    bidding_filter();
  });
  $('#project .filter-title .btn').on('click',function(e){
    e.preventDefault();
    var $this = $(this);
    var $icon = $(this).find('.iconfont');
    if($icon.hasClass('arrowDown')) {
      $icon.removeClass('arrowDown').html('&#xe682;');
      $this.attr('sortorder', 'asc')
    }else {
      $(this).removeClass('btn-white').addClass('btn-blue').siblings().removeClass('btn-blue').addClass('btn-white');
      $('#project h2.filter-title i').removeClass('arrowDown');
      $icon.addClass('arrowDown').html('&#xe674;');
      $this.attr('sortorder', 'desc');
    }
    bidding_filter();
  });
  
  //点击投资按钮处理
  $(document).on('click', 'a[rel="invest_layer"]', function(e){
    e.preventDefault();
    e.stopPropagation();
    var platname  = $(this).attr('data-en-name');
    // if (platname == 'wyjr') {
    //   return showPlatDown();
    // }
    var invest_id = $(this).attr('data-invest-id');
    var url       = 'http://www.phpad.net/platform/login/'+platname+'/'+invest_id;
    var third_url = $(this).attr("data-inversurl");
    var data      = {url:third_url};
    if(!USER.islogin) {
      layer.open({
        title:'登录天眼投账号',
        type: 1,
        area: ['600px', '320px'],
        content: '\<\div class="plat-layer"><i class="icon-layer"></i><h4>额外加息送收益，积分豪礼送不停！</h4><p>您只需通过天眼投绑定平台，多平台投资，一站式管理，<br />还可享天眼投<span>T盾保障</span>计划！</p>\<\/div>',
        btn: ['注册绑定平台','登录'],
        success:function(layero, index) {
          layero.find('.layui-layer-btn0').on('click', function(){
            location.href= 'http://account.phpad.net/register.html';
          })  
          layero.find('.layui-layer-btn1').on('click', function() {
            location.href= 'http://account.phpad.net/signin.html';
          })
        }
      });
    }else {
      //用户已登录
        if(USER.invest_flag) {
          window.open('http://www.phpad.net/platform/login/' + platname + '/' + invest_id + '?url=' + third_url);
        }else {
          layer.open({
            title:'认证提醒',
            type: 1,
            area: ['550px', '220px'],
            content: '<div style="padding:30px 20px;">亲，设置用户名、完成实名认证和邮箱验证,天眼投才能更好为您服务哦！</div>',
            btn: ['去认证'],
            success:function(layero, index) {
              layero.find('.layui-layer-btn0').on('click', function() {
                  location.href= 'http://account.phpad.net/safe.html#valid-nickname';
              })
            }
          });
        }
    }
    return false;
  });

  //选平台页面
  $('#platform').on('mouseenter', '.plat-box',function(){
    var thisMask = $(this).find('.plat-mask');
      $(this).siblings().find('.plat-mask').stop().fadeOut(300);
      thisMask.stop().fadeIn(300);
  });

  $('#platform').on('mouseleave', '.plat-box',function(){
    var thisMask = $(this).find('.plat-mask');
      thisMask.stop().fadeOut(300);
  });
  //选平台增加活动标签
  function initPlatformEventTag() {
    var eventPlat = $('img[alt="投哪网"]');
    eventPlat.parents('.plat-box').append('<i class="event-plat"></i>')
      .end()
      .parents('.plat-info').append('<img class="detail-icon-event" src="http://static.touzhijia.com/images/platform/event.gif" alt="" />');
    eventPlat.parents('.plat-box').each(function(){
      var $this = $(this);
      if($this.find('.hot-plat').length === 0) {
        $this.find('.event-plat').css('left',0);
      }
    })
  }

    function initChenengdaiEventTag() {
    var eventPlat = $('img[alt="车能贷"]');
    eventPlat.parents('.plat-box').append('<i class="event-plat"></i>')
      .end()
      .parents('.plat-info').append('<img class="detail-icon-event" src="http://static.touzhijia.com/images/platform/event.gif" alt="" />');
    eventPlat.parents('.plat-box').each(function(){
      var $this = $(this);
      if($this.find('.hot-plat').length === 0) {
        $this.find('.event-plat').css('left',0);
      }
    })
  }
  
  function initDuanrongwangEventTag() {
    var eventPlat = $('img[alt="短融网"]');
    eventPlat.parents('.plat-box').append('<i class="event-plat"></i>')
      .end()
      .parents('.plat-info').append('<img class="detail-icon-event" src="http://static.touzhijia.com/images/platform/event.gif" alt="" />');
    eventPlat.parents('.plat-box').each(function(){
      var $this = $(this);
      if($this.find('.hot-plat').length === 0) {
        $this.find('.event-plat').css('left',0);
      }
    })
  }
  
  
    function initXinyongbaoEventTag() {
    var eventPlat = $('img[alt="信用宝"]');
    eventPlat.parents('.plat-box').append('<i class="event-plat"></i>')
      .end()
      .parents('.plat-info').append('<img class="detail-icon-event" src="http://static.touzhijia.com/images/platform/event.gif" alt="" />');
    eventPlat.parents('.plat-box').each(function(){
      var $this = $(this);
      if($this.find('.hot-plat').length === 0) {
        $this.find('.event-plat').css('left',0);
      }
    })
  }
  
  
    function initHuiyingdaiEventTag() {
    var eventPlat = $('img[alt="汇盈金服"]');
    eventPlat.parents('.plat-box').append('<i class="event-plat"></i>')
      .end()
      .parents('.plat-info').append('<img class="detail-icon-event" src="http://static.touzhijia.com/images/platform/event.gif" alt="" />');
    eventPlat.parents('.plat-box').each(function(){
      var $this = $(this);
      if($this.find('.hot-plat').length === 0) {
        $this.find('.event-plat').css('left',0);
      }
    })
  }
  
  
    function initRongziyiEventTag() {
    var eventPlat = $('img[alt="融资易"]');
    eventPlat.parents('.plat-box').append('<i class="event-plat"></i>')
      .end()
      .parents('.plat-info').append('<img class="detail-icon-event" src="http://static.touzhijia.com/images/platform/event.gif" alt="" />');
    eventPlat.parents('.plat-box').each(function(){
      var $this = $(this);
      if($this.find('.hot-plat').length === 0) {
        $this.find('.event-plat').css('left',0);
      }
    })
  }
  
    function initHuitouwangEventTag() {
    var eventPlat = $('img[alt="汇投网"]');
    eventPlat.parents('.plat-box').append('<i class="event-plat"></i>')
      .end()
      .parents('.plat-info').append('<img class="detail-icon-event" src="http://static.touzhijia.com/images/platform/event.gif" alt="" />');
    eventPlat.parents('.plat-box').each(function(){
      var $this = $(this);
      if($this.find('.hot-plat').length === 0) {
        $this.find('.event-plat').css('left',0);
      }
    })
  }
  
  initPlatformEventTag();
  initChenengdaiEventTag();
  initDuanrongwangEventTag();
  initXinyongbaoEventTag() 
  initHuiyingdaiEventTag();
  initRongziyiEventTag();
  initHuitouwangEventTag();

  
  //二级市场首页
  /*数字加载动画*/
  $(".numic").each(function(i,e){
    var o = $(this);
    var t = 10;
    var val = parseInt(o.text().replace(/,/g,""))/t;
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
  
  //定期首页列表点击打开详情页
  $('#secondmarket .debt-list').on('click', 'li', function(){
    var itemUrl = $(this).find('a.btn').attr('href');
    window.open(itemUrl);
  }).on('click','a.btn',function(e){
    $(e.target).stopPropagation();
  });
  
  $('.debt-app').on('mouseenter','li',function(){
    $(this).addClass('active')
    .siblings().removeClass('active')
    .find('.debt-code').stop().animate({'right':'-155px','opacity':0},200);
    var codeImg = $(this).find('.debt-code');
    if(!codeImg.is(':animated')){
      codeImg.stop().animate({'right':'35px','opacity':1},200);
    }
  }).on('mouseleave','li',function(){
    $(this).removeClass('active');
    var codeImg = $(this).find('.debt-code');
    if(!codeImg.is(':animated')){
      codeImg.stop().animate({'right':'-155px','opacity':0},200);
    }
  });
  //债权转让购买页面
  if($('#secondmarket-page').length > 0 && !$('#secondmarket-page').hasClass('activity_debt')) {
    showPlatformStr();
    $('#invest_box').ajaxForm({
      target: '#buyBtn',
      beforeSubmit:function(){
        var investPart = $('input[name=investPart]').val() * 1;
        if(!/^[1-9]\d*$/.test(investPart)) {
          layer.msg('请填写正确购买份额',{
            icon:2,
            time:2000
          })
          return false;
        }
        if($('input[name=tradepwd]').length < 1) {
          layer.msg('初始交易密码与登录密码一致，请先修改交易密码',{
            icon:2,
            time:2000
          })
          return false;
        }else if($('input[name=tradepwd]').val() == ''){
          layer.msg('请填写交易密码',{
            icon:2,
            time:2000
          })
          return false;
        }
        var code = $('#quanmama').val(),targetLi = '';
        if (code) {
          $('.option-group .coupon-value').each(function() {
            if ($(this).attr('code') == code) {
              targetLi = this;
              return false;
            }
          });
          if (targetLi) {
            var minInvestAmount = $(targetLi).attr('minamount') * 1;
            var maxInvestAmout = $(targetLi).attr('maxamount') * 1;
            if (minInvestAmount > 0 && (investPart- minInvestAmount < 0)) {
              layer.msg('券不符合使用条件',{
                icon:2,
                time:2000
              })
              return false;
            }
          }

        }


        $('#debt-buy-btn').data('forbidden', 1);
        return true;
      },
      dataType: 'json',
      success:function(data){
        if(data.error == 1) {
          layer.msg(data.msg,{
            icon:2,
            time:2000
          })
        }else if(data.error == 2) {
          layer.msg(data.msg,{
            icon:2,
            time:2000,
            end:function() {
              location.href= data.url;
            }
          })
        }else {
          var boxCont = '';
          var investInfo = data.investInfo;
          var autobuyUrl = 'http://account.phpad.net/debt/autobuy.html';
          if(investInfo.type == 2) {
            boxCont = '<div class="invest-completed">\
            <h3><i class="iconfont">&#xe61b;</i>恭喜您！购买成功。债权信息如下：</h3>\
            <p>\
            债权名称：<span>'+investInfo.title+'</span><br />\
            购买金额：<span class="money">'+investInfo.effectAmount+'元</span><br />\
            债权期限：<span class="time">'+investInfo.period+'</span><br />\
            预期收益：<span class="rate">'+investInfo.receiveAmount+'</span><br />\
            预约自动续购还可享受<span style="color:red">加息奖励</span>,<a href="'+autobuyUrl+'" target="_blank">查看详情>></a><br />\
            <div style="border-radius: 3px;-moz-border-radius: 3px;-webkit-border-radius: 3px;padding:0.5em;margin:0 0.75em 0 0;background-color:#fffbe8;border:1px dashed #fff1a9;margin-top: 15px;color:#f0983e;margin-left: -30px;font-size: 13px;"><b>活期产品</b>重磅推荐：年化<b>8%</b>以上，随存随取，当日计息。<a style="color:red" target="_blank" href="http://www.phpad.net/current/">了解详情</a></div>\
            </p>\
            </div>';
          }else if(investInfo.type == 1 || investInfo.type == 0) {
            boxCont = '<div class="invest-completed">\
            <h3><i class="iconfont">&#xe61b;</i>恭喜您！购买成功。债权信息如下：</h3>\
            <p>\
            债权名称：<span>'+investInfo.title+'</span><br />\
            购买金额：<span class="money">'+investInfo.effectAmount+'元</span><br />\
            购买期限：<span class="time">'+investInfo.period+'</span><br />\
            回购利率：<span class="rate">'+investInfo.rate+'%</span><br />\
            预约自动续购还可享受<span style="color:red">加息奖励</span>,<a href="'+autobuyUrl+'" target="_blank">查看详情>></a><br />\
            <div style="border-radius: 3px;-moz-border-radius: 3px;-webkit-border-radius: 3px;padding:0.5em;margin:0 0.75em 0 0;background-color:#fffbe8;border:1px dashed #fff1a9;margin-top: 15px;color:#f0983e;margin-left: -30px;font-size: 13px;"><b>活期产品</b>重磅推荐：年化<b>8%</b>以上，随存随取，当日计息。<a style="color:red" target="_blank" href="http://www.phpad.net/current/">了解详情</a></div>\
            </p>\
            </div>';
          } else {
            boxCont = '<div class="invest-completed">\
            <h3><i class="iconfont">&#xe61b;</i>恭喜您！购买成功。债权信息如下：</h3>\
            <p>\
            债权名称：<span>'+investInfo.title+'</span><br />\
            购买金额：<span class="money">'+investInfo.effectAmount+'元</span><br />\
            购买期限：<span class="time">'+investInfo.period+'</span><br />\
            回购利率：<span class="rate">'+investInfo.rate+'%</span><br />\
            专享债权享受1.2倍收益，一路高息不停！<a href="http://www.phpad.net/debt/" target="_blank">立即抢购>></a><br />\
            </p>\
            </div>';
          }
          boxCont = data.investBox;
          layer.open({
            title:'购买成功',
            type: 1,
            area: ['860px', '480px'],
            content: boxCont,
            btn: ['查看详情','继续购买'],
            success: function(layero, index){
              var gotoUrl = 'http://account.phpad.net/';
              if (investInfo.type == 1 || investInfo.type == 0 || investInfo.type == 2) {
                gotoUrl = 'http://account.phpad.net/debt';
              }
              layero.find('.layui-layer-btn0').attr('href', gotoUrl);
              var href= location.href;
              layero.find('.layui-layer-btn1').attr('href', href);
            }
      });
        }
        $('#debt-buy-btn').data('forbidden', 0);
      },
      error:function(data) {
        $('#debt-buy-btn').data('forbidden', 0);
      }
    });
    //获取债权购买记录
    var requestData = {
      'page' : 1,
      'bid' : $('#borrow-buy-records').attr('data-bid')
    }

  $.ajax({
    url:'/debt/borrow/buyRecords',
    data: requestData,
    type: 'GET',
    success:function(data){
      $('#borrow-buy-records tbody').html(data.recordStr);
      laypage({
            cont: 'borrow_buy_page',
            pages: data.pages, 
            skip: false,
            groups:7,
            first: false,
            last: false,
            skin: 'radius',
            prev:'&#xe65f;',
            next:'&#xe660;',
            jump: function(e, first){ 
              if(first) return;
              requestData.page = e.curr;
              $.ajax({
                url: '/debt/borrow/buyRecords', 
                type: 'GET',
                data: requestData,
                dataType: 'json', 
                success: function(data){
                  $('#borrow-buy-records tbody').html(data.recordStr);
                },
                error:function() {
                  ajaxErrorTip('债权购买记录信息获取失败');
                }
              })
            }
          });
    },
    error: function() {
      ajaxErrorTip('债权购买记录信息获取失败');
    }

  });

  $('.forget-pass').find('.iconfont').hover(function(){
    $('.pass-tip').show();
  },function(){
    $('.pass-tip').hide();
  });

  var appTip = $('<div class="app-tip"><img src="//static.touzhijia.com/images/platform/app2wm(200-200).png"></div>'),
      wechatTip = $('<div class="wechat-tip"><img src="//static.touzhijia.com/images/secondmarket/detail-erma.jpg"></div>'),
      autoTip = $('<div class="app-tip auto-tip"><p>设置预约续购，回款的本息将自动投出。可在我的天眼投-<a href="http://account.phpad.net/debt/autoreserve.html" target="_blank">理财管理</a>进行设置</p></div>'),
      autoBuyTip = $('<div class="app-tip autoBuy-tip"><p>设置自动购买，账户中的余额将自动投出。可在我的天眼投-<a href="http://account.phpad.net/debt/autobuy.html" target="_blank">理财管理</a>进行设置</p></div>');
  $('#borrow-buy-records').on('mouseover','.appTip',function(e){
    var x = e.pageX + 15,
        y = e.pageY + 10;
    $('body').css('position','relative');
    appTip.appendTo($('body')).css({
      'top': y,
      'left': x
    });
  }).on('mouseleave','.appTip',function(){
    var timer = setTimeout(function(){
      $('body').css('position','static').find('.app-tip').remove();
    },100);
    $('.app-tip').on('mouseover',function(){
      clearTimeout(timer);
    }).on('mouseleave',function(){
      $('body').css('position','static');
      $(this).remove();
    });
  });
  $('#borrow-buy-records').on('mouseover','.wechatTip',function(e){
    var x = e.pageX + 15,
        y = e.pageY + 10;
    $('body').css('position','relative');
    wechatTip.appendTo($('body')).css({
      'top': y,
      'left': x
    });
  }).on('mouseleave','.wechatTip',function(){
    var timer = setTimeout(function(){
      $('body').css('position','static').find('.wechat-tip').remove();
    },100);
    $('.wechat-tip').on('mouseover',function(){
      clearTimeout(timer);
    }).on('mouseleave',function(){
      $('body').css('position','static');
      $(this).remove();
    });
  });
  $('#borrow-buy-records').on('mouseover','.autoTip',function(e){
    var x = e.pageX + 5,
        y = e.pageY + 5;
    $('body').css('position','relative');
    autoTip.appendTo($('body')).css({
      'top': y,
      'left': x
    });
  }).on('mouseleave','.autoTip',function(){
    var timer = setTimeout(function(){
      $('body').css('position','static').find('.auto-tip').remove();
    },100);
    $('.auto-tip').on('mouseover',function(){
      clearTimeout(timer);
    }).on('mouseleave',function(){
      $('body').css('position','static');
      $(this).remove();
    });
  });
  $('#borrow-buy-records').on('mouseover','.autoBuyTip',function(e){
    var x = e.pageX + 5,
        y = e.pageY + 5;
    $('body').css('position','relative');
    autoBuyTip.appendTo($('body')).css({
      'top': y,
      'left': x
    });
  }).on('mouseleave','.autoBuyTip',function(){
    var timer = setTimeout(function(){
      $('body').css('position','static').find('.autoBuy-tip').remove();
    },100);
    $('.autoBuy-tip').on('mouseover',function(){
      clearTimeout(timer);
    }).on('mouseleave',function(){
      $('body').css('position','static');
      $(this).remove();
    });
  });
  
  //初始化付款金额
  $('#credits').trigger('keyup');
  }
  //二级市场运营数据页面
  if($('#data-show').length > 0) {
    //每日成交
    dailyTradeChar();
    //上一日债权发布
    lastDaySale();
    //待收趋势
    collectyReturn();
    $.ajax({
      url: '/debt/stats/riskAmountChange',
      type: 'GET', 
      data: {page: 1}, 
      dataType: 'json',
      success:function(data){
        $('#debt_risk_table').html(data.riskAmountstr);
        laypage({
            cont: 'debt_risk_pageNav',
            pages: data.pages, 
            skip: false,
            groups:7,
            first: false,
            last: false,
            skin: 'radius',
            prev:'&#xe65f;',
            next:'&#xe660;',
            jump: function(e, first){ 
              if(first) {
                return;
              }
              $.ajax({
                url: '/debt/stats/riskAmountChange',
                type:'GET',
                data: {page: e.curr},
                dataType: 'json',
                success:function(data){
                  $('#debt_risk_table').html(data.riskAmountstr);
                },
                error:function() {
                  ajaxErrorTip('获取专项赎回基金收支信息失败')
                }
              });
            }
          });
      },
      error: function() {
      ajaxErrorTip('获取专项赎回基金收支信息失败')
      }
    });
  }
});//jquery end



//选标中心 筛选
function bidding_filter() {
  if($('#project').length > 0) {
    var filters   = $('dd.active');
    var grade     = filters.eq(0).children('a').attr('data');
    var overall   = filters.eq(1).children('a').attr('data');
    var time      = filters.eq(2).children('a').attr('data');
    var sorttype  = $(".filter-item a.btn-blue").attr("sorttype");
    var sortorder = $(".filter-item a.btn-blue").attr("sortorder");
    var repayitem = '';
    var page      = 1;
    var from      = $('.project-origin span.checked').map(function(){ return $(this).attr('data-platform-name');}).get().join(',');
    var requestData = {grade:grade,overall:overall,time:time,sorttype:sorttype,sortorder:sortorder,repayitem:repayitem,from:from,page:page};
    $('#bidding_pagination').empty();
    $.ajax({
      url:'/platform/project/lists',
      type: 'GET',
      data:requestData, 
      dataType: 'json',
      success: function(data){
        $('.bid-lists').html(data.bidstr);
        countDown();
        addBidlistEventTag();
        laypage({
            cont: 'bidding_pagination',
            pages: data.pages, 
            skip: false, 
            groups:7,
            first: false,
            last: false,
            skin: 'radius',
            curr:page,
            prev:'&#xe65f;',
            next:'&#xe660;',
            jump: function(e, first){ //触发分页后的回调
              if(first) return;
              var page = e.curr;
              var requestData = {grade:grade,overall:overall,time:time,sorttype:sorttype,sortorder:sortorder,repayitem:repayitem,from:from,page:page};
              $.ajax({
                url: '/platform/project/lists',
                type: 'GET',
                data: requestData,
                dataType: 'json', 
                success: function(data){
                  $('.bid-lists').html(data.bidstr);
                  countDown();
                  addBidlistEventTag();
                },
                error: function() {
                  ajaxErrorTip('获取标的信息失败');
                }
              })
            }
        });
      },
      error:function() {
        ajaxErrorTip('获取标的信息失败');
      }
    })
    setHashStroge();
  }
}

function bidding_filter_init() {
  if($('#project').length > 0) {
    var filters = $('dd.active');
    var grade = filters.eq(0).children('a').attr('data');
    var overall = filters.eq(1).children('a').attr('data');
    var time = filters.eq(2).children('a').attr('data');
    var sorttype = $(".filter-item a.btn-blue").attr("sorttype");
    var sortorder = $(".filter-item a.btn-blue").attr("sortorder");
    var repayitem = '';
    var from = $('.project-origin span.checked').map(function(){ return $(this).attr('data-platform-name');}).get().join(',');
    var init_load = false; //防止插件每一次自动加载
    laypage({
      cont: 'bidding_pagination',
      pages: $('#bidding_pagination').attr('data-pagesize'),
      skip: false, 
      groups:7,
      first: false,
      last: false,
      skin: 'radius',
      curr:1,
      prev:'&#xe65f;',
      next:'&#xe660;',
      jump: function(e, first){ 
        //if(first) return;
        var page = e.curr;
        var requestData = {grade:grade,overall:overall,time:time,sorttype:sorttype,sortorder:sortorder,repayitem:repayitem,from:from,page:page};
        $.ajax({
          url: '/platform/project/lists',
          type: 'GET', 
          data: requestData, 
          dataType: 'json',
          success: function(data){
            init_load = true;
            $('#bidding_pagination').empty();
            $('.bid-lists').html(data.bidstr);
            countDown();
            addBidlistEventTag();
            laypage({
                cont: 'bidding_pagination',
                pages: data.pages, 
                skip: false, 
                groups:7,
                first: false,
                last: false,
                skin: 'radius',
                curr:page,
                prev:'&#xe65f;',
                next:'&#xe660;',
                jump: function(e, first){ 
                  if(init_load == true) {
                    init_load = false;
                    return;
                  }
                  var page = e.curr;
                  var requestData = {grade:grade,overall:overall,time:time,sorttype:sorttype,sortorder:sortorder,repayitem:repayitem,from:from,page:page};
                  $.ajax({
                    url: '/platform/project/lists', 
                    data: requestData, 
                    success: function(data){
                      $('.bid-lists').html(data.bidstr);
                      countDown();
                      addBidlistEventTag();
                    },
                    error: function() {
                      ajaxErrorTip('获取标的信息失败');
                    }
                  })
                }
              });
        },
        error: function() {
          ajaxErrorTip('获取标的信息失败');
        }
        })
      }
    });
  }
}

  //筛选时执行hash存储,并修改location地址
    function setHashStroge(){
      var hashobj={},
          filter=$(".filter"),
          checkarr=[],
          checkedFilter=filter.eq(3).find(".checked"),
          hashstr="";
      for(var i=0,len=checkedFilter.length;i<len;i++){
        checkarr.push(checkedFilter.eq(i).attr("data-platform-name"));
      }
      hashobj.grade=filter.eq(0).find(".active").find("a").attr("data");
      hashobj.overall=filter.eq(1).find(".active").find("a").attr("data");
      hashobj.time=filter.eq(2).find(".active").find("a").attr("data");
      hashobj.from=checkarr.join("_");
      hashstr="#"+"grade="+hashobj.grade+"&"+"overall="+hashobj.overall+"&"+"time="+hashobj.time+"&"+"from="+hashobj.from;
      location.hash=hashstr;
    }
    //获取hash值，并根据hash值修改标的数据
    function getHashChange(){
      var str=location.hash.slice(1),
          hasharr=str.split("&"),
          amparr=[],
          formarr=[],
          filtera=$(".filter");
      for(var i=0,len=hasharr.length;i<len;i++){
          amparr=[];
          amparr=hasharr[i].split("=");
          //根据从hash值拿到的不同值修改筛选状态以奋拉取数据来用
          switch(amparr[0]){
            case "grade":
              filtera.eq(0).find("dd").removeClass("active").eq(amparr[1]).addClass("active");
              break;
            case "overall":
              filtera.eq(1).find("dd").removeClass("active").eq(amparr[1]).addClass("active");
              break;
            case "time":
              filtera.eq(2).find("dd").removeClass("active").eq(amparr[1]).addClass("active");
              break;
            case "from":
              if(amparr[1]==""){
                return;
              }
              formarr=amparr[1].split("_");
              filtera.eq(3).find(".is-check").removeClass("checked");
              for(var j=0,lenj=formarr.length;j<lenj;j++){
                filtera.eq(3).find(".is-check[data-platform-name="+formarr[j]+"]").addClass("checked").find(".iconcheck").css({"background-position": "-22px 50%"});
              }
              break;
          }
      }
    }
//雷达图
function radar(){
    if(typeof platformInfo != 'object')  return;
    var myChart1 = echarts.init(document.getElementById('safety-rating'));
    var option1 = {
        tooltip : {
            trigger: 'axis',
            formatter: '{c}'
        },
        color:['#00a0e9','#76ccf3','#f39a00','#fccb00'],
        polar : [
            {
                indicator : [
                    {text : '运营能力：'+platformInfo.yunyingnengli, max  : 100},
                    {text : '资本充足：'+platformInfo.levers, max  : 100},
                    {text : '流动性：'+platformInfo.liudongxing, max  : 100},
                    {text : '违约成本：'+platformInfo.weiyuechengben, max  : 100},
                    {text : '透明度：'+platformInfo.toumingdu, max  : 100},
                    {text : '分散度：'+platformInfo.fensandu, max  : 100}
                ],
                radius : 75
            }
        ],
        series : [
            {
                name: '安全评级',
                type: 'radar',
                itemStyle: {
                    normal: {
                        areaStyle: {
                            type: 'default'
                        }
                    }
                },
                data : [
                    {
                        value : [
                            platformInfo.yunyingnengli,
                            platformInfo.levers,
                            platformInfo.liudongxing,
                            platformInfo.weiyuechengben,
                            platformInfo.toumingdu,
                            platformInfo.fensandu
                        ],
                        name : '安全评级'
                    }
                ]
            }
        ]
    };
    myChart1.setOption(option1);
}

//平台标的期限分布、金额分布，饼图
function pie(elementId){
        if($('#'+elementId).length < 1) return;
        var itemName, itemValue;
        switch (elementId) {
            case 'time-distribution':
                if(!timeDistribution) return ;
                itemName = timeDistribution.name;
                itemValue = timeDistribution.value;
                break;
            case 'amount-distribution':
                if(!timeDistribution) return ;
                itemName = amountDistribution.name;
                itemValue = amountDistribution.value;
                break;
            default:
                break;
        }

        var len = itemName.length;
        var zong = [];
        var json = {};
        for(var i=0; i<len; i++) {
            json.value = itemValue[i];
            json.name = itemName[i];
            zong.push(json);
            json = {};
        }

        var myChart2 = echarts.init(document.getElementById(elementId));
        var option2 = {
            tooltip : {
                trigger: 'item'
            },
            color:['#00a0e9','#76ccf3','#f39a00','#fccb00'],
            legend: {
                orient : 'vertical',
                x : 'right',
                y : 'center',
                itemGap: 10,
                data: itemName
            },
            series : [
                {
                    name:'平台标的期限分布',
                    type:'pie',
                    radius : '80%',
                    center: ['40%', '50%'],
                    itemStyle: {
                        normal: {
                            label: {
                                show: false
                            },
                            labelLine: {
                                show: false
                            }
                        }
                    },
                    data: zong
                }
            ]
        };
        myChart2.setOption(option2);
}

// 成交量、资金净流入、未来每日还款，柱状图
function bar(type){
        if($('#volume').length < 1) return;
        var itemName, itemColor, itemX, itemY;
        switch (type) {
            case 'netInflowOfFunds':
                if( !netInflowOfFunds) return;
                itemName = '资金净流入';
                itemColor = '#00a0e9';
                itemX = netInflowOfFunds.itemX;
                itemY = netInflowOfFunds.itemY;
                break;
            case 'futureDailyRepayment':
                if( !futureDailyRepayment) return;
                itemName = '未来每日还款';
                itemColor = '#76ccf3';
                itemX = futureDailyRepayment.itemX;
                itemY = futureDailyRepayment.itemY;
                break;
            default:
                if( !volume) return;
                itemName = '成交量';
                itemColor = '#2dc7c9';
                itemX = volume.itemX;
                itemY = volume.itemY;
                break;
        }
        var myChart3 = echarts.init(document.getElementById('volume'));
        var option3 = {
            color:[itemColor],
            tooltip : {
                trigger: 'axis'
            },
            legend: {
                data:[itemName]
            },
            dataZoom : {
                show : true,
                realtime: true,
                start : 0,
                end : 100
            },
            //calculable : true,
            xAxis : [
                {
                    type : 'category',
                    data : itemX
                }
            ],
            yAxis : [
                {
                    type : 'value',
                    axisLabel : {
                        formatter : '{value} 万元'
                    }
                }
            ],
            series : [
                {
                    name:itemName,
                    type:'bar',
                    data:itemY
                }
            ]
        };
        myChart3.setOption(option3);
}

// 未来60日资金流出走势，折线图
function line(){
        if($('#volume').length < 0) return;
        if(!capitalOutflowTrend) return;
        var itemName = capitalOutflowTrend.name;
        var itemValue = capitalOutflowTrend.value;

        var myChart4 = echarts.init(document.getElementById('volume'));
        var option4 = {
            tooltip : {
                trigger: 'axis'
            },
            legend: {
                data:['未来60日资金流出走势']
            },
            //calculable : true,
            xAxis : [
                {
                    type : 'category',
                    boundaryGap : false,
                    data : itemName
                }
            ],
            yAxis : [
                {
                    type : 'value',
                    axisLabel : {
                        formatter: '{value} 万元'
                    }
                }
            ],
            series : [
                {
                    name:'未来60日资金流出走势',
                    type:'line',
                    data:itemValue
                }
            ]
        };
        myChart4.setOption(option4);
}


function ajaxErrorTip(msg) {
  if(typeof layer === 'object') {
    layer.msg(msg,{icon: 7, time:1200});
  }else {
    alert(msg);
  }
}

/*溢出省略*/
(function(){
  var $dot1 = $('.expert .axis-info').find('p');
  var $dot2 = $('.dynamic .axis-info,.notice .axis-info,#platform-page .news').find('p');
  var $dot3 = $('.hot-question .answer').find('p');
  var $dot4 = $('.media .axis-info,.member-box,.dynamic .axis-info,.latest .axis-info,.activity .axis-info').find('p');
  //var $dot5 = $('#platform-page').find('.honord').children('p');
  var $dot6 = $('#platfrom_bid_list').find('.bond-number');
  $dot1.each(function(){
    var _this = $(this);
    if(_this.height() > 120 ){
      _this.append( ' <a class="toggle" href="#"><span class="open">[全文]</span>' );
      createDots(_this,120);
      destroyDots(_this);
      addBtn(_this,120);
    }
  });
  $dot2.each(function(){
    var _this = $(this);
    if(_this.height() > 72 ){
      createDots(_this,72);
      destroyDots(_this);
    }
  });
  $dot3.each(function(){
    var _this = $(this);
    if(_this.height() > 48 ){
      createDots(_this,48);
      destroyDots(_this);
    }
  });
  $dot4.each(function(){
    var _this = $(this);
    if(_this.height() > 96 ){
      createDots(_this,96);
      destroyDots(_this);
    }
  });
  // $dot5.each(function(){
  //   var _this = $(this);
  //   if(_this.height() > 62 ){
  //     createDots(_this,62);
  //     destroyDots(_this);
  //   }
  // });
  $dot6.each(function(){
    var _this = $(this);
    if(_this.height() > 65 ){
      createDots(_this,65);
      destroyDots(_this);
    }
  });
  createDots($dot1,120);
  createDots($dot2,72);
  createDots($dot3,48);
  createDots($dot4,96);
  // createDots($dot5,62);
  createDots($dot6,65);
  function addBtn(ob,height){
    ob.on(
      'click',
      'a.toggle',
      function() {
        ob.toggleClass( 'opened' );
        if ( ob.hasClass( 'opened' ) ) {
          destroyDots(ob);
          if(navigator.userAgent.indexOf("MSIE 8.0") > 0 && !window.innerWidth){
            //newText =  _this.text().substring(356,367).replace('');
            newText = _this.text().slice('[');
            alert(newText);
          }
        } else {
          createDots(ob,height);
        }
      return false;
    });
  }
  function createDots(ob,height){
    if(ob.dotdotdot){
      ob.dotdotdot({
        height: height,
        after: 'a.toggle'
      });
    }
  }
  function destroyDots(ob){
    ob.trigger( 'destroy' );
  }
})();
/*首页JS s*/
$(function(){
    (function(){  
    /*******浮动导航效果*******/
    var flostNav=$("#main-float-navo"),
        closeflNav=flostNav.find(".close-nav"),
        showbtn=flostNav.find(".onoroff"),
        ads=$(".ad-float"),
        flnavTimer=null;
    $(".returntop").on("click",function(){
      $("html,body").animate({"scrollTop":0},500);
    })
    setPos();
    //窗口缩小，动态设置浮动导航的位置
    $(window).on("resize",function(){
      clearTimeout(flnavTimer);
      flnavTimer=setTimeout(function(){
        setPos();
      },300);
    })
    /*flostNav.on("click",function(ev){
      if(ev.target.className=="peoplelink"){
        $(this).attr("closebz","0").stop().animate({"right":"-10px"},400);
        return false;
      }
    })*/
    showbtn.on("click",function(){
      openFloat();
    })
    //点击关闭按钮，往里面收缩浮动导航
    closeflNav.on("click",function(){
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
    function closeFloat(){
      flostNav.show().stop().animate({"right":"-105px"},400,function(){
        //showbtn.show();
        peopleShow();
      });
    }
    function openFloat(){
      //showbtn.hide();
      peopleHide();
      //518修改为"right":"0"
      flostNav.show().stop().delay(500).animate({"right":"0px"},400);
    }
    function peopleShow(){
      showbtn.animate({"left":"-52px"},500);
    }
    function peopleHide(){
      showbtn.animate({"left":"95px"},500);
    }
    //人物交互JS
    if($("#eye1").length==1){
      var r = 2,
          T1 = 42,
          L1 = 22,
          T2 = 40,
          L2 = 58;
      
      document.onmousemove = function(ev){
        var ev = ev || window.event;

        change(gid('eye1'),ev.clientX,ev.clientY,T1,L1);
        change(gid('eye2'),ev.clientX,ev.clientY,T2,L2);
            
        function change(obj,x,y,t,l){
          
          var zhi1 = getOffset(obj).left;
          var zhi2 = getOffset(obj).top;
                
          var a = Math.abs(x-zhi1);
          var b = Math.abs(y-zhi2);

          var reg = Math.atan(a/b);
          var chax = r*Math.sin(reg); 
          var chay = r*Math.cos(reg); 

          if( x > zhi1 && y < zhi2 ){
            //右上
            
            obj.style.left = l+chax + 'px';
            obj.style.top = t-chay + 'px'; 
             
          }else if( x > zhi1 && y > zhi2 ){
            //右下
            obj.style.left = l+chax + 'px';
            obj.style.top = t+chay + 'px';        
          }else if( x < zhi1 && y > zhi2 ){
            //左下
            obj.style.left = l-chax + 'px';
            obj.style.top = t+chay + 'px';  
          }else if( x < zhi1 && y < zhi2 ){
            //左上
            obj.style.left = l-chax + 'px';
            obj.style.top = t-chay + 'px';  
          }   
        }
      }
      //获取眼睛的offset位置
      function getOffset(obj){
          var itop = 0,
              tleft=0;
          while(obj){
            itop+=obj.offsetTop;
            tleft+=obj.offsetLeft;
            obj = obj.offsetParent;
          }
          return {
            left:tleft,
            top:itop
          };
      }
      //根据ID获取属性
      function gid(v){
       return document.getElementById(v);  
      }
    }
      /*计算器代码*/
      var calcFormo=$("#calcform");
      $('#calcBtn').click(function(){
        $("#sumAmount").text("0");
        $("#interest").text("0");
        var amountForm=$("#amount"),
            deadlineForm=$("#deadline"),
            interestRateForm=$("#interestRate"),
            repaymentTypeForm=$("#repaymentType"),
            creditRateForm=$("#creditRate");
          if(amountForm.val()==""){
            //alert("请输入投资金额!");
            layer.msg("请输入投资金额!",{
              time:2000,
              skin:"yzform-tips",
              icon:2,
              end:function(){
                amountForm.focus();
              }
            })
            return false;
          }
          if(deadlineForm.val()==""){
            //alert("请输入投入时长!");
            layer.msg("请输入投入时长!",{
              time:2000,
              skin:"yzform-tips",
              icon:2,
              end:function(){
                deadlineForm.focus();
              }
            })
            return false;
          }
          if(deadlineForm.val()==""){
            //alert("请输入年化利率!");
            layer.msg("请输入年化利率!",{
              time:2000,
              skin:"yzform-tips",
              icon:2,
              end:function(){
                deadlineForm.focus();
              }
            })
            return false;
          }
          if(repaymentTypeForm.val()==""){
            //alert("请选择还款方式!");
            layer.msg("请选择还款方式!",{
              time:2000,
              skin:"yzform-tips",
              icon:2,
              end:function(){
                repaymentTypeForm.focus();
              }
            })
            return false;
          }
        var amount = parseInt($("#amount").val()); //金额
        var deadline = parseInt(deadlineForm.val()); //月
        var interestRate = $("#interestRate").val();//利率
        var creditRate = creditRateForm.val();//奖励
        var repaymentType = $("#rePayWaySelect1").val();
        if($("#amount").val() == ""){
          amount = 0;
        }

        if(creditRate==""){
          creditRate=0;
        }
        if(parseInt(creditRate)>=100){
          //alert("奖励比率不能超过100!");
          layer.msg("奖励比率不能超过100!",{
            time:2000,
              skin:"yzform-tips",
              icon:2,
              end:function(){
                creditRateForm.focus();
              }
          })
          creditRateForm.val("");
          return false;
        }
        //creditRate=parseInt(creditRate);
          var result="";
          var unitVal=$('input:radio[name="time"]:checked').val();
          if(unitVal=="1"){
          if(repaymentType=='1' && $("#interestRate").val()!="" && $("#deadline").val()!=""){
            result=calcDQHBX(amount,deadline,interestRate,creditRate);
          }else if(repaymentType=="2" && $("#interestRate").val()!="" && $("#deadline").val()!=""){
            result=calcAYHBX(amount,deadline,interestRate,creditRate);
          }else if(repaymentType=="3" && $("#interestRate").val()!="" && $("#deadline").val()!=""){
            if(deadline%3>0){
              //alert("当还款方式为【按季还本息时】投入时长必须为3的整数倍!");
              layer.msg("当还款方式为【按季还本息时】投入时长必须为3的整数倍!",{
                  time:2000,
                  skin:"yzform-tips",
                  icon:2,
                  end:function(){
                    deadlineForm.focus();
                  }
              })
              return false;
            }
            result=calcAJHBX(amount,deadline,interestRate,creditRate);
          }
        }else{
          result=calcDQHBXR(amount,deadline,interestRate,creditRate);
        }
        $("#resultCon").show();
        $("#sumAmount").text(result.toFixed(2));
        $("#interest").text((result-amount).toFixed(2));
      });

      $('#cancelCalcBtn').click(function(){
        calcreset();
      });
      //计算器弹出调用代码
      $("#calcStart").on("click",function(){
        layer.open({
          type:1,
          title:"计算器",
          area:["540px"],
          content:$("#a_calc"),
          success:function(){
            calcreset();
          }
        })
      })
      //到期还本息
      function calcDQHBX(amount,time,rate,bonus){
        var result=amount*(1+(rate/100)*(time/12))+amount*(bonus/100);
        return result;
      }
      //按月还本息
      function calcAYHBX(amount,time,rate,bonus){
          //月利率
          rate=rate/(100*12);
          var result=(amount*rate*Math.pow((1+rate),time))/(Math.pow((1+rate),time)-1);
        result=result*time+amount*(bonus/100);
        return result;
      }
      //按季还本息
      function calcAJHBX(amount,time,rate,bonus){
        var size=time/3;
        var result=0;
        //月利率
          rate=rate/(100*12);
        for(var i=0;i<size;i++){
          //每一轮的前两个月还款利息
          var tmpA=amount*(1-((3*i)/time))*rate*2;
          //每一轮的最后一个月还款金
          var tmpB=amount*(1-((3*i)/time))*rate+(3/time)*amount;
          result+=tmpA+tmpB;
        }
        result+=amount*(bonus/100);
        return result;
      }
      //到期还本息(日)
      function calcDQHBXR(amount,time,rate,bonus){
        var result=amount*(1+(rate/100)*(time/365))+amount*(bonus/100);
        return result;
      }
      //重置函数
      function calcreset(){
        calcFormo[0].reset();
        $("#resultCon").hide();
        $("#sumAmount").text('0');
        $("#interest").text('0');
      }
  })();
});

/*首页JS e*/

//新手指南
$(function(){
  if($('#guide').length > 0) {
    $('.step').hover(function(){
      $(this).addClass('active');
    },function(){
      $(this).removeClass('active');
    });
    
    $('.text1').hover(function(){
      $(this).find('h3,p').css('color','#2AA3CE');
      $('.guarantee-line').css({'background-position':'-884px 0'});
      $('.guarantee-img').css('background-position','-500px 0');
    },function(){
      $(this).find('h3,p').css('color','#646567');
      $('.guarantee-line').css('background-position','0 0');
      $('.guarantee-img').css('background-position','0 0');
    });
    $('.text2').hover(function(){
      $(this).find('h3,p').css('color','#A0CA6B');
      $('.guarantee-line').css('background-position','-1768px 0');
      $('.guarantee-img').css('background-position','-1000px 0');
    },function(){
      $(this).find('h3,p').css('color','#646567');
      $('.guarantee-line').css('background-position','0 0');
      $('.guarantee-img').css('background-position','0 0');
    });
    $('.text3').hover(function(){
      $(this).find('h3,p').css('color','#2AA3CE');
      $('.guarantee-line').css('background-position','-2652px 0');
      $('.guarantee-img').css('background-position','-1500px 0');
    },function(){
      $(this).find('h3,p').css('color','#646567');
      $('.guarantee-line').css('background-position','0 0');
      $('.guarantee-img').css('background-position','0 0');
    });
    $('.text4').hover(function(){
      $(this).find('h3,p').css('color','#A0CA6B');
      $('.guarantee-line').css('background-position','-3536px 0');
      $('.guarantee-img').css('background-position','-2000px 0');
    },function(){
      $(this).find('h3,p').css('color','#646567');
      $('.guarantee-line').css('background-position','0 0');
      $('.guarantee-img').css('background-position','0 0');
    });
    $('.text5').hover(function(){
      $(this).find('h3,p').css('color','#2AA3CE');
      $('.guarantee-line').css('background-position','-4420px 0');
      $('.guarantee-img').css('background-position','-2500px 0');
    },function(){
      $(this).find('h3,p').css('color','#646567');
      $('.guarantee-line').css('background-position','0 0');
      $('.guarantee-img').css('background-position','0 0');
    });
    $('.text6').hover(function(){
      $(this).find('h3,p').css('color','#A0CA6B');
      $('.guarantee-line').css('background-position','-5304px 0');
      $('.guarantee-img').css('background-position','-3000px 0');
    },function(){
      $(this).find('h3,p').css('color','#646567');
      $('.guarantee-line').css('background-position','0 0');
      $('.guarantee-img').css('background-position','0 0');
    });
  }
});

$(function(){
  if($('#secondmarket-page').length > 0 && $('#secondmarket-page').hasClass('activity_debt')) {
    $('#credits').trigger('keyup');
    $('.forget-pass').find('.iconfont').hover(function(){
      $('.pass-tip').show();
    },function(){
      $('.pass-tip').hide();
    });
    //获取新手标购买记录
    var requestData = {
      'page' : 1,
      'bid' : $('#activity-buy-records').attr('data-bid')
    }

  $.ajax({
    url:'/activity/buyRecords',
    data: requestData,
    type: 'GET',
    success:function(data){
      $('#activity-buy-records tbody').html(data.recordStr);
      laypage({
            cont: 'activity_buy_page',
            pages: data.pages, 
            skip: false,
            groups:7,
            first: false,
            last: false,
            skin: 'radius',
            prev:'&#xe65f;',
            next:'&#xe660;',
            jump: function(e, first){ 
              if(first) return;
              requestData.page = e.curr;
              $.ajax({
                url: '/activity/buyRecords', 
                type: 'GET',
                data: requestData,
                dataType: 'json', 
                success: function(data){
                  $('#activity-buy-records tbody').html(data.recordStr);
                },
                error:function() {
                  ajaxErrorTip('新手标购买记录信息获取失败');
                }
              })
            }
          });
    },
    error: function() {
      ajaxErrorTip('新手标购买记录信息获取失败');
    }

  });
  }
});


$(function(){
  if($('#aboutpage').length > 0) {
    switch(location.hash) {
      case '#process':
        $('#aboutpage .tab-nav li a').eq(0).trigger('click')
        break;
      case '#touzhijia':
        $('#aboutpage .tab-nav li a').eq(1).trigger('click')
        break;
      case '#accounts':
        $('#aboutpage .tab-nav li a').eq(3).trigger('click')
        break;
    }
  }
});

//加息券

(function(){
  var quan = $('<img src="//static.touzhijia.com/images/platform/jiaxiquan.png" />');
  $('#index-con .rate-con').css('position','relative').append(quan);
  $('#index-con .rate-con img').css({
    'position': 'absolute',
    'top': '20px',
    'right': '10px',
    'width': '54px'
  });
  $('#platform .plat-info').css('position','relative').append(quan);
  $('#platform .plat-info img').css({
    'position': 'absolute',
    'top': '21px',
    'right': '-22px',
    'width': '54px'
  });
  
})();
 
$('.brands-sec tr').click(function(){
	var link=$(this).data("link");
	window.open(link);
})
$(".table-bordered tr").click(function(){
	var link = $(this).data("link");
	window.open(link);
});
//$(function() {
//  $.get('/Financialweekcheck/activeAward');//激活抽中的奖品
//})