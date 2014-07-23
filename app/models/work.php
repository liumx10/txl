<?php
class Work extends AppModel{
	var $name = 'Work';
	var $useTable = 'work_relation';

	function job($emp_id,$com_id) {
		//called after employee were added in 
		$newjob = array('Work' => array('emp_id'=>$emp_id,'dep_id'=>$com_id));
		$this->save($newjob);
	}
}
?>
