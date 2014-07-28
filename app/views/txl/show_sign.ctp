<div class="navbar">
	<div class="navbar-inner">
	</div>
</div>

<div class="page no-navbar">
	<div class="page-content toolbar-fixed">
		<div class="list-block media-list">
			<ul>
				<?php foreach($signs as $sign): ?>
					<li>
						<a class="external" 
						   	href=<?php echo $this->Html->url(array(
								"controller"=>'txl', 'action'=>'show_map', 
								 $sign['Sign']['latitude'], $sign['Sign']['longitude'], 
								 urlencode($sign['Sign']['address']), $sign['Sign']['id']));
						?>>
							<div class="item-inner">
								<div class="item-title-row">
									<?php echo $sign['Sign']['time']; ?>
								</div>
								<div class="subtitle">
									<?php echo $sign['Sign']['address'] ?>
								</div>
							</div>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
	<div class="toolbar">
		<div class="toolbar-inner">
			<a class="item-link back">
				<span class="icon icon-left"></span>
			</a>
		</div>
	</div>
</div>