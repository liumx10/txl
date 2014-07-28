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

<?php echo $this->Html->css('framework7.min'); 
      echo $this->Html->css('mycss');
?>

<body onload="search()">
<div class="views">
	<div class="view view-main">
		<!--div class="navbar">
			<div class="navbar-inner">
			</div>
		</div-->
		<div class="pages">
			<div class="page no-navbar no-toolbar"> 
				<div class="page-content">
					<div class="list-block">
						<ul>
							<div  id="container"></div>			
						</ul>
					</div>
					<a href=<?php echo $this->Html->url(array('controller'=>'txl', 'action'=>'show_sign')); ?>
						   class="item-link button button-big">
						签到记录
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo $this->Html->script('framework7.min');
      echo $this->Html->script('my-app');
?>

</body>
</html>
