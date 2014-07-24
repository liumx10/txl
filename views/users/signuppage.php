<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>注册 - TXL</title>
	<meta charset="utf-8">
<?php
echo $this->Html->css('application-si.css');
?>
	</head>
<body>
<div class="wrapper">
<div class="page" id="page-signup">
	<div class="sign-page">
		<div class="hd">
			<h1 class="logo">Tower</h1>
		</div>

		<div class="bd">
			<form class="form" action="register" method="post" data-remote="true" novalidate="">

				<div class="form-item">
					<div class="form-field">
						<input class="team-name" name="data[user][company]" type="text" placeholder="公司或团队的名称" autocomplete="off" data-validate="required;length:1,255" data-validate-msg="请填写团队或者公司的名称" autofocus="1">
					</div>
				</div>
				<div class="form-item">
					<div class="form-field">
						<input class="email" name="data[user][username]" type="text" placeholder="你的邮箱地址" autocomplete="off" data-validate="required;email" data-validate-msg="请填写你的邮箱地址">
					</div>
				</div>
				<div class="form-item">
					<div class="form-field">
						<input class="password" name="data[user][password]" type="password" placeholder="设置一个密码" autocomplete="off" data-validate="required;length:6" data-validate-msg="请设置一个登录密码；至少6位">
					</div>
				</div>

				<div class="form-item form-btns">
					<button type="submit" id="btn-signup" class="btn btn-primary btn-large btn-submit" data-disable-with="正在注册...">注册</button>
					<p class="desc">点击注册表示你已阅读并同意<a href="#">《TXL 服务条款》</a></p>
				</div>

			</form>
			<div class="sign-nav">
			<!--这里登录后就到达信息页面-->
				已有帐号？<span><a href="loginpage">立即登录 →</a></span>
			</div>
		</div>
	</div>
</div>

	</div>

	<input type="hidden" id="d18n-enabled" value="false">
	<input type="hidden" id="server-time" value="2014-07-09 17:17:13 +08:00">
		<input type="hidden" id="team-guid" value="f79aaec9614247999d10a37da8b43ef2">
		<input type="hidden" id="team-enable-pusher" value="true">
		<input type="hidden" id="user-visit-welcome-project-before" value="true">
		<input type="hidden" id="user-email" value="ziyinglanre@163.com">
		<input type="hidden" id="unused-bubbles" value="8,9,10,11,12,13">
		<input type="hidden" id="member-id" value="238928">
		<input type="hidden" id="member-guid" value="219c4d666dc1417ab7042abf89694f4f">
		<input type="hidden" id="member-nickname" value="ziyinglanre">
		<input type="hidden" id="member-avatar" value="/assets/default_avatars/cloud.jpg">
		<input type="hidden" id="conn-guid" value="016af77b489b0aa8d3cc1755b7edb3bb">
		<input type="hidden" id="beta" value="false">

		<input type="hidden" id="member-admin">
		<input type="hidden" id="member-owner">

		<script id="tpl-member-menu" type="text/html">
			<ul class="member-menu">
				<li>
					<a href="/members/219c4d666dc1417ab7042abf89694f4f/settings" data-stack-root="true" data-stack="true" target="_blank">个人设置</a>
				</li>

					<li class="part-line"></li>
					<li>
						<a href="/teams/f79aaec9614247999d10a37da8b43ef2/get-bonus-after-sign-in-via-mobile?utm_source=in_tower&amp;utm_medium=nav_link&amp;utm_campaign=mobile_ad0913" class="intro-message" target="_blank">
							<i class="fa fa-gift"></i> 活动有礼
</a>					</li>

				<li class="part-line"></li>
						<li><a href="/teams/f79aaec9614247999d10a37da8b43ef2/account_settings" data-stack="true" data-stack-root="true">团队帐号</a></li>
						<li><a href="/teams/f79aaec9614247999d10a37da8b43ef2/upgrade" data-stack="true" data-stack-root="true">升级到企业版</a></li>
				<li><a href="/teams/f79aaec9614247999d10a37da8b43ef2/stats" data-stack data-stack-bare data-stack-root>统计</a></li>

				<li class="part-line"></li>
				<li><a href="/launchpad?skip=1">创建团队</a></li>
				<li><a href="/users/sign_out" data-method="DELETE" rel="nofollow">退出</a></li>
			</ul>
		</script>


	<div id="droppable-top"></div>
	<div id="droppable-bottom"></div>
	<div id="droppable-left"></div>
	<div id="droppable-right"></div>
	</body></html>
