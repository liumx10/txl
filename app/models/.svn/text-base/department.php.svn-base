<?php
class Department extends AppModel{
	var $name = 'Department';
	var $useTable = 'department';
	var $primaryKey = 'id';
	var $hasMany = array('ChDepartment'=>
		array('className' => 'Department','foreignKey' => 'parent_id'),'Members'=>
		array('className' => 'Work','foreignKey'=>'dep_id'));
	var $belongsTo = array('PaDepartment'=>
		array('className' => 'Department','foreignKey' => 'parent_id'));

	function register($pid,$name) {
		$newdepartment = array(
			'Department'=>
			array('name'=>$name,'parent_id'=>$pid)
		);
		$this->save($newdepartment);
		$id = $this->getInsertId();
		return $id;
	}
	function get_children($id) {
		$children = $this->find('first',array('conditions'=>
			array('Department.id'=>$id)));
		return $children['ChDepartment'];
	}
	function get_parent($id) {
		$parent = $this->find('first',array('conditions'=>
			array('Department.id'=>$id)));
		return $parent['PaDepartment'];

	}
	function set_parent($id, $pid) {
	}
	function get_members($id) {
		//return ids of members
		$members = $this->find('first',array('conditions'=>
			array('Department.id'=>$id)));
		return $members['Members'];
	}
	function get_department($id) {
		$depa = $this->find('first',array('conditions' => array('Department.id' => $id)));
		return $depa['Department'];
	}
}
?>
