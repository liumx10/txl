<script>
	var edit, mysubmit, cancel, init, create_select, get_days, create_calendar;
	var datastr = {};
	var days = new Array(31, 28, 31, 30, 31, 30, 31, 31,30, 31, 30, 31);

	var aim_y, aim_m, aim_d;
	var weekday, weeks, val;
	var year, month, day = null;
	var format_date = new Date();
	var memo_num = 0;
	$(document).ready(function(){
		year = $('#year').val();
		month = $('#month').val();
		day = $('#day').val();

		edit = function edit(){
			if (document.getElementById('create_memo').style.display == 'none'){
				$("#create_memo").slideDown();
			}
			else{
				$("#create_memo").slideUp();
			}
		}

		cancel = function cancel(){
			$("#memo").hide();
			$("#calendar").slideDown(500);
		}

		mysubmit = function mysubmit(){
			$("#memo").hide();
			$("#calendar").slideDown(500);

			datastr["data[Calendar][year]"] = $("#year_select").find(":selected").val();
			datastr["data[Calendar][month]"] = $("#month_select").find(":selected").val();
			datastr["data[Calendar][day]"] = aim_d;
			datastr["data[Calendar][hour]"] = $("#edit_hour").val();
			datastr["data[Calendar][minute]"] = $("#edit_minute").val();
			datastr["data[Calendar][place]"] = $("#edit_place").val();
			datastr["data[Calendar][memo]"] = $("#edit_memo").val();
			$.ajax({type:"POST", url:$("#save_info_url").val(), data:datastr,
					success: function(data, status){
					}
			});
		}

		init = function init(){
			create_select();
			create_calendar();
		}

		create_select = function create_select(){
			select_m = $("<select onchange='create_calendar()'></select>");
			select_m.value = $('#month').val();
			for (var i=1; i<13; i++){
				if (i == $('#month').val()){
					option = $("<option value='"+i+"' selected>"+i+"月</option>");	
				}else{
					option = $("<option value='"+i+"'>"+i+"月</option>");
				}
				select_m.append(option);
			}
			$("#month_select").append(select_m);

			select_y = $("<select onchange='create_calendar()' width='20%'></select>");
			select_y.value = $("#year").val();
			for (var i=1900; i<2100; i++){
				if (i == $('#year').val()){
					option = $("<option value='"+i+"' selected>"+i+"年</option>");	
				}else{
					option = $("<option value='"+i+"'>"+i+"年</option>");
				}
				select_y.append(option);	
			}
			$("#year_select").append(select_y);

			for (var i=0; i<24; i++){
				option=$("<option value='"+i+"'>"+i+"时</option>");
				$("#edit_hour").append(option);
			}
			for (var i=0; i<60; i++){
				option=$("<option value='"+i+"'>"+i+"分</option>");
				$("#edit_minute").append(option);
			}
		}

		get_days = function get_days(year, month){
			if (year%4 == 0 && (year%100 != 0 || year%400 == 0)){
				return days[month-1] + 1;
			}else{
				return days[month-1];
			}
		}

		create_calendar = function create_calendar(){
			$("#calendar_table").empty();
			aim_y = select_y.val();
			aim_m = select_m.val();
			
			var aim = {};
			aim["data[Calendar][year]"] = aim_y;
			aim["data[Calendar][month]"] = aim_m;
			$.ajax({type:'POST', url:'get_memo', data:aim,
				success: function(data, status){
					var events = JSON.parse(data);

					format_date.setYear(aim_y);
					format_date.setMonth(aim_m-1);
					format_date.setDate(1);
			
					monthdays = get_days(aim_y, aim_m) ;
					weekday = format_date.getDay();
					weeks = Math.ceil((monthdays+ weekday)/7);
		
					val = new Array;
					for (var i=0; i<weekday; i++){
						val.push("");
					}
					for (var i=1; i<=monthdays; i++){
						val.push(i);
					}
					while (val.length < weeks*7){
						val.push("");
					}
		
					for (var i=0; i<weeks; i++){
						tr = $("<tr></tr>")
						for (var j=0; j<7; j++){
							td = $('<td onclick="show_memos('+val[i*7+j]+')">'+val[i*7+j]+"</td>");
							if (events[val[7*i+j]] == 1){
								td.append("<img src='../../img/remind' height='13px' width='13px'/>");
							}
							tr.append(td);
						}
						$("#calendar_table").append(tr);
					}
				}
			});
		}

		show_memos = function show_memos(i){
			var time = aim_y + '年 ' + aim_m + '月 ' + i + '日';
			aim_d = i;
			$("#memo_header").empty();
			$("#memo_header").append(time);

			datastr["data[Calendar][year]"] = select_y.value;
			datastr["data[Calendar][month]"] = select_m.value;
			datastr["data[Calendar][day]"] = i;

			$("#memos").empty();
			$.ajax({type:"POST", url:$("#get_info_url").val(), data:datastr,
					success: function(data, status){
						var memos_info = JSON.parse(data);
						$.each(memos_info, function(key, value){
							var p = $("<p>" + value['Calendar']['memo'] + '</p>')
							var li = $("<li class='table-view-cell'></li>");
							li.append(value['Calendar']['time']);
							li.append(p);
							$("#memos").append(li);
						});					
						$("#calendar").slideUp(500);
						$("#memo").show();
					}
			});
		}
		
		add = function add(){
			$("#select_y").val("2015");
		}

	});
