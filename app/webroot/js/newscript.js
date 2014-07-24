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
function fixDiv() {
	$('#fix').css({
			'position':'fixed',
			'top': '60px'
			});
}
$(function(){
		//render page and bind events
		//$(window).scroll(fixDiv());
		$('#newDepText').blur(function(){
			newDepartment();
		});
		$.ajax({type:"POST",
			url:"getCompany",
			data:'com',
			success:function(data,textStatus){
			uiDepartment(data);
			}
			});
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
	$('#newDepDiv').slideUp();
	DepName = $("#newDepText").val();
	if(DepName) {
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
				$('.groupName').children()[0].click();
			}
			}});

}
function moveBack() {
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
da = [1,3,4,6];
info = 'hello wechat';
dataStr = {'data[mail][ids]':JSON.stringify(da),'data[mail][info]':info};
	$.ajax({type:"POST",
			url:"/weixin/send_notice",
			data:dataStr,
			success:function(data,textStatus){
			console.log(data);
			}
			});
}
function move() {
	alert("move to...");
}
function print() {
	alert("print to file");
}
