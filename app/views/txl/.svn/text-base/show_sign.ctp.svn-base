<div class="content">
	<ul class="table-view">
		<?php foreach($signs as $sign): ?>
			<li class="table-view-cell">
				<a class="navigate-right" href=<?php echo $this->Html->url(array(
						"controller"=>'txl', 'action'=>'show_map', 
						 $sign['Sign']['latitude'], $sign['Sign']['longitude'], 
						 urlencode($sign['Sign']['address']), $sign['Sign']['id']));
				?>>
					<?php echo $sign['Sign']['time']; ?>
					<p>
						<?php echo $sign['Sign']['address'] ?>
					</p>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
</div>


<nav class="bar bar-tab bar-footer">
  	<a class="tab-item" onclick="window.history.back()">
  		<span class="icon icon-left"></span>
  		<span class="tab-label">Back</span>
  	</a>
</nav>