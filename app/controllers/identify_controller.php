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
	
	function verf(){
		$this->autoRender = false;
		$openid = $this->get_openid();
		$person = $this->Employee->get_by_tel($this->data['Employee']['tel']);

		if ($this->data['Employee']['verf'] == $person['verification']){
			$person['openid'] = $openid;
			$this->Employee->update_info($person);
			echo true;		
		}else{
			echo false;
		}
	}
	function get_openid(){
		return $this->Session->read('openid');
	}
}
