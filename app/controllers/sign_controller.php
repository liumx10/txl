<?php 
class SignController extends AppController{
	var $name="Sign";
	var $uses=array('Employee', 'Department', 'Company', 'Sign');
	var $helpers=array('Html', 'Form', 'Js'=>'Jquery');
	var $layout='wap';
	var $_jsvariable=array();

	function beforeRender(){
		$this->set('jsVars', $this->_jsvariable);
	}

	function set_js_variable($name, $value){
		$this->_jsvariable[$name] = $value;
	}

	function sign(){
		$openid = $this->get_openid();
		$person = $this->Employee->get_by_openid($openid);
		
		$location = $this->get_location($openid);		
		$this->set_js_variable('location', $location);
		$this->set_js_variable('time', date("Y-m-d h:i:s"));
	}

	function save_info(){
		$openid = $this->get_openid();
		$person = $this->Employee->get_by_openid($openid);

		$id = $person['id'];
		$address = $this->data['Sign']['address'];
		$time = date('Y-m-d H:i:s');
		$latitude = $this->data['Sign']['latitude'];
		$longitude = $this->data['Sign']['longitude'];
		
		$this->log('address: '.$address, LOG_DEBUG);
		$info = array('address'=>$address, 'time'=>$time, 'id'=>$id, 'latitude'=>$latitude, 'longitude'=>$longitude);
		$this->Sign->save($info);
	}

	function get_openid(){
		return $this->Session->read('openid');
	}
/*
	function get_time(){
		$time = array();
		$time[] = "2014/07/05 09:08:04";
		$time[] = "2014/07/05 12:08:04";
		$time[] = "2014/07/05 17:08:04";
		$time[] = "2014/07/06 09:08:04";
		$time[] = "2014/07/06 11:38:04";

		return "2014/07/06 11:38:04";
	} */
}
