<?php
class DebugController extends AppController {
	var $name = 'debug';
	var $ext = '.php';
	var $uses = array('Account','Department','Employee');
	public $components = array('RequestHandler');
	function debug() {
		/*
		$this->Account->register('lbqq0000@sina.com','1234');
		$comid = $this->Department->register('1','google');
		$this->Company->register($comid,'google','lbqq0000@sina.com');
		$id = $this->Employee->register(
			'2','dlee','student','13699216771','lbqq','lbqq0000@gmail.com'
		)*/
		$info = array('name'=>'haha','tel'=>'jjjjjjjjjjj','email'=>'hj','wechat'=>'fsf','dep_id'=>'3','position'=>'fsfs','id'=>'none');
		$dep_id = $info['dep_id'];
		unset($info['id']);
		unset($info['dep_id']);
		$dep = $this->Department->get_department($dep_id);
		$info['com_id'] = $dep['com_id'];
		$this->set('data',var_dump($info));
		$id = $this->Employee->register($info,$dep_id);
	}
}
?>
