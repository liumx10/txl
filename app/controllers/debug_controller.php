<?php
class DebugController extends AppController {
	var $name = 'debug';
	var $ext = '.php';
	var $uses = array('Account','Department','Employee');
	public $components = array('RequestHandler');
	function debug() {
		$emp = $this->Employee->get_employee('4');
		$this->set('data',$emp['name']);
	}
}
?>
