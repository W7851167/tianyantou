(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('a.inline-modify').click(function(e) {
        e.preventDefault();
        var targetSelector = $(this).data('target');
        var $target = $(targetSelector);
        if ($target.hasClass('hidden')) {
            $target.empty();
            var url = $(this).attr('href');
            $target.load(url,function(){
                $target.removeClass('hidden');
                Ucenter.readaptSidemenuAndMainpanel();
            });

        } else {
            $target.empty();
            $target.addClass('hidden');
        }
    });
})();