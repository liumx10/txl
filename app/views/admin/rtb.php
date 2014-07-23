<div id="rightContainer">
	<table cellspacing="0" cellpadding="0">
		<tbody>
			<tr>
				<td id="actionsTd"><div id="actionsContainer" class="rounded">
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
								<a class="borderLink" onclick="rmContacts();return false;" href="#" >删除</a>
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
							</tbody>
						</table>
					</div>
			</td></tr>
</tbody></table></div>
