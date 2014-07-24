<html>
	<head>
		<?php echo $this->Html->scriptBlock('var jsVars = '.$this->Js->object($jsVars).';'); ?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<script charset="utf-8" src="http://map.qq.com/api/js?v=1"></script>
		<script>
			var address_list = new Array();
			var datastr = {};
			function search(){
				var geocoder = new soso.maps.Geocoder();
			    var lat = jsVars.location['latitude'];
			    var lng = jsVars.location['longitude'];
			    var dtime = jsVars.time;
			    var latLng = new soso.maps.LatLng(lat, lng);
			    
			    geocoder.geocode({'location': latLng}, function(results, status) {
			        if (status == soso.maps.GeocoderStatus.OK) {
			            var address = results.address;
			            var div = $('<div class="media-body">'+ dtime +'<p>'+address+'</p>'+'</div>');
			            var li = $('<li class="table-view-cell"></li>');

			            li.append(div);
			            $("#container").append(li);
			            datastr["data[Sign][address]"] = address;
			            datastr["data[Sign][latitude]"] = lat;
			            datastr["data[Sign][longitude]"] = lng;

			            $("#container").append('<li class="table-view-cell"><p>签到成功!</p></li>');
			        } 
			        else {
			            alert("检索没有结果，原因: " + status);
			            $("#container").append('<li class="table-view-cell"><p>签到失败!</p></li>');
			        }
			    }); 
			}

			function sign(){
				$.ajax({type:"POST", url:"save_info", data:datastr,
			        			success: function(data, status){
			        				alert("签到成功");
			        			}
			    });
			}

		</script>
	</head>
	
	<div class="bar bar-tab bar-footer">
		<a class="tab-item" onclick="window.history.back()">
			<span class="icon icon-left"></span>
			<span class="tab-label">Back</span>
		</a>
	</div>
	<body onload="search()">
		<div class="content">
			<div class="table-view" id="container"></div>			
			<a href=<?php echo $this->Html->url(array('controller'=>'txl', 'action'=>'show_sign')); ?>>
			<button class="btn btn-block" >
				签到记录
			</button>
			</a>
		</div>
	</body>
</html>
