<!-- 头信息 -->
@include('mobile.public.header')
<!-- 头信息结束 -->
	<body>
		<div class="platform">
			<div class="header">
				<a href="#" onClick="javascript :history.back(-1);"><img src="//static.tianyantou.com/images/mobile/11.png"/></a>
				<p class="plat-title">投资记录提交</p>
			</div>
			<div class="submit">
				<p class="submit-p1">请提交已投资信息</p>
				<p class="submit-p2">*投资成功后请务必保存投资信息（以便追单获得返利）</p>
				<form id="sendInComeGold" method="post" data-toggle="ajaxFormGold">
					{!! csrf_field() !!}
					<ul>

						<li>
							<p>理财平台：</p>
							<select name="" id="corp_id" >
								<option value="0">请选择</option>
								@if(!empty($tasks))
									@foreach($tasks as $cv)
										<option value="{!! $cv->id !!}">{!! $cv->name !!}</option>
									@endforeach
								@endif
							</select>
						</li>
						<li>
							<p>平台项目：</p>

							<select name="data[task_id]" id="task_id">
								<option value='0'>请选择</option>
                                <option value='1'>请选择</option>
							</select>
						</li>

						<li>
							<p>投资标期：</p>
							<input type="text" id="term" name="data[term]" onblur="coupon()" value="" style="width:100px;" onkeyup="this.value=this.value.replace(/\D/g,'')"  />个月
						</li>
						<li>
							<p>手机号码：</p>
							<input type="text" id="mobile" name="data[mobile]" value="" onblur="coupon()"  placeholder="请输入手机号码" onkeyup="this.value=this.value.replace(/\D/g,'')" />
						</li>
			 			<li>
							<p>投资金额：</p>
							<input type="text" id="price" name="data[price]" value=""  onblur="coupon()" placeholder="请输入投资金额"/>
						</li>
						<li>
							<p>优惠卷：</p>

							<select name="data[use_id]" id="use_id">
								<option value='0'>请选择</option >
							</select>
						</li>
					</ul>
					<input type="submit" class="btn-blue btn-l btn-submit submit-btn" value="提交">
					<!--<a href="javascript:;" id="submit-gold" class="submit-btn">提交</a>-->
				</form>
			</div>
			<img class="submit-img"  src="//static.tianyantou.com/images/mobile/2win.png"/>
		</div>
		<script src="//static.tianyantou.com/js/mobile/jquery-2.1.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="{!! config('app.static_url') !!}/js/lib/jquery.form.min.js"></script>
		<script type="text/javascript">
			$(function() {
				$('form[data-toggle=ajaxFormGold]').ajaxForm({
					delegation: true,
					beforeSubmit: function () {
					},
					success: function(data) {
						if(data.status == 1) {
							alert(data.message);
							setTimeout(function() {
								window.location.href = data.url;
							}, 3000);
						} else {
							alert(data.message);
						}
					},
					error:function(){
						var messageText = '系统繁忙请稍后重试，天眼投客服电话 010-57283503';
						alert(messageText);
					}
				});
			});
		</script>
        <script>
            $(document).ready(function () {
                $('#corp_id').change(function () {
                   var value = $(this).val();
                   $("#task_id option[value!='0']").remove();
                   if(value>0){
                       $.post("/item", {'_token' : '{!! csrf_token() !!}' , 'corp_id' : value}, function (data) {
                           var count = data.length;
                           for (var i = 0; i < count; i++) {
                               $('#task_id').append(data[i]);

                           }
                       })
                   }

                })
            })
        </script>
	<script type="application/javascript">
        function coupon() {
            $("#use_id option[value!=0]").remove();
            var corp = $('#corp_id').val();
			var price = $("#price").val();
			var term = $('#term').val();
			if(price != '' && term != '' && corp !=0){
			    $.post("/coupon", {'_token': '{!! csrf_token() !!}', 'data[sum]':price , 'data[month]':term , 'data[corp_id]':corp}, function (data) {
                    var count = data.length;
                    for (var i = 0; i < count; i++) {
                        $('#use_id').append(data[i]);
                    }
                })
			}
        }
	</script>
	</body>
</html>