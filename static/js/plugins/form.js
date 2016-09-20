//模拟checkbox效果
function formCheckBtn(){
  var checkBtn = $('#is-check,.is-check');
  checkBtn.on('click',function(){
    var _this = $(this);
    if(!_this.hasClass('checked')){
      _this.addClass('checked').find('.iconfont').html('&#xe61b;');
      _this.addClass('checked').find('.iconcheck').css('background-position','-22px center');
    }else{
      _this.removeClass('checked').find('.iconfont').html('&#xe619;');
      _this.removeClass('checked').find('.iconcheck').css('background-position','left center');
    }
  });
}
formCheckBtn();
//让不支持placeholder的浏览器实现此属性  
(function(){
  function supports_input_placeholder(){
    var i = document.createElement("input");  
    return "placeholder" in i;
  }
  var input_placeholder = $("input[placeholder],textarea[placeholder]");  
  if (input_placeholder.length !== 0 && !supports_input_placeholder()) {
    var color_place = "#C3C3C3";   
    var color_blur = "#94969B";
    $.each(input_placeholder, function(i){  
      var isUserEnter = 0; // 是否为用户输入内容,placeholder允许用户的输入和默认内容一样  
      var ph = $(this).attr("placeholder");  
      var curColor = $(this).css("color");  
      $(this).val(ph).css("color", color_place); 
      $(this).focus(function(){  
        if ($(this).val() == ph && !isUserEnter) $(this).val("").css("color", curColor);  
      }).blur(function(){  
        if ($(this).val() == "") {  
          $(this).val(ph).css("color", color_place);  
          isUserEnter = 0;  
        }
        $(this).addClass('inputted');
      }).keyup(function(){  
        if ($(this).val() !== ph) isUserEnter = 1;  
      });  
    });  
  }
  input_placeholder.blur(function(){
    if ($(this).val() !== "") {  
      $(this).addClass('inputted');
    }  
  });
})();

//模拟下拉菜单
(function(){
  var selectMenu = $('.select span');
  var allUl = selectMenu.next('ul');
  var iTag = '<i></i>'; 
  allUl.hide();
  selectMenu.on('click',function(e){
    var thisUl = $(this).next('ul');
    var thisItem = thisUl.find('li a');
    
    ulH = thisUl.prev().outerWidth();
    allUl.hide();
    thisUl.css({
      width: ulH + 'px'
    })
    .slideDown(200);
    //点击空白关闭下拉菜单
    $(document).click(function(){
      thisUl.hide();
    });
    //下拉项选择
    thisItem.click(function(e){
      e.preventDefault();
      var pUl = $(this).parents('ul');
      if(!pUl.is(':animated')){
        pUl.hide()
        .prev().html($(this).text()+iTag);
      }
    });
    //阻止冒泡
    e.stopPropagation();
  });
})();

function enableButton($elem, enable) {
  if (enable) {
    $elem.removeClass('btn-invalid');
    $elem.prop("disabled", false);
  } else {
    $elem.addClass('btn-invalid');
    $elem.prop("disabled", true);
  }
  
}

(function() {
  $('.disabled input').prop("disabled", true);
  $('form[data-toggle=ajaxForm]').ajaxForm({
    delegation: true,
    beforeSubmit: function ($formData, $form) {
      $submitBtn = $form.find('input[type=submit]');
      enableButton($submitBtn, false);
    },
    success: function(data, status, xhr, $form) {
      $submitBtn = $form.find('input[type=submit]');
      enableButton($submitBtn, true);

      layer && layer.closeAll('page');
      if (data.code) {
        if (data.code == 303) {
          window.location.href = data.url;
        }
      } else {
        var refreshUrl = $form.data('refresh-url');
        if (refreshUrl) {
          var parts = refreshUrl.split('#');
          if (parts[0]) {
            $('#'+parts[1]).load(parts[0]);
          } else {
            $('#'+parts[1]).html(data);
          }
          Ucenter.readaptSidemenuAndMainpanel();
        } else {
         if(data.status == 1) {
           messageBox(data.message, 1);
         } else {
           messageBox(data.message,2)
         }
          setTimeout(function() {
            location.reload();
          }, 3000);
          if(data.status == 1) {
            window.location.href = data.url;
          }
        }
      }
    },
    error: function(xhr, status, text, $form) {
      $submitBtn = $form.find('input[type=submit]');
      enableButton($submitBtn, true);
      
      var ct = xhr.getResponseHeader('content-type');
      var $message = $form.find('.msg-wrap');
      var messageText = '系统繁忙请稍后重试，天眼投客服电话 010-57283503';
      if (ct.indexOf('plain') > -1) {
        messageText = xhr.responseText;
      }

      var messageHandled = false;
      var messageParts = messageText.split('|||');
      $.each(messageParts, function(i, m) {
        var mParts = m.split('###');
        mText = mParts[0];
        if (mParts.length > 1) {
          $message = $form.find('input[name=' + mParts[1] + ']').siblings('.error');
        }
        if ($message.length) {
          $message.html('<div class="msg-error"><i class="iconfont">&#xe664;</i>'+mText+'</div>').css('visibility', 'visible').css('display', 'block');
          messageHandled = true;
        }
      });

      if (!messageHandled) {
        messageBox(messageText, 2);
      }
    }
  });
})();