//临时增加样式，对用户购标前进行加息券购买提醒
var vouchertips = $("#vouchertips");
vouchertips.css('font-size','14px').css('color','#9fa0a3');
vouchertips.hover(function(){
  $(this).css('color','#2AA3CE');
},function(){
  $(this).css('color','#9fa0a3');
});