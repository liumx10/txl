function showMenu(id,symbol) {
	if(!e) var e = window.event;
	e.cancleBubble = true;
	if(e.stopPropagation) e.stopPropagation();
	str = '#menu' + id;
	if($(str).css('display') == 'none') {
		$('.menu').slideUp();
		$(str).slideDown();
	}
	else {
		$(str).slideUp();
	}
}
function uiContacts(data) {
//remove all contacts and render from give data
	contacts = JSON.parse(data);
	panel = $('#contacts');
	panel.empty();

	headerStr = '\
		<tr><td><input type="checkbox" style="display:none;"></td>\
		<td>姓名</td><td>职位</td><td>手机</td><td>微信</td><td>电子邮件</td><td></td></tr>';
	panel.append(headerStr);
	for(var i = 0; i < contacts.length; i++) {
		conStr = '\
			<tr class="update">\
			<input type="hidden" value="%d">\
			<td><input type="checkbox" class="cks"></td>\
			<td contenteditable="true" class="ieditable">%s</td>\
			<td contenteditable="true" class="ieditable">%s</td>\
			<td contenteditable="true" class="ieditable">%s</td>\
			<td contenteditable="true" class="ieditable">%s</td>\
			<td contenteditable="true" class="ieditable">%s</td>\
			</tr>';
		conStr = sprintf(conStr, contacts[i].id,
			contacts[i].name, contacts[i].position, contacts[i].tel,
			contacts[i].wechat, contacts[i].email);
		panel.append(conStr);
	}
}

function uiDepartment(data) {
//remove all department and render from give data
//auto select first department
//data packaged into json
	dataObject = JSON.parse(data);
	departments = dataObject['dep'];
	pid = dataObject['pid'];

	panel = $('#groupsPane');
	panel.empty();
	$('#groupsPane').height(departments.length*45 + 50); 

	parentStr = '<input id = "parent" type="hidden" value ="%d">';
	parentStr = sprintf(parentStr, pid);
	panel.append(parentStr);
	for(var i = 0; i < departments.length; i++) {
		headStr = '\
				  <div onclick="select(this.id);" class="groupName" id="%d">\
				  <div onclick="showMenu(this.parentNode.id, this);" class="plus">+</div>\
				  <div class="spacer"></div>\
				  <div class="name">%s</div></div>';

		departmentStr = sprintf(headStr,departments[i].id,departments[i].name);
		departmentStr += sprintf('<div class="menu" id="menu%d">',departments[i].id);
		departmentStr += '<ul>';
		departmentStr += "\
			<li style='display:inline;margin:0px 0px 0px 20px;'>\
			<a onclick='rmDepartment(this.parentNode.parentNode.parentNode.id);return false;' href='#' >删除</a>\
			</li>\
			<li style='display:inline;margin:0px 0px 0px 20px;'>\
			<a onclick='enDepartment(this.parentNode.parentNode.parentNode.id);return false;' href='#' >进入</a>\
			</li>\
			<li style='display:inline;margin:0px 0px 0px 20px;'>\
			<a onclick='rnDepartment(this.parentNode.parentNode.parentNode.id);return false;' href='#' >重命名</a>\
			</li>";
		departmentStr += '</ul>';
		departmentStr += '</div>';
		panel.append(departmentStr);
	}
	selected = $('.groupName:first');
	if(selected.length > 0) {
		selected.addClass('selected');
	}
}

function uiSingleContact() {
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
function uiSingleDepartment(data,DepName) {
	id = data;
	oldHeight = $('#groupsPane').height(); 
	$('#groupsPane').height(oldHeight + 45); 
	headStr = '\
			  <div onclick="select(this.id);" class="groupName" id="%d">\
			  <div onclick="showMenu(this.parentNode.id, this);" class="plus">+</div>\
			  <div class="spacer"></div>\
			  <div class="name">%s</div></div>';
	departmentStr = sprintf(headStr,id,DepName);
	departmentStr += sprintf('<div class="menu" id="menu%d">',id);
	departmentStr += '<ul>';
	departmentStr += "\
					  <li style='display:inline;margin:0px 0px 0px 20px;'>\
					  <a onclick='rmDepartment(this.parentNode.parentNode.parentNode.id);return false;' href='#' >删除</a>\
					  </li>\
					  <li style='display:inline;margin:0px 0px 0px 20px;'>\
					  <a onclick='enDepartment(this.parentNode.parentNode.parentNode.id);return false;' href='#' >进入</a>\
					  </li>\
					  <li style='display:inline;margin:0px 0px 0px 20px;'>\
					  <a onclick='rnDepartment(this.parentNode.parentNode.parentNode.id);return false;' href='#' >重命名</a>\
					  </li>";
	departmentStr += '</ul>';
	departmentStr += '</div>';
	$('#groupsPane').append(departmentStr);
}
