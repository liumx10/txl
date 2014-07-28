<?php
class UsersController extends AppController {
	var $name = 'users';
	var $ext = '.php';
	var $uses = array('Account');

	function login() {
		if (!empty($this->data)) {
			$username = $this->data['user']['username'];
			$passwd = $this->data['user']['password'];
			$valid = $this->Account->login($username, $passwd);

			if($valid) {
				$this->Session->write('username',$username);
				$this->redirect(array('controller'=>'Admin','action'=>'newadmin'));
			}
			else {
				$this->set('data','login faild');
				$this->render('debug');
			}
		}
	}
	function register() {
		if(!empty($this->data)) {
			$comname = $this->data['user']['company'];
			$username = $this->data['user']['username'];
			$pwd = $this->data['user']['password'];
			$status = $this->Account->register($username,$pwd);
			if($status == 'inuse') {
				$this->set('data','account already in use!');
				$this->render('debug');
			}
			else {
				$this->loadModel('Department');
				$this->loadModel('Company');
				$comid = $this->Department->register('1',$comname);
				$this->Company->register($comid,$comname,$username);
				$this->Session->write('username',$username);
			}
		}
	}
}
?>
