<head>
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
	<script charset="utf-8" src="http://map.qq.com/api/js?v=2.exp"></script>
	<script>
		var init = function() {
		    var map = new soso.maps.Map(document.getElementById('container'), {
		    	zoom: 13,
		    	zoomControl: true,
                zoomControlOptions: {
                    position: qq.maps.ControlPosition.LEFT_CENTER
                },
                mapTypeControlOptions: {
                    position: qq.maps.ControlPosition.TOP_CENTER
                }		    	
		    });
		    var lat = document.getElementById('lat').value;
		    var lng = document.getElementById('lng').value;
		    var add = document.getElementById('add').value;

		    var myLatLng = new soso.maps.LatLng(lat, lng);
		    map.panTo(myLatLng);
		    
		    info = new soso.maps.InfoWindow({map:map});
		    info.open();
	    	info.setContent('<div style="width:180px;height:70px;">'+
                add+'</div>');
	    	info.setPosition(myLatLng);
		}
	</script>
</head>
<body onload="init()">
	<ul class="table-view">
		<div id="container" style="width:100%; height:90%"></div>	
	</ul>
	<input value=<?php echo $lat; ?> id='lat' type="hidden"/>
	<input value=<?php echo $lng; ?> id='lng' type="hidden"/>
	<input value=<?php echo $add; ?> id='add' type="hidden"/>

	<div class="toolbar">
      	<a class="tab-item" onclick="window.history.back()" >
      		<span class="icon icon-left"></span>
      		<span class="tab-label">Back</span>
      	</a>
    </div>
</body>