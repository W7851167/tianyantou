(function(){
  $('a[rel="prettyPhoto"]').prettyPhoto({
    theme: 'light_square'
  });
  var posterBox = $('.poster-wrap').find('li');
  posterBox.hover(function(){
    var thisMask = $(this).find('.mask');
    if(!thisMask.is(':animated')){
      $(this).siblings().find('.mask').fadeOut();
      thisMask.stop().fadeIn(200);
    }
  },function(){
    var thisMask = $(this).find('.mask');
    if(!thisMask.is(':animated')){
      thisMask.stop().fadeOut(200);
    }
  });
})();