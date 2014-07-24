function uiContacts(data) {
//remove all contacts and render from give data
	contacts = JSON.parse(data);
	panel = $('#contacts');
	panel.empty();
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
	$('.ieditable').bind('input',function(){
			$(this).parent().addClass('be_submit');});
}

function uiDepartment(data) {
//remove all departments use class groupName and render from give data
	dataObject = JSON.parse(data);
	departments = dataObject['dep'];
	pid = dataObject['pid'];
	actid = dataObject['actid'];
	//set pid
	$('#parent').val(pid);
	//set departments and children
	finalstr = '';
	for(var i = 0; i < departments.length; i++) {
		chi = '';
		children = departments[i].children;//maybe empty
		for(var ci = 0; ci < children.length; ci++) {
			chi +='\
				  <li>\
				  <a href="#" onclick="clickDepartment(%d);enDepartment(%d,%d);return false;">%s</a>\
				  </li>\
				  ';
			chi = sprintf(chi,children[ci].id,departments[i].id,children[ci].id,children[ci].name);
		}
		str = '\
			  <li class="groupName" value="%d" style="display:none;">\
			  <a onclick="clickDepartment(%d);return false;" href="#" data-toggle="collapse" data-target="#%d">\
			  <i class="fa fa-fw fa-arrows-v"></i> %s<i class="fa fa-fw fa-caret-down"></i></a>\
			  <ul id="%d" class="collapse">\
			  %s\
			  </ul>\
			  </li>\
			  ';
		str = sprintf(str, departments[i].id, departments[i].id, 
				departments[i].id, departments[i].name, departments[i].id, chi);
		if(!chi) {
			str = '\
				  <li class="groupName" value="%d" style="display:none;">\
				  <a onclick="clickDepartment(%d);return false;" href="#">%s</a>\
				  </li>\
				  ';
			str = sprintf(str, departments[i].id, departments[i].id, departments[i].name);
		}
		finalstr += str;
	}
	//remove old departments
	$('.groupName').hide('slow',function(){
			$('.groupName').remove();
			$('#functional').before(finalstr);
			$('.groupName').show('slow');
			$('.groupName').each( function(index){
				if($(this).val()==actid)
					$(this).children()[0].click();
				});

			});
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
	$('.ieditable').bind('input',function(){
			$(this).parent().addClass('be_submit');});
}
function uiSingleDepartment(data,DepName) {
	id = data;
	str = '\
		  <li class="groupName" value="%d" style="display:none;">\
		  <a onclick="clickDepartment(%d);return false;" href="#">%s</a>\
		  </li>\
		  ';
	str = sprintf(str, id, id, DepName);
	$('#functional').before(str);
	$('.groupName').show('slow');
}
