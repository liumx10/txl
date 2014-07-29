var destination = 1;
function clickDepartment(id) {
	$('#active').val(id);
	actid = id;
	dataStr = {'data[company][id]' : id}; 
	$.ajax({type:"POST",
			url:"getCEO",
			data:dataStr,
			success:function(data,textStatus){
			uiContacts(data);
			}
			});
	$('.groupName').each( function(index){
			if($(this).val()==actid) {
				$(this).addClass('active');
			}
			else {
				$(this).removeClass('active');
			}
			});
}
function selectAll() {
	$('.cks').prop('checked', $('#selectA').prop('checked'));
}
$(function(){
		//render page and bind events
		$('#newDepText').blur(function(){
			newDepartment();
		});
		$.ajax({type:"POST",
			url:"getCompany",
			data:'com',
			success:function(data,textStatus){
			dataObject = JSON.parse(data);
			departments = dataObject['dep'];
			$('#comid').val(departments['0'].id);
			$('#comname').val(departments['0'].name);
			uiDepartment(data);
			}
			});
		setTimeout(function(){
		$('#tree').fancytree({
			source:[{title:$('#comname').val(), key:$('#comid').val(),folder:true,lazy:true}],
			lazyLoad: function(event,data) {
				var node = data.node;
				data.result = {
					url:"getDir",
					data:{key: node.key}
				}
			},
			activate: function(event,data){
				var node = data.node;
				if(!node.folder)
					destination = node.key;
			}
			});
		},1000);
});

function newContact() {
	uiSingleContact();
}
function rmContacts() {
	$('.cks').each(function(index){
			if(this.checked) {
				var trnode = this.parentNode.parentNode;
				var id = trnode.children[0].value;
				sendDelId(trnode, id);
			}
			});
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
	$('.be_submit').each(function(index){
			var infos = this.children;
			var datastr = {};
			datastr["data[Employee][id]"] = infos[0].value;
			datastr["data[Employee][name]"] = infos[2].innerHTML;
			datastr["data[Employee][position]"] = infos[3].innerHTML;
			datastr["data[Employee][tel]"] = infos[4].innerHTML;
			datastr["data[Employee][wechat]"] = infos[5].innerHTML;
			datastr["data[Employee][email]"] = infos[6].innerHTML;
			if(this.className.indexOf("register") < 0)
				sendEdit(datastr);
			else
				sendReg(this,datastr);
			$(this).removeClass('be_submit');
			});
}
function sendReg(trNode,dataStr) {
	dataStr["data[Employee][dep_id]"] = $('#active').val();
	$.ajax({type:"POST",
			url:"register",
			data:dataStr,
			success:function(data,textStatus){
			trNode.children[0].value = data;
			$(trNode).removeClass("register");
			uisuccess();
			}});
}
function sendEdit(dataStr) {
	$.ajax({type:"POST",
			url:"editInfo",
			data:dataStr,
			success:function(data,textStatus){
			uisuccess();
			}
			});
}
function newDepartment() {
	$('#newDepDiv').slideUp();
	DepName = $("#newDepText").val();
	actid = $("#active").val();
	if(DepName) {
		datastr = {
			'data[department][name]':DepName,
			'data[department][id]':actid
		};
		$.ajax({type:"POST",
				url:"regDepartment",
				data:datastr,
				success:function(data,textStatus){
				uiSingleDepartment(data, DepName, actid);
				}});
		$("#newDepText").val('');
	}
}
function enDepartment(pid,aid) {
	datastr = {'data[Department][pid]':pid,'data[Department][aid]':aid};
	$.ajax({type:"POST",
			url:"childDepartment",
			data:datastr,
			success:function(data,textStatus){
			uiDepartment(data);
			}
			});
}
function rmDepartment() {
	id = $("#active").val();
	dataStr ={
		'data[Department][id]':id
	}
	$.ajax({type:"POST",
			url:"delDepartment",
			data:dataStr,
			success:function(data,textStatus){
			if(data) {
				$('.groupName').each(function(index){
					if(this.value == id)
						$(this).hide('slow',function(){$(this).remove();});
				});
				if($('.groupName')[0])
					$('.groupName').children()[0].click();
			}
			}});

}
function moveBack() {
	pid = $('#parent').val();
	datastr = {'data[Department][pid]':pid};
	$.ajax({type:"POST",
			url:"backDepartment",
			data:datastr,
			success:function(data,textStatus){
			uiDepartment(data);
			}
			});
}
function mail() {
	ids = [];
	$('.cks').each(function(index){
			if(this.checked) {
				var trnode = this.parentNode.parentNode;
				var id = trnode.children[0].value;
				ids.push(id);
				}});
	sendMail(ids);
}
function sendMail(ids) {
	idsStr = JSON.stringify(ids);
	info = $('#infotext').val();
	dataStr = {
		'data[mail][ids]':idsStr,
		'data[mail][info]':info
	};
	$.ajax({type:"POST",
			url:"/weixin/send_notice",
			data:dataStr,
			success:function(data,textStatus){
			console.log(data);
			}
			});
}
function print() {
	//printProfile
	ids = [];
	$('.cks').each(function(index){
			if(this.checked) {
				var trnode = this.parentNode.parentNode;
				ids.push(trnode.children[0].value);
			}
			});
	$('#printer').attr('href','printProfile?ids=' + JSON.stringify(ids));
}
function move() {
	destination;
	ids = [];
	$('.cks').each(function(index){
			if(this.checked) {
				var trnode = this.parentNode.parentNode;
				var id = trnode.children[0].value;
				ids.push(id);
			}
			});
	dataStr = {'data[job][ids]':JSON.stringify(ids),'data[job][des]':destination};
	$.ajax({type:"POST",
			url:"additionalJob",
			data:dataStr,
			success:function(data,textStatus){
			console.log(data);
			}
			});
}

