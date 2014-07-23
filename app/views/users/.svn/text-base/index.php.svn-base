<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>TXL</title>
<?php
echo $this->Html->css('application.css');
?>
</head>
<body>
<div class="page" id="page-home">
<div class="section" id="intro">
	<div class="inr">
		<div class="desc">
			<h1>简单，易用的企业通讯录</h1>
			<a class="signup-top" href="loginpage">管理通讯录</a>
		</div>
		<div class="video-wrapper" title="点击播放 Tower  的介绍视频">
<?php
echo $this->Html->image('video-preview.png',array("width"=>"565","height"=>"384"));
?>		</div>
	</div>
</div>


<div class="section" id="signup">
	<div class="inr">
		<h3>完全免费，现在就注册</h3>

			<div class="signup-form">
		<form class="form" action="register" method="post" data-remote="true" novalidate="">
			<div class="form-item">
				<div class="form-field">
					<input class="team-name" autocomplete="off" name="data[user][company]" type="text" placeholder="公司或团队的名称" data-validate="required;length:1,255" data-validate-msg="请填写团队或者公司的名称">
				</div>
			</div>
			<div class="form-item">
				<div class="form-field">
					<input class="email" autocomplete="off" name="data[user][username]" type="text" placeholder="填写你的邮箱" data-validate="required;email" data-validate-msg="请填写你的邮箱地址">
				</div>
			</div>
			<div class="form-item">
				<div class="form-field">
					<input class="password" autocomplete="off" name="data[user][password]" type="password" placeholder="设置你的密码" data-validate="required;length:6" data-validate-msg="请设置安全的登录密码；至少6位">
				</div>
			</div>
			<div class="form-buttons">
				<button class="btn btn-submit" type="submit" data-disable-with="正在注册...">免费注册</button>
			</div>
		</form>
	</div>
</body>
</html>
