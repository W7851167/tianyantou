function filterEllipsis(className,ddIndex,hei){
  var filterBtn = $('<div class="filter-btn"><a href="javascript:;" class="btn filterBtnOpen">展开<i class="iconfont">&#xe691;</i></a><a href="javascript:;" class="btn filterBtnClose">收起<i class="iconfont">&#xe690;</i></a></div>');
      _list = $(className);
  _list.each(function(){
    var _this = $(this);
    if(_this.find('dd').length >= ddIndex){
      //filterBtnOpen.insertBefore(_this.find('dd').eq(ddIndex-2));
      _this.css({'height':hei+'px'});//.find('dd:gt(16)').hide();
      filterBtn.insertAfter(_this);
      $('.filterBtnClose').hide();
    }
  });
  $('.filter-btn').on('click','.filterBtnOpen',function(){
    $(this).next().show().end()
    .parent().prev().css({'height':'auto'});
    $(this).hide();
  }).on('click','.filterBtnClose',function(){
    //filterBtnOpen.insertBefore($(this).parents(className).find('dd').eq(ddIndex-2));
    $(this).prev().show().end()
    .parent().prev().css({'height':'76px'});
    $(this).hide();
  });
}