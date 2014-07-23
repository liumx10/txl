<table class="contactListView" cellpadding="0" cellspacing="0"><tbody><tr>
			<td id="groupsColumn">
			<div id="groupsPane" class="" style="height: <?php echo count($com_info)*45 + 50; ?>px;">
<?php
$root = true;
foreach($com_info as $value) {
	if($root) {
		$str = '<input id = "root" type="hidden" value ="1">';
		echo $str;
	}
	?>
		<div class="groupName" id="<?php echo $value['id']; ?>" onclick="showMenu(this.id);"><?php echo $value['name']; ?></div>
		<div class='menu' id ="menu<?php echo $value['id']; ?>">
<ul>
	<li style="display:inline;margin:0px 0px 0px 20px;">
<a onclick="rmDepartment(this.parentNode.parentNode.parentNode.id);return false;" href="#" >删除</a>
	</li>
	<li style="display:inline;margin:0px 0px 0px 20px;"> 
<a onclick="kiddo(this.parentNode.parentNode.parentNode.id);return false;" href="#" >进入</a>
	</li>
	<li style="display:inline;margin:0px 0px 0px 20px;"> 
<a onclick="return false;" href="#" >重命名</a>
	</li>
</ur>
			</div>
<?php
		$root = false;
}
?>
				</div>
				<div id="createButtons">
					<div id="createGroupContainer" style="display:none">
						<div style="padding:2px 0px 2px 10px;">命名组:</div>
						<input id="createGroupText" type="text">
					</div>
					<div id="addContactLink" class="createButton" onclick="newEmployee();"> 添加员工 </div>
					<div id="addGroupLink" class="createButton" 
onclick="$('#createGroupContainer').slideDown();$('#createGroupText').focus();"> 添加部门 </div>
					<div class="clear"></div>
				</div>
			</td>
			<td>
<?php
include 'rtb.php';
?>
			</td>
</tr></tbody></table>
