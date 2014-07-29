<head>
	<title>应用中心</title>
</head>
<body>
	<div class="navbar">
	</div>
	<div class="pages">
		<div class="page no-navbar">
			<style>
			.container {margin-top:5%; height:200px; width:95%; margin-left:5%; margin-right:0;}
			.container div {display:inline; float:left; width:30%; text-align:center;}
			.container img {width:50px; height:50px;}
			</style>
			
	
			<div class="container">
				<div>
					<a href=<?php echo $this->webroot.'txl/show_group'; ?> class="external">
						<img src=<?php echo $this->webroot."img/txl"; ?> alt="" title="" />
						<p>通讯录</p>
					</a>
				</div>
				<div>
					<a href=<?php echo $this->webroot.'sign/sign'; ?> class="external">
						<img src= <?php echo $this->webroot."img/sign"; ?> alt="" title="" />
						<p>签到</p>
					</a>
				</div>
				<div>
				<a href=<?php echo $this->webroot.'calendar/index'; ?> class="external">
						<img src= <?php echo $this->webroot."img/memo"; ?> alt="" title="" />
						<p>日历</p>
					</a>
				</div>
				<div>
					<a href="#" class="external">
					<img src=<?php echo $this->webroot.'img/setting'; ?> alt="" title="" />
						<p>账号</p>
					</a>
				</div>
			</div>
		</div>
	</div>
</body>
