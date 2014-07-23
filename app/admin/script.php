<script type="text/javascript">
$(function(){
	//$('.ieditable').editable();
	var pagewidth = $(window).width();
	pagewidth -= 450;
	$('#actionsContainer').width(pagewidth);
	$('#createGroupText').blur(function(){
		newDepartment();
	});
});
function selectAll() {
	$('.cks').prop('checked',$('#selectA').prop('checked'));
}
function showMenu(id) {
	str = '#menu' + id;
	if($(str).css('display') == 'none') {
		$('.menu').slideUp();
		$(str).slideDown();
	}
	else {
		$(str).slideUp();
	}
}
function del() {
	var cks = document.getElementsByClassName('cks');
	for(var i = 0; i < cks.length; i++) {
		if(cks[i].checked) {
			var trnode = cks[i].parentNode.parentNode;
			var id = trnode.children[0].value;
			sendDelId(trnode,id);
		}
	}
}
function sendDelId(trnode,id) {
	datastr = {'data[Employee][id]' : id};
	$.ajax({type:"POST",
		url:"delEmployee",
		data:datastr,
		success:function(data,textStatus){
			if(data) {
				trnode.parentNode.removeChild(trnode);
			}
		}
	});
}
function newEmployee() {
	trStr = "\
		<tr class='register'>\
		<input type='hidden' value='none'>\
		<td><input type='checkbox' class='cks'></td>\
		<td contenteditable='true' class='ieditable'>xxx</td>\
		<td contenteditable='true' class='ieditable'>xxxxx</td>\
		<td contenteditable='true' class='ieditable'>xxxxxxxxxx</td>\
		<td contenteditable='true' class='ieditable'>xxxx</td>\
		<td contenteditable='true' class='ieditable'>xxx@xx.com</td>\
		</tr>";
	$("#contacts").append(trStr);
	attach();
}
function attach() {
	var editors = document.getElementsByClassName("ieditable");
	for(var i = 0; i < editors.length; i++) {
		var editor = editors[i];
		editor.addEventListener("input",function(){
			var tr = this.parentNode;
			if(tr.className.indexOf("be_submit") < 0) {
				tr.className = tr.className + " be_submit";
			}
		});
	}
}
function newDepartment() {
	gName = $("#createGroupText").val();
	if(gName) {
		$('#createGroupContainer').slideUp();
		oldHeight = $('#groupsPane').height(); 
		datastr = {
			'data[com][name]':gName,
				'data[com][id]':$('#root').val()
		};
		$.ajax({type:"POST",
			url:"regDepartment",
			data:datastr,
			success:function(data,textStatus){
				if(data) {
					$('#groupsPane').height(oldHeight + 45); 
					headStr = '<div class="groupName" id="%d" onclick="showMenu(this.id);">%s</div>';
					departmentStr = sprintf(headStr,data,gName);
					departmentStr += sprintf('<div class="menu" id="menu%d">',data);
					departmentStr += '<ul>';
					departmentStr += "\
						<li style='display:inline;margin:0px 0px 0px 20px;'>\
						<a onclick='return false;' href='#' >删除</a>\
						</li>\
						<li style='display:inline;margin:0px 0px 0px 20px;'>\
						<a onclick='kiddo(this.parentNode.parentNode.parentNode.id);return false;' href='#' >进入</a>\
						</li>\
						<li style='display:inline;margin:0px 0px 0px 20px;'>\
						<a onclick='return false;' href='#' >重命名</a>\
						</li>";
					departmentStr += '</ul>';
					departmentStr += '</div>';
					$('#groupsPane').append(departmentStr);
				}
			}
		});
		$("#createGroupText").val('');
	}
	else {
		$('#createGroupContainer').slideUp();
	}
}
function apply() {
	var submits = document.getElementsByClassName("be_submit");
	for(var i = 0; i < submits.length; i++) {
		console.log('things happend');
		var infos = submits[i].children;
		var datastr = {};
		datastr["data[Employee][id]"] = infos[0].value;
		datastr["data[Employee][name]"] = infos[2].innerHTML;
		datastr["data[Employee][position]"] = infos[3].innerHTML;
		datastr["data[Employee][tel]"] = infos[4].innerHTML;
		datastr["data[Employee][wechat]"] = infos[5].innerHTML;
		datastr["data[Employee][email]"] = infos[6].innerHTML;
		if(submits[i].className.indexOf("register") < 0) {
			sendEdit(datastr);
		}
		else {
			sendReg(submits[i],datastr);
		}
	}
	$('.be_submit').removeClass('be_submit');
}

function sendEdit(dataStr) {
	$.ajax({type:"POST",
		url:"editinfo",
		data:dataStr,
		success:function(data,textStatus){
			//TODO
			//tel user succeed
		}
	});
}
function sendReg(trNode,dataStr) {
	selected = document.getElementsByClassName('groupName');
	if(selected && selected.length <= 0) {
		alert("nimei!! add department first!!");
		return;
	}
	dataStr["data[Employee][dep_id]"] = selected[0].id;
	console.log(dataStr);
	$.ajax({type:"POST",
		url:"register",
		data:dataStr,
		success:function(data,textStatus){
			trNode.children[0].value = data;
		}
	});
}
function kiddo(id) {
	id = id.slice(4);
	datastr = {'data[Department][id]':id};
	$.ajax({type:"POST",
		url:"childDepartment",
		data:datastr,
		success:function(data,textStatus){
			dataobject = JSON.parse(data);
			children = dataobject['dep'];
			employee = dataobject['emp'];
			panel = $('#groupsPane');
			panel.empty();
			$('#groupsPane').height(children.length*45 + 50); 
			rootStr = '<input id = "root" type="hidden" value ="%d">';
			rootStr = sprintf(rootStr,id);
			$('#groupsPane').append(rootStr);
			for(var i = 0; i < children.length; i++) {
				headStr = '<div class="groupName" id="%d" onclick="showMenu(this.id);">%s</div>';
				departmentStr = sprintf(headStr,children[i].id,children[i].name);
				departmentStr += sprintf('<div class="menu" id="menu%d">',children[i].id);
				departmentStr += '<ul>';
				departmentStr += "\
					<li style='display:inline;margin:0px 0px 0px 20px;'>\
					<a onclick='return false;' href='#' >删除</a>\
					</li>\
					<li style='display:inline;margin:0px 0px 0px 20px;'>\
					<a onclick='kiddo(this.parentNode.parentNode.parentNode.id);return false;' href='#' >进入</a>\
					</li>\
					<li style='display:inline;margin:0px 0px 0px 20px;'>\
					<a onclick='return false;' href='#' >重命名</a>\
					</li>";
				departmentStr += '</ul>';
				departmentStr += '</div>';
				$('#groupsPane').append(departmentStr);
			}
		}
	//TODO after show department show employee in new department
	});
}
function rmDepartment(id) {
	id = id.slice(4);
	dataStr ={
		'data[Department][id]':id
	}
	$.ajax({type:"POST",
		url:"delDepartment",
		data:dataStr,
		success:function(data,textStatus){
			//TODO remove from page
			console.log(data);
		}
	});
	
}
function mail() {
	alert("mail...");
}
function move() {
	alert("move to...");
}
function print() {
	alert("print to file");
}
</script>
