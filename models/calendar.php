<?php 

class Calendar extends AppModel{
	var $name="Calendar";
	var $uses="calendars";
	var $primaryKey = "create_time";
	
	function get_memo($year, $month, $openid){
		$day = 1;
		$memo = array();
		while ($day < 32){
			$start =  $year."-".$month."-".$day." 00:00:00";
			$end =  $year."-".$month."-".$day." 23:59:59";
			
			$res = $this->find("all", array('conditions'=>array('time <'=>$end, 'time >='=>$start, "openid"=>$openid)));	
			if (count($res) > 0){
				$memo[$day]=1;
			}else{
				$memo[$day]=0;
			}
			$day = $day + 1;
		}
		return $memo;
	}
	function get_one_day($year, $month, $day, $openid){
		$start = $year."-".$month."-".$day." "."00:00:00";
		$end = $year."-".$month."-".$day." "."23:59:59";

		return $this->find("all", array('conditions'=>array('time <'=>$end, 'time >='=>$start, "openid"=>$openid)));	
	}	

	function save_info($time, $place, $memo, $openid){
		$create_time = date('Y-m-d h:i:s');
		$this->log("time: ".$time, LOG_DEBUG);
		$this->log("create_time: ".$create_time, LOG_DEBUG);
		$info = array('time'=>$time, 'place'=>$place, 'memo'=>$memo, 'create_time'=>$create_time, 'openid'=>$openid, 'realized'=>false);
		$this->save($info);
	}
}
?>
