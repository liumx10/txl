<?php
class Account extends AppModel{
	var $name = 'Account';
	var $useTable = 'account';
	var $primaryKey = 'login_name';
	var $hasMany = array('Manage'=>
		array(
		'className' => 'Manage',
		'foreignKey' => 'manager'));
	function login($login_name, $passwd) {
		$valid = $this->find('first', array('conditions' => 
			array('login_name' => $login_name,
				  'passwd' => $passwd)));
		return $valid;
	}
	function register($login_name,$passwd) {
		$inuse = $this->find('first',array('conditions' => 
			array('login_name' => $login_name)));
		if($inuse) {
			return 'inuse';
		}
		else {
			$newuser = array('Account'=>
				array('login_name'=>$login_name,'passwd'=>$passwd));
			$this->save($newuser);
			return 'succeed';
		}
	}
	function chpwd($login_name, $passwd_old, $passwd_new) {
		$valid = $this->find('first', array('conditions' => 
			array('login_name' => $login_name,
				  'passwd' => $passwd_old)));
		if($valid) {
			$this->updateAll(
				array('passwd'=>"'".$passwd_new."'"),
				array('login_name'=>$login_name));
			return 'succeed';
		}
		else {
			return 'pwwrong';
		}
	}
	function chnick($login_name, $nick_name) {
		$valid = $this->find('first', array('conditions' => 
			array('login_name' => $login_name)));
		if($valid) {
			//this could be better as login_name is primary key.
			//notice updateall did not add quotes to column values
			$this->updateAll(
				array('nick_name'=>"'".$nick_name."'"),
				array('login_name'=>$login_name));
			return 'succeed';
		}
		else {
			return 'logwrong';
		}
	}
	function owns($login_name) {
		//return a array of company ids;
		$records = $this->find('first',array('conditions' => array('login_name' => $login_name)));
		return $records['Manage'];
	}
}
?>
