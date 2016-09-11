(function(){
  var fresh = $('.m-freshman'),
      isClear = true;
     
  if(fresh.hasClass('active')){
    //隐藏第一个之外的所有任务组
    $('.m-freshman > .m-box').hide();
    
    //判断任务组里所有任务是否完成
    var firstGroup = fresh.find('.m-group'),
        mBoxs = firstGroup.find('.m-box');
    mBoxs.each(function(){
      if(!$(this).hasClass('m-clear')){
        isClear = false;
        return false;
      }
    });
    
    if(isClear){
      firstGroup.hide();
      $('.m-freshman > .m-box').show();
    }
  }

   /*签到*/
    $('#checkin').one('click', function(e){
      $.ajax({
        url : '/shop/signin',
        type:'get',
        dataType:'json',
        success : function(data){
          if(data.ret == 1) {
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
          text = '奖励：您已连续签到 '+signinCount+' 天，明日签到+'+signInReward[tomorrowReward]+'积分';
          //修改样式
          $("this").remove();
          $("#is").addClass('m-clear');
          $("#ri").html(text);
          $("#gan").html("状态：已签到<i class='iconfont'>&#xe61b;</i>");
          }
        }
      });
    });
})();
