$(function() {
  var requestData = {
	      "page" : 1
	};
	laypage({
	    cont: 'borrows_pagination',
	    pages: $('#borrows_pagination').attr('data-pagesize'),//data.pages, 
	    skip: false, 
	    groups:7,
	    first: false,
	    last: false,
	    skin: 'radius', 
	    curr:1,
	    prev:'&#xe65f;',
	    next:'&#xe660;',
	    jump: function(e, first){ 
	    	console.log(first);
	    	console.log(e.curr);
	    	if(first) return;
	    		requestData.page = e.curr;
			$.ajax({
				url: '/debt/borrows/brandlists', 
				type: 'GET',
				data: requestData, 
				dataType: 'json',
				success:function(data){
				  $('#borrows-box').html(data.borrowstr);
				  countDown();
				},
				error: function() {
				  ajaxErrorTip('获取债权列表信息失败');
				    }
				  })
	    }
  });
})