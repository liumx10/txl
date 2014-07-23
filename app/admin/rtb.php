<div id="rightContainer">
	<table cellspacing="0" cellpadding="0">
		<tbody>
			<tr>
				<td id="actionsTd"><div id="actionsContainer" class="rounded">
						<div id="upperActions">
								<table cellpadding="0" cellspacing="0"><tbody><tr>
<td> 
					<input type="text" name="query" id="search_query" placeholder="搜索所有联系人"> 
</td>
<td> 
<!--some function here-->
</td>
								</tr></tbody></table>
							<div class="clear"></div>
						</div>
						<div id="contactActions">
							<ul id="bulkActions">
								<li class="action" id="selections">
								<input type="checkbox" id="selectA" onclick="selectAll();"> 
								</li>
								<li class="action">
								<a class="borderLink" onclick="mail();return false;" href="#" >发送通知</a>
								</li>
								<li class="action">
								<a class="borderLink" onclick="move();return false;" href="#" >添加至</a>
								</li>
								<li class="action">
								<a class="borderLink" onclick="del();return false;" href="#" >删除</a>
								<li class="action">
								<a class="borderLink" onclick="print();return false;" href="#" >打印</a>
								</li>
								<li class="action">
								<a class="borderLink" onclick="apply();return false;" href="#" >提交修改</a>
								</li>
							</ul>
							<div class="clear"></div>
						</div>
					</div>
			</td></tr>
			<tr><td>
					<div id="contactsContainer">
						<table class="table" style="margin-left:32px;">
							<tbody id="contacts">
								<tr><td><input type="checkbox" style="display:none;"></td>
									<td>姓名</td><td>职位</td><td>手机</td><td>微信</td><td>电子邮件</td><td></td></tr>
								<?php
								foreach($em_info as $value) {
								?>
								<tr class="update">
								<input type="hidden" value="<?php echo $value["id"];?>">
									<td><input type="checkbox" class="cks"></td>
									<td contenteditable="true" class="ieditable"><?php echo $value["name"];?></td>
									<td contenteditable="true" class="ieditable"><?php echo $value["position"];?></td>
									<td contenteditable="true" class="ieditable"><?php echo $value["tel"];?></td>
									<td contenteditable="true" class="ieditable"><?php echo $value["wechat"];?></td>
									<td contenteditable="true" class="ieditable"><?php echo $value["email"];?></td>
								</tr>
								<?php
								}
								?>
							</tbody>
						</table>
					</div>
			</td></tr>
</tbody></table></div>
