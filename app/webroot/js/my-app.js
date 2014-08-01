var isMobile = {
    Android: function() {
        return /Android/i.test(navigator.userAgent);
    },
    BlackBerry: function() {
        return /BlackBerry/i.test(navigator.userAgent);
    },
    iOS: function() {
        return /iPhone|iPad|iPod/i.test(navigator.userAgent);
    },
    Windows: function() {
        return /IEMobile/i.test(navigator.userAgent);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Windows());
    }
};

var loadImage = function loadImage(){
	if (document.getElementById('load_image').style.display == 'none'){
		$('#load_image').slideDown();
	}else{
		$('#load_image').slideUp();
	}
}

var myApp = new Framework7({
modalButtonOk: '确定',
modalButtonCancel: '取消'
		});

var $$ = Framework7.$;

var mainView = myApp.addView('.view-main', 
		{dynamicNavbar: true,
		});


$$('#identify_test').on('click', function(){
	myApp.modal({
		title:	'绑定',
		text:	'输入手机号和验证码',
		afterText:	'<input type="text" id="modal-username" placeholder="手机号码" class="modal-text-input modal-text-input-double">' +
					'<input type="text" id="modal-password" placeholder="验证码" class="modal-text-input modal-text-input-double">',
		buttons: [
		{
			text:'取消'
		},
		{
			text:'确认',
			bold: true,
			onClick: function(){
				username = document.getElementById('modal-username').value;
				password = document.getElementById('modal-password').value;
				var datastr = {"data[Employee][tel]": username,
							   "data[Employee][verf]": password};
				$.ajax({
					method:'post',
					url:'verf',
					data: datastr,
					success: function(data, status){
						if (data == true){
							myApp.alert('绑定成功', '提示', function(){
								window.location.href = "../home/home";
								});
						}else{
							myApp.alert('绑定失败', '提示');
						}
					}
				});
			}
		},]
	});
});
var ajaxFileUpload = function ajaxFileUpload() {
  $.ajaxFileUpload
  (
      {
          url: $('#load_image_url').val(), //用于文件上传的服务器端请求地址
          type: 'post',
          data: { Id: '123', name: 'lunis' }, //此参数非常严谨，写错一个引号都不行
          secureuri: false, //一般设置为false
          fileElementId: 'fileField', //文件上传空间的id属性  <input type="file" id="file" name="file" />
          dataType: 'json', //返回值类型 一般设置为json
          success: function (data, status)  //服务器成功响应处理函数
          {
              alert('上传成功');
          },
          error: function (data, status, e)//服务器响应失败处理函数
          {
              alert(e);
          }
      }
  )
  $('#load_image').slideUp();
  return true;
};

var edit_submit = function edit_submit(){
	var datastr = {};
	datastr['data[Employee][tel]'] = $('#tel').val();
	datastr['data[Employee][wechat]'] = $('#wechat').val();
	datastr['data[Employee][email]'] = $('#email').val();
	$.ajax({
		url:$('#edit_url').val(),
		type:'post',
		data: datastr,
		success:function(data, status){
			alert('提交成功');
		},
		error: function(data, status){

		}
	});
};

var showtable = function showtable(tabnum){
	myApp.showTab(tabnum);
	alert(tabnum);
};

var create_select = function create_select(){
	for (var i=0; i<24; i++){
		option = $("<option value='"+i+"'>"+i+"时</option>");
		$('#select_h').append(option);
	}
	for (var i=0; i<60; i++){
		option = $("<option value='"+i+"'>"+i+"分</option>");
		$('#select_m').append(option);
	}
	
	if (isMobile.iOS()){
		$(".ios-style").slideDown();	
	}else{
		select_y = $('<select name="data[Calendar][year]" style="width:35%"></select>');
		var mydate = new Date();
		for (var i=2000; i<2020; i++){
			if (mydate.getFullYear() == i){
				option = $('<option value='+i+' selected>'+i+'年</option>');
			}else{
				option = $('<option value='+i+'>'+i+'年</option>');
			}
			select_y.append(option);
		}
		
		select_m = $('<select name="data[Calendar][month]"></select>');
		for (var i=1; i<13; i++){
			if (mydate.getMonth() == i-1){
				option = $('<option value='+i+' selected>' + i+'月</option>');
			}else{
				option = $('<option value='+i+'>'+i+'月</option>');
			}
			select_m.append(option);
		}

		select_d = $('<select name="data[Calendar][day]"></select>');
		for (var i=1; i<32; i++){
			if (mydate.getDate() == i){
				option = $('<option value=' + i +' selected>' + i + '日</option>');
			}else{
				option = $('<option value=' + i + '>' + i +'日</option>');
			}
			select_d.append(option);
		}

		$('#date_input').append(select_y);
		$("#date_input").append(select_m);
		$('#date_input').append(select_d);
	}

};

$$('#create_memo').on('submitted', function (e) {
	myApp.alert('创建成功','提示', function(e){
		window.location.reload();
	});
});

