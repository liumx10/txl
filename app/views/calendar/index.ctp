<head>
	<title>日程安排</title>
</head>
<body onload = "create_select()">
<?php echo $this->Html->css('framework7.min');
	echo $this->Html->css('mycss');
	echo $this->Html->css('calendar');
?>
	<div class="views">
		<div class="view view-main">
			<div class="pages">
				<div class="page navbar-fixed" data-page="index">
					<div class="navbar">
						<div class="navbar-inner">
							<div class="left">
								<a href="../home/home" class="external">
									<span class="icon icon-left"></span>
								</a>
							</div>
							<div class="right">
								<a href="#" data-popup="#create" class="link open-popup">
									<span class="icon icon-plus"></span>
								</a>
							</div>
						</div>
					</div>
					<div class="page-content">
						<?php foreach($days as $day=>$memos): ?>
						<div class="content-block-title"> 
							<?php echo $day; ?>
						</div>

						<div class="list-block accordion-list" id="memorandum">
							<ul>
								<?php foreach($memos as $memo): ?>
								<li class="accordion-item">
								<a href="#" class="item-link item-content">
									<div class="item-inner">
										<div class="item-title">
											<?php $time = $memo['Calendar']['time'];
											echo date('H:i:s', strtotime($time)).' '.$memo['Calendar']['place']; ?>
										</div>
									</div>
								</a>
								<div class="accordion-item-content">
									<div class='content-block'>	
										<?php echo $memo['Calendar']['memo']; ?>
									</div>
								</div>
								</li>
								<?php endforeach; ?>
							</ul>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>	
	</div>

	<div class="popup" id="create">
		<div class="view view-popup navbar-fixed">
			<div class="navbar">
				<div class="navbar-inner">
					<div class="left"></div>
					<div class="center sliding">新建</div>
					<div class="right">
						<a href="#" class="link close-popup">
							取消
						</a>
					</div>
				</div>
			</div>
			<div class="pages">
				<div class="page">
					<div class="page-content">
						<form action="save_info" method="POST" id='create_memo' class="list-block ajax-submit">
							<ul>
								<li>
									<div class="item-content">
										<div class="item-inner">
											<div class="item-title label">日期</div>
											<div class="ios-style" style="display:none">
												<input type="date" name="data[Calendar][date]" value="2014-7-31" />
											</div>
											<div class="android-style item-input" id="date_input">
											</div>
										</div>
									</div>
								</li>
								<li>
									<div class="item-content">
										<div class="item-inner">
											<div class="item-title label">时间</div>
											<div class="item-input">
												<select id="select_h" name='data[Calendar][hour]'>
												</select>
												<select id="select_m" name='data[Calendar][minute]'>
												</select>
											</div>
										</div>
									</div>
								</li>
								<li>
									<div class="item-content">
										<div class="item-inner">
											<div class="item-title label">地点</div>
											<div class="item-input">
												<input type="text" name='data[Calendar][place]' placeholder="地点">
											</div>
										</div>
									</div>
								</li>
								<li>
									<div class="item-content">
										<div class="item-inner">
											<div class="item-title label">事件</div>
											<div class="item-input">
												<textarea name='data[Calendar][memo]' placeholder="备忘录"></textarea>
											</div>
										</div>
									</div>
								</li>
								<li>
									<div class="item-content">
										<div class="item-inner">
											<div class="item-input">
													<input type="submit" class="button" value="提交">
											</div>
										</div>
									</div>
								</li>
							</ul>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php echo $this->Html->script('framework7.min');
		  echo $this->Html->script('my-app.js');
		  echo $this->Html->script('calendar.js');

	?>
</body>

