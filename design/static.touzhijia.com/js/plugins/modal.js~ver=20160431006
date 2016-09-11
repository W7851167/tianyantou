(function() {
  $(document).on('click', '[data-toggle="modal"]', function (e) {
    e.preventDefault();

    var $this   = $(this);
    var href    = $this.attr('href');
    var $target = $($this.data('target') || (href && href.replace(/.*(?=#[^\s]+$)/, ''))); // strip for ie7

    var title = $target.find('h1').text();
    var content = $target.find('.content').html();
    var width = $target.attr('width') || '610px';
    var height = $target.attr('height');
    var area = [width];
    if (height) {
      area.push(height);
    }

    layer.closeAll();
    layer.open({
      type: 1,
      title: title,
      area: area,
      shadeClose: false,
      content: '<div class="user-center" style="font-size:14px;margin-top:0;">' + content + '</div>'
    });
  });
})();
