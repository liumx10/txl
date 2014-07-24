<?php
class Company extends AppModel{
	var $name = 'Company';
	var $useTable = 'company';
	var $primaryKey = 'id';
	var $hasMany = array('Manage'=>
	array('className' => 'Manage','foreignKey' => 'com_id'));

	//!!insert a unreal department
	function register($id, $name, $login_name) {
		$newcompany = array(
			'Company'=>
			array('name'=>$name,'id'=>$id)
		);
		$this->save($newcompany);
		$this->Manage->own($login_name,$id);
	}
	function chname($id, $name) {
		//to use this function check id first.(id valid && belongs to current user)
			$this->updateAll(
				array('name'=>"'".$name."'"),
				array('id'=>$id));
	}
	function get_by_id($id) {
		$com = $this->find('first',array('conditions'=>array('id'=>$id)));
		return $com['Company'];
	}
}
?>
