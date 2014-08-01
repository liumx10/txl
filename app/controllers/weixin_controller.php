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
				} elseif ($event == 'CLICK') {
					$eventKey = $data['EventKey'];
					if ($eventKey == 'TXL') {
						$data = array(
							"0"=>array(
								'Title'=>'企业通讯录',
								'Description'=>"\t网页端管理信息，WAP端可以随时随地查询公司所有员工的信息，不必打开电脑，免去登录的烦恼，方便沟通联系。",
								'PicUrl'=>'http://203.195.150.253/img/txl.jpg',
							),
						);
						$weObj->news($data)->reply();
					} elseif ($eventKey == 'YDQD') {
						$data = array(
							"0"=>array(
								'Title'=>'移动签到',
								'Description'=>"\t因为业务原因，比如拜访客户等，不想去公司签到，又想证明自己在勤恳的工作，移动签到功能帮您解决。",
								'PicUrl'=>'http://203.195.150.253/img/ydqd.jpg',
							),
						);
						$weObj->news($data)->reply();
					} elseif ($eventKey == 'RLRC') {
						$data = array(
							"0"=>array(
								'Title'=>'日历日程',
								'Description'=>"\t建立日程安排，备忘录，让生活更有调理，做自己时间的主人。",
								'PicUrl'=>'http://203.195.150.253/img/rlrc.jpg',
							),
						);
						$weObj->news($data)->reply();
					} elseif ($eventKey == 'GSXW') {
						$data = array(
							"0"=>array(
								'Title'=>'公司新闻',
								'Description'=>"2014-07-26银监会批准在深圳筹建民营银行 腾讯为九个股东之一\n\n2014-06-27腾讯和58同城建立战略合作伙伴关系，强化本地服务生态体系\n\n2014-05-14腾讯公布2014年第一季度业绩\n\n2014-05-07腾讯公司成立微信事业群\n\n2014-03-19腾讯公布2013年第四季度及全年业绩\n\n2014-03-10京东与腾讯建立战略合作关系 共同打造中国电子商务行业全新格局\n",
								'Url'=>'http://www.tencent.com/zh-cn/at/pr/2014.shtml'
							),
						);
						$weObj->news($data)->reply();
					} elseif ($eventKey == 'GSJS') {
						$data = array(
							"0"=>array(
								'Title'=>'公司介绍',
								'Description'=>"\t愿景: 最受尊敬的互联网企业\n\t使命: 通过互联网服务提升人类生活品质。\n\t腾讯公司成立于1998年11月， 是目前中国最大的互联网综合服务提供商之一，也是中国服务用户最多的互联网企业之一。成立10多年以来，腾讯一直秉承一切以用户价值为依归的经营理念，始终处于稳健、高速发展的状态。2004年6月16日，腾讯公司在香港联交所主板公开上市（股票代号700）。",
								'PicUrl'=>'http://203.195.150.253/img/qq2.jpg',
								'Url'=>'http://www.tencent.com/'
							),
						);
						$weObj->news($data)->reply();
					}
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
						array('name'=>"功能介绍",'sub_button'=>array(	
									array('type'=>'click','name'=>"通讯录",'key'=>'TXL'),
									array('type'=>'click','name'=>"移动签到",'key'=>'YDQD'),
									array('type'=>'click','name'=>"日历日程",'key'=>'RLRC'),
									)),
						array('name'=>"我的公司",'sub_button'=>array(	
									array('type'=>'click','name'=>"公司新闻",'key'=>'GSXW'),
									array('type'=>'click','name'=>"公司介绍",'key'=>'GSJS'),
									)),
						array('type'=>'view','name'=>"应用首页",'url'=>$url),
					)
			);
		$weObj->createMenu($menu);
		$result = $weObj->getMenu();
		var_dump($result);
		$this->autoRender = false;
	}
	function set_openid($com_id) {
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
                                        "content"=>"【通知公告】\n".$content,//date(DATE_RFC2822),
                                ),
                        );
			$this->log('send info '.$weObj->sendCustomMessage($data), 'debug');
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
}

?>
