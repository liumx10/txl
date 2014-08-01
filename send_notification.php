<?php
include "/var/www/html/txl/app/controllers/wechatclass/wechat.class.php";
$THRESHOLD = 30 * 60;
$TIME = time();

$link = mysqli_connect("localhost", "root", "qinghua", "txl");
mysqli_real_query($link, "SET NAMES 'UTF8'");
/* check connection */
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}

$data = array(
	"touser"=>"oCspZswr19iq47x5bbNzfVfvL1bQ",
	"msgtype"=>"text",
	"text"=>array(
		"content"=>"",//date(DATE_RFC2822),
	),
);

$query = "select * from calendars where realized = 0;";

if ($result = mysqli_query($link, $query)) {
	while ($row = mysqli_fetch_row($result)) {
		if (strtotime($row[0]) - $TIME <= $THRESHOLD) {
			$data['touser'] = $row[1];
			$data['text']['content'] = "【日程提醒】\n".$row[0].", ".$row[2].",".$row[3];
			if ($ems = mysqli_query($link, "select * from employee where openid = '".$row[1]."'")) {
				$emp = mysqli_fetch_row($ems);
				var_dump($emp);
				$com_id = $emp[1];
				if ($cms = mysqli_query($link, "select * from company where id = '".$com_id."'")) {
					$com = mysqli_fetch_row($cms);
					$options = array(
						'token' => $com[2],
						'appid' => $com[3],
						'appsecret' => $com[4]
					);
					$weObj = new Wechat($options);
					$weObj->sendCustomMessage($data);
					mysqli_real_query($link, "update calendars set realized = 1 where openid = '".$row[1]."' && create_time = '".$row[4]."';")."\n";
					mysqli_free_result($cms);
				}
				mysqli_free_result($ems);
			}
		}
	}
	mysqli_free_result($result);
}

/* close connection */
mysqli_close($link);
?>
