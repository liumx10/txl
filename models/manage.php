<?php
class Manage extends AppModel{
	var $name = 'Manage';
	var $useTable = 'manage_relation';

	function own($uname,$id) {
		//called after registe a company
		$newrelation = array('Manage' => array('manager'=>$uname,'com_id'=>$id));
		$this->save($newrelation);
	}
}
?>
