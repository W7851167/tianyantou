(function() {
  $(document).on('click', 'div[data-pagination-ref] > a', function(e) {
    e.preventDefault();
    e.stopPropagation();
    var $target = $(e.target)
    var ref = $target.parent('.pagination').data('pagination-ref');
    var $ref = $('#' + ref);

    var timerId = window.setTimeout(function() {
      $ref.html('<div class="loading">正在奋力为您加载...</div>');
    }, 200);

    $ref.load($target.attr('href'), function(res, status, xhr) {
      window.clearTimeout(timerId);
      if (status == "error") {
        $ref.text('系统繁忙请稍后重试，投之家客服电话 400-883-1803');
      }
      //usercenter readapt
      if(!!Ucenter){
        Ucenter.readaptSidemenuAndMainpanel();
      }
    });
  });
})();