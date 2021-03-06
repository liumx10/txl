<?php 
class CalendarController extends AppController{
	var $name="Calendar";
	var $helpers=array('Html');
	var $uses=array("Calendar");
	var $layout='wap';

	function index(){
		$this->autoRender = false;
		echo 'hello';
	}
	function home(){
		$this->set('year', date('Y'));
		$this->set('month', date('n'));
		$this->set('day', date('j'));
		$this->set('memos', null);
	}

	function edit($year, $month, $day){
	}	
	
	function get_memo(){
		$memo = $this->Calendar->get_memo($this->data['Calendar']['year'], $this->data['Calendar']['month'], $this->get_openid());
		$memo[''] = 0;
		echo json_encode($memo);
		$this->autoRender = false;
		
	}
	function get_info(){
		$year = $this->data['Calendar']['year'];
		$month = $this->data['Calendar']['month'];
		$day = $this->data['Calendar']['day'];

		$memo = $this->Calendar->get_one_day($year, $month, $day, $this->get_openid());
		echo json_encode($memo);
		$this->autoRender = false;
	}

	function save_info(){
		$year = $this->data['Calendar']['year'];
		$month = $this->data['Calendar']['month'];
		$day = $this->data['Calendar']['day'];
		$hour = $this->data['Calendar']['hour'];
		$minute = $this->data['Calendar']['minute'];

		$place = $this->data['Calendar']['place'];
		$memo = $this->data['Calendar']['memo'];

		$time = $year."-".$month."-".$day." ".$hour.":".$minute.":00";
		$this->Calendar->save_info($time, $place, $memo, $this->get_openid());
		$this->autoRender = false;
	}

	function  get_openid(){
		return $this->Session->read('openid');
	}
}
?>
