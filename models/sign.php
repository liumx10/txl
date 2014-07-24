<?php 
class Sign extends AppModel{
	var $name="Sign";
	var $useTable = 'signs';
	var $primaryKey = 'time';

	function save_info($info)
	{
		$this->save($info);
	}

	function get_signs($id){
		$signs = $this->find('all', array('conditions'=>array('id'=>$id)));
		return $signs;
	}
}
?>