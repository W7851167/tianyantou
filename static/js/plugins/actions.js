var callbacks = {
  countDown: function(data, $target) {
    $target.countdown(60);
  },
  _default: function(data, $target) {
    layer && layer.closeAll('page');
    var refreshUrl = $target.data('refresh-url');
    if (refreshUrl) {
      var parts = refreshUrl.split('#');
      if (parts[0]) {
        $('#'+parts[1]).load(parts[0]);
      } else {
        $('#'+parts[1]).html(data);
      }
    } else {
      data && messageBox(data, 1);
      location.reload();
    }
  }
};

function registerActionCallback(name, callback) {
  callbacks[name] = callback;
}

(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $(document).on('click', 'a.action[data-method]', function(e) {
    e.preventDefault();
    var $target = $(e.target);
    if ($target.hasClass('btn-invalid')) {
      return;
    }
    var method = $target.data('method');
    var url = $target.attr('href');
    var callbackName = $target.data('callback') || "_default";
    var confirmText = $target.data('confirm');
    if (confirmText && !confirm(confirmText)) {
      return;
    }
    $.ajax({
      url: url,
      method: method,
      success: function(data) {
        var callback = callbacks[callbackName] || callbacks['_default'];
        callback(data, $target);
      },
      error: function(xhr) {
        var ct = xhr.getResponseHeader('content-type');
        if (ct.indexOf('plain') > -1) {
          messageBox(xhr.responseText, 2);
        } else {
          messageBox('系统繁忙请稍后重试，天眼投客服电话 400-883-1803', 2);
        }
      }
    });
  });
})();


/*平台等页面Hover样式*/
$('#networth .first-menu').on('mouseover', 'h3', function(){
  $(this).css({
    'background-color':'#FAFAFA'
  });
});
$('#networth .first-menu').on('mouseout', 'h3', function(){
  $(this).css({
    'background-color':'#FFF'
  });
});
$('.forget-pass').find('.iconfont').hover(function(){
  $('.pass-tip').show();
},function(){
  $('.pass-tip').hide();
});