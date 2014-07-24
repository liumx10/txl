<script>
var init, edit, submit;
var datastr = {};
$(document).ready(function(){	
	init = function init(){
		$("#container").empty();

		var table = $("<form class='input-group'></form>");
		for (var i=0; i<24; i++){
			var tr = $('<div class="input-row" onclick="edit('+i+')"></div>');
			tr.append('<label>'+i+':00 '+'</label>');
			tr.append('<input type="text" placeholder="null" id="form'+i+'"></form>');
			table.append(tr);
		}
		$("#container").append(table);
		$("#container").show();
	}

	edit = function edit(i){
		$("#container").hide();
		$("#edit").empty();
		$("#edit").show();

		var table = $("<form class='input-group'></form>");
		var time = $('<div class="input-row"><label>时间</label><input id="time" type="text" placeholder='+i+'></form>');
		var place = $('<div class="input-row"><label>地点</label><input id="place" type="text" placeholder="null"</form>');
		var memo = $('<div class="input-row"><label>事件</label><input id="memo" type="text" placeholder="null"</form>');
		var button = $('<button class="btn btn-positive btn-block" onclick="submit()">提交</button>');
		var button2 = $('<button class="btn btn-positive btn-block" onclick="edit('+i+')">重置</button>');
		var button3 = $('<button class="btn btn-positive btn-block" onclick="cancel()">取消</button>');
		table.append(time);
		table.append(place);
		table.append(memo);
		$("#edit").append(table);
		$("#edit").append(button);
		$("#edit").append(button2);
		$("#edit").append(button3);
	}

	submit = function submit(){
		init();
		$("#edit").hide();
		datastr["data[Calendar][time]"] = $("#time").val();
		datastr["data[Calendar][place]"] = $("#place").val();
		datastr["data[Calendar][memo]"] = $("#memo").val();
		$.ajax({type:"POST", url:$("#save_info_url").val(), data:datastr,
				success: function(data, status){
				}
		});
	}

	cancel = function cancel(){
		init();
		$("#edit").hide();
	}

});
</script>

<body onload="init()" class="content">
<div id="container"></div>
<div id="edit" style="display:none">
</div>

<input id="save_info_url" value=<?php echo $this->Html->url(array('action'=>'save_info')); ?> type="hidden" />
</body>