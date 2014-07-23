<?php
class IdentifyController extends AppController{
	var $name="Identify";
	var $helpers=array("Html", "Form");
	var $uses=array("Employee","Department", "Company");
	var $layout="wap";
	function index(){

	}

	function identify(){
		$this->set('openid', $this->get_openid());
	}

	function verfication($openid=null){
		if ($openid == null){
			$openid = $this->get_openid();
		}

		$person = $this->Employee->get_by_tel($_POST['tel']);
		if ($_POST['verfication'] == $person['verfication'])
		{
			$person['openid'] = $openid;
			$this->Employee->update_info($person);
			
			// this is debug information	
			$this->set('companyid', $person['com_id']);
			$this->set('data', $this->data);
			$this->render('verf_success');
		}else{
			$this->render('verf_failed');
		}
	}

	function get_openid(){
		return $this->Session->read('openid');
	}
}
