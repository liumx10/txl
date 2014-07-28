<?php

include "wechatclass/wechat.class.php";

class WeixinController extends AppController {
	var $name = "Weixin";
	var $uses = array('Company', 'Employee');
	function index($com_id) {
		$options = $this->get_wechat_options($com_id);
		$weObj = new Wechat($options);
		$weObj->valid();
		$type = $weObj->getRev()->getRevType();
		switch ($type) {
			case wechat::MSGTYPE_TEXT:
				$weObj->text("hello, I'm wechat")->reply();
				exit;
				break;
			case wechat::MSGTYPE_EVENT:
				$data = $weObj->getRev()->getRevData();
				$event = $data['Event'];
				if ($event == 'subscribe') {
					$weObj->text("欢迎使用 :)")->reply();
				} elseif ($event == 'LOCATION') {
					$latitude = $data['Latitude'];
					$longitude = $data['Longitude'];
					//$weObj->text("($latitude, $longitude)")->reply();
					$this->loadModel('Location');
					$this->Location->save(array('Location'=>array('openid'=>$data['FromUserName'],'latitude'=>$latitude, 'longitude'=>$longitude)));
				} elseif ($event == 'VIEW') {
				}
				exit;
				break;
				case wechat::MSGTYPE_IMAGE:
				break;
			default:
				$weObj->text("help info")->reply();
		}
	}
	function create_menu($com_id) {
		$options = $this->get_wechat_options($com_id);
		var_dump($options);
		$weObj = new Wechat($options);
		$url = $weObj->getOauthRedirect('http://203.195.150.253/weixin/set_openid/'.$com_id, 's1', 'snsapi_base');
		//$sign_url = $weObj->getOauthRedirect('http://203.195.150.253/weixin/set_openid/sign', 's2', 'snsapi_base');
		$menu =  array(
				"button"=>
					array(
						//array('type'=>'view','name'=>"签到",'url'=>$sign_url),
						array('type'=>'view','name'=>"应用首页",'url'=>$url),
					)
			);
		$weObj->createMenu($menu);
		$result = $weObj->getMenu();
		var_dump($result);
		$this->autoRender = false;
	}
	function set_openid($com_id, $redirect) {
		$options = $this->get_wechat_options($com_id);
		$weObj = new Wechat($options);
		$access_token = $weObj->getOauthAccessToken();
		$this->Session->write('openid', $access_token['openid']);
		$this->Session->write('com_id', $com_id);
		$this->redirect("http://203.195.150.253/txl/index");
	}
	function send_notice() {
                $this->autoRender = false;
                $em_ids = json_decode($this->data['mail']['ids']);
                $content = $this->data['mail']['info'];
                foreach ($em_ids as $em_id) {
                        $em  = $this->Employee->get_employee($em_id);
                        $cmp_id = $em['com_id'];
                        $openid = $em['openid'];
                        $options = $this->get_wechat_options($cmp_id);
                        $weObj = new Wechat($options);
                        $data = array(
                                        "touser"=>$openid,
                                        "msgtype"=>"text",
                                        "text"=>array(
                                        "content"=>$content,//date(DATE_RFC2822),
                                ),
                        );
                        $weObj->sendCustomMessage($data);
                }
        }
	function get_wechat_options($com_id){
		$com = $this->Company->get_by_id($com_id);
		return array(
			'token' => $com['token'],
			'appid' => $com['appid'],
			'appsecret' => $com['appsecret']
		);
	}
	function test() {
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.qq.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = '1016749531@qq.com';                 // SMTP username
$mail->Password = 'jayjay3821676';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

$mail->From = '1016749531@qq.com';
$mail->FromName = 'Mailer';
$mail->addAddress('d624lff11@163.com');     // Add a recipient

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
              /*  $this->autoRender = false;
		$to      = 'd624lff11@163.com';
		$subject = 'the subject';
		$message = 'hello';
		$headers = 'From: webmaster@example.com' . "\r\n" .
		    'Reply-To: webmaster@example.com' . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();

		echo mail($to, $subject, $message, $headers);
*/	}
}

?>
