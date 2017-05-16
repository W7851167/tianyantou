<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="initial-scale=1, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width"/>
		<link rel="stylesheet" type="text/css" href="//static.tianyantou.com/css/mobile/reset.css"/>
		<link rel="stylesheet" type="text/css" href="//static.tianyantou.com/css/mobile/defult.css"/>
		
		<title>P2P投资理财节</title>
		<script>
            var _hmt = _hmt || [];
            (function() {
                var hm = document.createElement("script");
                hm.src = "https://hm.baidu.com/hm.js?4bce883bdb22bd76c22b2983afc1ae4d";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(hm, s);
            })();
		</script>
	</head>
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
						<li style="color:red; font-size:16px;">
							爱奇艺会员会在5个工作日内,充值到投资人的手机号上
						</li>
						<li>
							<p>理财平台：</p>
							<select name="data[task_id]" id="task_id">
								<option value="0">请选择</option>
								@if(!empty($tasks))
									@foreach($tasks as $cv)
										<option value="{!! $cv->id !!}">{!! $cv->title !!}</option>
									@endforeach
								@endif
							</select>
						</li>
						<li>
							<p>投资标期：</p>
							<input type="text" id="term" name="data[term]" value="" style="width:100px;" onkeyup="this.value=this.value.replace(/\D/g,'')"  />个月
						</li>
						<li>
							<p>手机号码：</p>
							<input type="text" id="mobile" name="data[mobile]" value=""  placeholder="请输入手机号码" onkeyup="this.value=this.value.replace(/\D/g,'')" />
						</li>
						<li>
							<p>投资金额：</p>
							<input type="text" id="price" name="data[price]" value="" placeholder="请输入投资金额"/>
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
	</body>
</html>