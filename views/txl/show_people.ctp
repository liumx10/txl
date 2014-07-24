<ul class="table-view">

	<li class="table-view-cell media">
		<img class="media-object pull-left" src=<?php echo $this->webroot."headimage/".$photoid;?> width=70px height=70px />
		<div class="media-body font_name margin_name">
			<?php echo $Info['name']; ?>
			<p class="font_p"><?php echo $Info['position']; ?> </p>
		</div>
	</li>

	<li class="table-view-cell media">
		<div class="media-body font_default">
			部门信息:
			<label class="margin_content font_p"><?php echo $Info['position'];?> </label>
		</div>	
	</li>

	<li class="table-view-cell media">
		<div class="media-body font_default">
			微信号码:
			<label class="margin_content font_p"><?php echo $Info['wechat'];?> </label>
		</div>
	</li>
	<li class="table-view-cell media">
		<div class="media-body font_default">
			手机号码:
			<label class="margin_content font_p"><?php echo $Info['tel'];?> </label>
			<a href=<?php echo "tel:".$Info['tel']; ?>>
				<img class="pull-right" src=<?php echo $this->webroot."img/setting"?> height="20px" width="20px"/>
			</a>
			<a href=<?php echo "sms:".$Info['tel']; ?>>
				<img class="pull-right" src=<?php echo $this->webroot."img/setting"?> height="20px" width="20px"/>
			</a>

		</div>
	</li>
	<li class="table-view-cell media">
		<div class="media-body font_default">
			电子邮箱:
			<label class="margin_content font_p"><?php echo $Info['email'];?> </label>
		</div>
	</li>
	<li class="table-view-cell media">
		<a class"navigate-right" href=<?php echo $this->Html->url(array(
						'controller'=>'txl', 'action'=>'show_sign', $Info['id'])); ?>>
			<div class="media-body font_default">
				签到记录
			</div>
			<span class="navigate-right"> </span>
		</a>
	</li>
</ul>


<nav class="bar bar-tab bar-footer">
	  
      <a class="tab-item" onclick="window.history.back()">
          <span class="icon icon-left"></span>
          <span class="tab-label">Back</span>
      </a>

      <!-- Search people by name -->
      <a class="tab-item" href=<?php echo $this->Html->url(
              array( "controller" => "txl",
                     "action" => "search_people_by_name", 
                     $companyid));
              ?>
      >
          <span class="icon icon-search"></span>
          <span class="tab-label">Search</span>
      </a>
	
      <a class="tab-item" href=<?php echo $this->Html->url(
              array( "controller" => "home",
                      "action" => "home"));   
                      ?>
      >
          <span class="icon icon-home"></span>
          <span class="tab-label">Home</span>
      </a>
      

      <!-- Edit personal information or come back to personal home-->
      <?php if ($is_my_home) { ?>
			<a class="tab-item" href=<?php 
						echo $this->Html->url(array('action'=>'edit'));?>
			>
			  <span class="icon icon-compose"></span>
			  <span class="tab-label">Edit</span>
			</a>
      <?php }else{ ?>
      		<a class="tab-item" href=<?php 
	      			echo $this->Html->url(array('action'=>'show_people', $myid));?>
			>
			  <span class="icon icon-person"></span>
			  <span class="tab-label">Myself</span>
			</a>
	  <?php } ?>

	  <a class="tab-item" href=<?php echo $this->Html->url(
              array( "controller" => "txl",
                     "action" => "show_group"));
              ?>
      >
          <span class="icon icon-pages"></span>
          <span class="tab-label">Txl</span>
      </a>

</nav>
