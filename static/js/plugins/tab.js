//选项卡
(function(){
  var tab = {
    clickTab: '.click-tab',
    hoverTab: '.hover-tab',
    autoTab: '.auto-tab',
    addClass: 'active',
    contentClass: '.tab-main',
    interval: 3000,
//  initialHeight: function(){
//    var tabMain = $(tab.contentClass);
//    var initH = tabMain.find('.active').height();
//    tabMain.css('height',initH);
//  },
    timer:'',
    //鼠标点击选项卡
    click: function(className){
      var addClass = this.addClass; 
      $(className).find('.tab-nav').on('click','a',function(e){
        e.preventDefault();
        var menu = $(e.target);
        var index = menu.parents('li').index();
        if(index === -1) return false;
        var divs = menu.parents('.tab-nav').next().children('div');
        menu.parent().addClass(addClass).siblings().removeClass(addClass);
        divs.removeClass(addClass);
        menu.parents('.tab-nav').next().children('div').eq(index).addClass(addClass);
      });
    },
    //鼠标悬浮选项卡
    hover: function(className){
      var addClass = this.addClass; 
      $(className).find('.tab-nav').on('mouseenter','a',function(e){
        e.preventDefault();
        var menu = $(e.target);
        var index = menu.parents('li').index();
        var divs = menu.parents('.tab-nav').next().children('div');
        //var hei = divs.eq(index).height();
        menu.parent().addClass(addClass).siblings().removeClass(addClass);
        divs.removeClass(addClass);
        menu.parents('.tab-nav').next().children('div').eq(index).addClass(addClass);
      });
    },
    //自动滚动选项卡
    auto: function(){
      tab.timer = setInterval(function(e){
        tab.repeat();
      },tab.interval);
    },
    repeat:function(){
      var addClass = this.addClass,
          menu = $('.auto-tab').find('li'),
          len = menu.length,
          index;
      menu.each(function(){
        if($(this).hasClass('active')){
          index = $(this).index();
        }
      });
      if (index == len-1){
        index = -1; 
      }
      index++;
      var divs = menu.parents('.tab-nav').next().children('div');
      //var hei = divs.eq(index).height();
      menu.eq(index).addClass(addClass).siblings().removeClass(addClass);
      divs.removeClass(addClass);
      menu.parents('.tab-nav').next().children('div').eq(index).addClass(addClass);
    }
  }
  /*选项卡*/
  //tab.initialHeight();
  tab.click(tab.clickTab);
  tab.hover(tab.hoverTab);
  tab.auto();
})();
