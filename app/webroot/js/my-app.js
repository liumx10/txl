var myApp = new Framework7();

var $$ = Framework7.$;

var mainView = myApp.addView('.view-main', {dynamicNavbar: true});

var loadImage = function loadImage(){
    $('#load_image').slideDown();
}

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
}

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
}

var showtable = function showtable(tabnum){
	myApp.showTab(tabnum);
	alert(tabnum);
}

var create_select = function create_select(){
	for (var i=0; i<24; i++){
		option = $("<option value='"+i+"'>"+i+"时</option>");
		$('#select_h').append(option);
	}
	for (var i=0; i<60; i++){
		option = $("<option value='"+i+"'>"+i+"分</option>");
		$('#select_m').append(option);
	}
}