</script>

<nav class="bar bar-tab">
	<a class="tab-item" href=<?php echo $this->Html->url(array('controller'=>'home', 'action'=>'home')); ?>>
		<span class="icon icon-home"></span>
		<span class="tab-label">Home</span>
	</a>
</nav>
<body onload="init()">
	<div id="calendar">
		<table border='0' width="100%" height="54px" style="table-layout:fixed;">
			<tr bgcolor="#808080"> 
		        <th colspan='7' style="padding-left:50px;"> 
		            <div id="year_select" > </div>
	        	</th>
	        	<th colspan='7' style="padding-right:50px;">
		        	<div id="month_select" > </div>
		        </th> 
		    </tr> 
		</table>
		<table bgcolor="#F0F0F0" border='0' width="100%" height="44px" style="table-layout:fixed; margin-left:2px"> 
		    <tr  style="font-size:0.8em; font-weight:bold;"> 
		        <td >Sun</td> 
		        <td >Mon</td> 
		        <td >Tue</td> 
		        <td >Wed</td> 
		        <td >Thu</td> 
		        <td >Fri</td> 
		        <td >Sat</td> 
		    </tr > 
		</table>
		<table id="calendar_table" gcolor="#F0F0F0" border='0' width="100%" height="50%" style="table-layout:fixed; margin-left:2px"> 
		</table>
		<br />
		<label style="margin-left:8px">点击日期可编辑备忘录</label>
	</div>
	<ul id="memo" style="display:none; border-top:0px;" class="table-view content"> 
		<li style="background-color:#C0C0C0;  height:14%; padding:8%"
			id="memo_header" class="table-view-cell">
		</li>
		<div id = "memos">
		</div>
		<button class="btn btn-block" onclick="edit()" style="border:#C0C0C0; background-color:#C0C0C0" >新建</button>
		<form id = "create_memo" style="display:none">
			<div class="input-row">
				<label>时间</label>
				<select id="edit_hour" style="width:30%"></select>
				<select id="edit_minute" style="width:30%"></select>
			</div>
			<div class="input-row">
				<label>地点</label>
				<input type="text" placeholder="null" id="edit_place"/>
			</div>
			<textarea rows="5" id="edit_memo"></textarea>
			<button class="btn btn-block" onclick="mysubmit()" style="border:#C0C0C0; background-color:#C0C0C0;">提交</button>
		</form>
		<button class="btn btn btn-block" onclick="cancel()" style="border:#C0C0C0;background-color:#C0C0C0" >返回</button>
	</ul>
	
</body>

<input id="year" value=<?php echo $year; ?> type="hidden" />
<input id="month" value=<?php echo $month; ?> type="hidden" />
<input id="day" value=<?php echo $day; ?> type="hidden" />
<input id="save_info_url" value=<?php echo $this->Html->url(array('action'=>'save_info')); ?> type="hidden" />
<input id="get_info_url" value=<?php echo $this->Html->url(array('action'=>'get_info')); ?> type="hidden" />

<script>
</script>
