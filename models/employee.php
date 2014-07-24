<?php
class Employee extends AppModel{
	var $name = 'Employee';
	var $useTable = 'employee';
	var $primaryKey = 'id';
	var $hasMany = array('Work'=>
		array('className' => 'Work','foreignKey' => 'emp_id'));
	var $belongsTo = array('MyCom'=>
		array('className' => 'Company','foreignKey' => 'com_id'));
	function register($info,$dep_id) {//dep_id could be comid when he is CEO 
		//bug here com_id just company id, work->job needs department id 
		$newemployee = array('Employee' => $info);
		$this->save($newemployee);
		$id = $this->getInsertId();
		$this->Work->job($id,$dep_id);
		return $id;
	}
	//late complete this function not now
	//$info ('id'  'com_id' 'name' 'position' 'tel' 'wechat' 'email' 'openid')
	function update_info($info) {
		$emp = array('Employee'=>$info);
		$this->save($emp);
	}
	function get_employee($id) {
		$em = $this->find('first',array('conditions'=>array('Employee.id'=>$id)));
		return 	$em['Employee'];
	}
	function get_by_name($name, $comid) {
		//[0]['Employee']['id']
		//return in an array
		$ems = $this->find('all',array('conditions'=>array('Employee.name LIKE '=>'%'.$name.'%','Employee.com_id'=>$comid)));
		return $ems;
	}
	function get_by_tel($tel) {
		$ems = $this->find('first',array('conditions'=>array('tel'=>$tel)));
		return $ems['Employee'];
	}
	function get_by_openid($openid) {
		$ems = $this->find('first',array('conditions'=>array('openid'=>$openid)));
		return $ems['Employee'];
	}
}
?>
