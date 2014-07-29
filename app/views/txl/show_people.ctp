<div class="views">
	<div class="view view-main">	
		<div class="navbar">
			<div class="navbar-inner">
			</div>
		</div>
		<div class="pages toolbar-fixed">
			<div class="page no-navbar">
				<div class="page-content">
					<div class="list-block media-list">
						<div class="item-content">
	        				<div class="item-media">
	        					<img class="media-object pull-left" width=70px height=70px
	        						src=<?php echo $this->webroot."headimage/".$photoid;?>  />
	        				</div>
	        				<div class="item-inner">
					            <div class="item-title-row">
					              <div class="item-title"><?php echo $Info['name']; ?></div>
					            </div>
					            <div class="item-subtitle"><?php echo $Info['position']; ?></div>
					        </div>
						</div>	
						<br />
						<ul class="table-view">
							<li class="table-view-cell media">
								<div class="media-body font_default">
									微信号码:
									<label class="margin_content font_p"><?php echo $Info['wechat'];?> </label>
								</div>
							</li>
							<li class="table-view-cell media" style="padding-right: 10px;">
								<div class="media-body font_default">
									手机号码:
									<label class="margin_content font_p"><?php echo $Info['tel'];?> </label>

									
									<a class="external"  href=<?php echo "tel:".$Info['tel']; ?> style="margin-left:20px;">
										<img  src=<?php echo $this->webroot."img/telphone.png"?> height="20px" width="40px"
												style="padding-left:0px;"/>
									</a>
									<a class="external"  href=<?php echo "sms:".$Info['tel']; ?>>
										<img  src=<?php echo $this->webroot."img/message.png"?> height="20px" width="40px"
												style="padding-left:0px;"/>
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
					</div>

				</div>
				<div class="toolbar tabbar tabbar-labels">
					<div class="toolbar-inner">
					  
				      <a class="item-link back" >
				          <span class="icon icon-left"></span>
					  <span class="tabbar-label">Back</span>
				      </a>

				      <!-- Search people by name -->
				      <a class="item-link" href=<?php echo $this->Html->url(
				              array( "controller" => "txl",
				                     "action" => "search_people_by_name", 
				                     $companyid));
				              ?>
				      >
				          <span class="icon icon-search"></span>
					  <span class="tabbar-label">Search</span>			      </a>
					
				      <a class="item-link" href=<?php echo $this->Html->url(
				              array( "controller" => "home",
				                      "action" => "home"));   
				                      ?>
				      >
				          <span class="icon icon-home"></span>
					  <span class="tabbar-label">Home</span>			    
				      </a>
				      

				      <!-- Edit personal information or come back to personal home-->
				      <?php if ($is_my_home) { ?>
						<a class="item-link" href=<?php 
										echo $this->Html->url(array('action'=>'edit'));?>
							>
							  <span class="icon icon-compose"></span>
							  <span class="tabbar-label">Edit</span>					
						</a>
				      <?php }else{ ?>
				      		<a class="item-link" href=<?php 
					      			echo $this->Html->url(array('action'=>'show_people', $myid));?>
							>
							  <span class="icon icon-person"></span>
  							  <span class="tabbar-label">Myself</span
>						</a>
					  <?php } ?>

				    </div>
				</div>
	
			</div>
		</div>

	</div>
</div>
