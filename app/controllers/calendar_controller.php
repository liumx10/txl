<?php 
class CalendarController extends AppController{
	var $name="Calendar";
	var $helpers=array('Html');
	var $uses=array("Calendar");
	var $layout='wap';

	function index(){
		$this->set('year', 2013);
		$this->set('month', date('m'));
		$this->set('day', date('d'));
		$memos = $this->Calendar->get_all_memos(date('Y'), date('m'), date('d'), $this->get_openid());
		$this->log('memo: '.count($memos), LOG_DEBUG);
		$this->set('days', $memos);
		$this->set('today', date('Y-m-d'));
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
		if ($date = $this->data['Calendar']['date'] == null){
			$date = $this->data['Calendar']['year'].'-'.$this->data['Calendar']['month'].'-'.$this->data['Calendar']['day']; 
		}
		$this->log('date: '.$date, LOG_DEBUG);
		$hour = $this->data['Calendar']['hour'];
		$minute = $this->data['Calendar']['minute'];

		$place = $this->data['Calendar']['place'];
		$memo = $this->data['Calendar']['memo'];

		$time = $date." ".$hour.":".$minute.":00";
		$this->Calendar->save_info($time, $place, $memo, $this->get_openid());
		$this->autoRender = false;
	}
	function  get_openid(){
		//		return $this->Session->read('openid');
		return 1;
	}
}
?>
