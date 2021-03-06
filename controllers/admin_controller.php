<?php
class AdminController extends AppController {
	public $name = 'admin';
	public $ext = '.php';
	public $uses = array('Account','Company','Department','Employee');
	public $components = array('RequestHandler');

	function home() {
	}
	function getCompany() {
		$this->autoRender = false;
		if($this->RequestHandler->isAjax()) {
			$name = $this->Session->read('username');
			$com_ids = $this->Account->owns($name);
			if(!empty($com_ids)) {
				$com_info = array();
				foreach($com_ids as $value) {
					$com_id = $value['com_id'];
					$com_find = $this->Company->find('first',array('conditions' =>
						array('id' => $com_id)));
					$com_name = $com_find['Company']['name'];
					$com_info[] = array('name'=>$com_name,'id'=>$com_id);
				}
				$resData = array('pid'=>'1','dep'=>$com_info);
				echo json_encode($resData);
			}
		}
	}
	function getCEO() {
		$this->autoRender = false;
		if($this->RequestHandler->isAjax()) {
			$comid = $this->data['company']['id'];
			$workers = $this->Department->get_members($comid);
			$CEOs = array();
			foreach($workers as $value) {
				$emp = $this->Employee->get_employee($value['emp_id']);
				$CEOs[] = $emp;
			}
			echo json_encode($CEOs);
		}
	}
	function editInfo() {
		$this->autoRender = false;
		if($this->RequestHandler->isAjax()) {
			$info = $this->data['Employee'];
			$this->Employee->update_info($info);
		}
	}
	function register() {
		$this->autoRender = false;
		if($this->RequestHandler->isAjax()) {
			$info = $this->data['Employee'];
			$dep_id = $info['dep_id'];
			unset($info['id']);
			unset($info['dep_id']);
			$dep = $this->Department->get_department($dep_id);
			$info['com_id'] = $dep['com_id'];
			$id = $this->Employee->register($info,$dep_id);
			echo $id;
		}
	}
	function regDepartment() {
		$this->autoRender = false;
		if($this->RequestHandler->isAjax()) {
			$username = $this->Session->read('username');
			$depname = $this->data['department']['name'];
			$pid = $this->data['department']['id'];
			$id = $this->Department->register($pid,$depname);
			if($pid == '1') {
				$this->Company->register($id, $depname, $username);
			}
			echo $id;
		}
	}
	function childDepartment() {
		$this->autoRender = false;
		if($this->RequestHandler->isAjax()) {
			$id = $this->data['Department']['id'];
			$children = $this->Department->get_children($id);
			echo json_encode(array('pid'=>$id,'dep'=>$children));
		}
	}
	function delEmployee() {
		$this->autoRender = false;
		$id = $this->data['Employee']['id'];
		$this->Employee->delete($id);
		echo $id;
	}
	function delDepartment() {
		$this->autoRender = false;
		$id = $this->data['Department']['id'];
		$this->Department->delete($id);
		echo $id;
	}
}
?>
