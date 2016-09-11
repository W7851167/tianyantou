function navFollow(ob,hideElements,bodyH){
  $(window).resize(function(){
    hideNav(ob);
  });
  //获取最小偏移高度
  var minTop = $(ob).offset().top;
  //获取最大偏移高度
  var maxTop,
      hideH = 0;
  if( !(hideElements == undefined)){
    $(hideElements).each(function(){
      var _thisH = $(this).outerHeight();
      hideH += _thisH;
    });
  }
  var bodyH = bodyH || $('body').height() - hideH,
      windowH = $(window).height(),
      overflowH = $('#foot').outerHeight()-(windowH - $(ob).outerHeight() - 10);
  maxTop = bodyH - windowH - overflowH;
  $(window).scroll(function(){
    var _scrollTop = $(document).scrollTop();
    if($(window).width() < 1200){
      $(ob).hide();
    }
    if(_scrollTop <=　minTop){
      $(ob).css({
        'position':'static',
        'margin-left':0
      });
    }
    if(_scrollTop >=　minTop){
      $(ob).css({
        'position':'fixed',
        'top':0,
        'bottom':'auto',
        'left':'50%',
        'margin-left':'300px'
      });
      if(_scrollTop >=　maxTop){
        $(ob).css({
          'position':'absolute',
          'top':'auto',
          'bottom':0
        });
      }
    }
  });
}
