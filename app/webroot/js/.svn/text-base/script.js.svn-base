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
function selectAll() {
	$('.cks').prop('checked',$('#selectA').prop('checked'));
}
$(function(){
	//render page and bind events
	var pagewidth = $(window).width();
	pagewidth -= 450;
	$('#actionsContainer').width(pagewidth);
	$('#createGroupText').blur(function(){
		newDepartment();
	});
	attach();
	$.ajax({type:"POST",
		url:"getCompany",
		data:'com',
		success:function(data,textStatus){
		uiDepartment(data);

	//set selected and find out top employee
		comfirst = $('.groupName:first');
		if(comfirst.length > 0) {
		dataStr = {'data[company][id]':comfirst[0].id};
		$.ajax({type:"POST",
			url:"getCEO",
			data:dataStr,
			success:function(data,textStatus){
			uiContacts(data);
			}
			});
		}
		}
	});
});
function newContact() {
	uiSingleContact();
}
function rmContacts() {
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
			//remove contact from page
				trnode.parentNode.removeChild(trnode);
			}
		}
	});
}
function apply() {
	var submits = document.getElementsByClassName("be_submit");
	for(var i = 0; i < submits.length; i++) {
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
function sendReg(trNode,dataStr) {
	selected = $('.selected');
	dataStr["data[Employee][dep_id]"] = selected[0].id;
	$.ajax({type:"POST",
			url:"register",
			data:dataStr,
			success:function(data,textStatus){
			trNode.children[0].value = data;
			}});
}
function sendEdit(dataStr) {
	$.ajax({type:"POST",
			url:"editInfo",
			data:dataStr,
			success:function(data,textStatus){
			alert('change done');
			//TODO tell user apply succeed
			}
			});
}
function newDepartment() {
	DepName = $("#createGroupText").val();
	if(DepName) {
		$('#createGroupContainer').slideUp();
		datastr = {
			'data[department][name]':DepName,
			'data[department][id]':$('#parent').val()
		};
		$.ajax({type:"POST",
				url:"regDepartment",
				data:datastr,
				success:function(data,textStatus){
					uiSingleDepartment(data,DepName);
				}});
		$("#createGroupText").val('');
	}
	else {
		$('#createGroupContainer').slideUp();
	}
}
function enDepartment(id) {
	id = id.slice(4);
	datastr = {'data[Department][id]':id};
	$.ajax({type:"POST",
			url:"childDepartment",
			data:datastr,
			success:function(data,textStatus){
			uiDepartment(data);
			first = $('.groupName:first');
			if(first.length > 0) {
			dataStr = {'data[company][id]':first[0].id};
			$.ajax({type:"POST",
				url:"getCEO",
				data:dataStr,
				success:function(data,textStatus){
				uiContacts(data);
				}
				});
			}
			}
			});
}
function rmDepartment(id) {
	menuid = id;
	id = id.slice(4);
	dataStr ={
		'data[Department][id]':id
	}
	$.ajax({type:"POST",
			url:"delDepartment",
			data:dataStr,
			success:function(data,textStatus){
			if(data) {
			$('#' + id).remove();
			$('#' + menuid).remove();
			oldHeight = $('#groupsPane').height(); 
			$('#groupsPane').height(oldHeight - 45); 
			}
			}});

}
function select(id) {
	$('.groupName').removeClass('selected');
	$('#'+id).addClass('selected');
	selected = $('.selected');
	dataStr = {'data[company][id]' : selected[0].id}; 
	$.ajax({type:"POST",
			url:"getCEO",
			data:dataStr,
			success:function(data,textStatus){
			uiContacts(data);
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
