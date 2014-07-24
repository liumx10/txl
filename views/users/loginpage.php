<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>login - TXL</title>
	<meta charset="utf-8">
<?php
echo $this->Html->css('application-lo.css');
?>
	</head>
	<body>
	<div class="wrapper">
<div class="page" id="page-signin">
	<div class="sign-page">
		<div class="hd">
			<h1 class="logo">tower.im</h1>
		</div>

		<div class="bd">
			<form class="form" action="login" data-remote="true" method="post" novalidate="">
				<div class="form-item">
					<div class="form-field">
						<input type="email" tabindex="1" name="data[user][username]" id="email" placeholder="登录邮箱" data-validate="required;email" data-validate-msg="请填写你的登录邮箱" autofocus=""></div>
				</div>

				<div class="form-item">
					<div class="form-field">
						<input type="password" tabindex="2" name="data[user][password]" placeholder="密码" data-validate="required;length:6" data-validate-msg="请填写你的登录密码"></div>
				</div>

				<div class="form-item sign-in-btn">
					<button type="submit" tabindex="3" id="btn-signin" class="btn btn-primary btn-submit" data-disable-with="正在登录..." data-goto="/launchpad/">登录</button>
					<div class="desc">
						<label id="label-remember"><input type="checkbox" name="remember_me" id="cb-remember" tabindex="4" checked="1"> 下次自动登录</label>
						<span class="forgot-pw"><a href="https://tower.im/users/forgot_password" tabindex="5">忘记密码了？</a></span>
					</div>
				</div>
			</form>

			<div class="sign-nav">
				没有帐号？<span><a href="signuppage">免费注册 →</a></span>
			</div>
		</div>
	</div>
</div>

	</div>

	<input type="hidden" id="d18n-enabled" value="false">
	<input type="hidden" id="server-time" value="2014-07-09 19:28:38 +08:00">



	<div id="droppable-top"></div>
	<div id="droppable-bottom"></div>
	<div id="droppable-left"></div>
	<div id="droppable-right"></div></body></html>
