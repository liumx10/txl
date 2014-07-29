<head>
	<title>绑定微信</title>
</head>

<?php echo $this->Html->css('framework7.min'); ?>
<style>
#first-page{
	background-image:url('../img/fp-background');
	background-size: cover;
	width:100%;
	height:100%;
}

#p1 {
	margin-top: 40px;
	margin-left:50%;
	font-size:1.5em;
}

#p2 {
	margin-left:50%;
	color:#888;
}

#p3 {
	margin-top:10%;
	margin-left:65%;
}
</style>
<body >
<div class="views">
<div class="view view-main">
<div class="page no-navbar">
	<div class="page-content" id="first-page">
		<p id="p1">微办公</p>
		<p id="p2">让办公更简单</p>
		<p id="p3"><a href="#" id="identify_test" class="login-modal">现在开始 </a></p>
	</div>
</div>
</div>
</div>
<?php echo $this->Html->script('framework7.min');
	  echo $this->Html->script('jquery-2.1.1.min');
	  echo $this->Html->script('my-app'); 
?>
</body>
