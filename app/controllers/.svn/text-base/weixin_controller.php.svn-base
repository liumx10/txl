<?php

include "wechatclass/wechat.class.php";

class WeixinController extends AppController {
	var $name = "Weixin";
	var $uses = array('Company', 'Employee');
	function index($com_id) {
		$options = get_wechat_options($com_id);
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
		$options = get_wechat_options($com_id);
		$weObj = new Wechat($options);
		$url = $weObj->getOauthRedirect('http://203.195.150.253/weixin/set_openidi/'.$cmp_id.'/txl', 's1', 'snsapi_base');
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
		$options = get_wechat_options($com_id);
		$weObj = new Wechat($options);
		$access_token = $weObj->getOauthAccessToken();
		$this->Session->write('openid', $access_token['openid']);
		$this->Session->write('com_id', $com_id);
		if ($redirect == 'txl') {
			$this->redirect("http://203.195.150.253/txl");
		} else {
			$this->redirect("http://203.195.150.253/sign/sign");
		}
	}
	function send_notice($openid, $content) {
		$em = $this->Employee->get_by_openid($openid);
		$cmp_id = $em['com_id'];
		$options = get_wechat_options($cmp_id);
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
	function get_wechat_options($com_id){
		$com = $this->Company->get_by_id($com_id);
		return array(
			'token' => $com['token'],
			'appid' => $com['appid'],
			'appsecret' => $com['appsecret']
		);
	}
}

?>
