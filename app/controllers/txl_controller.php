<?php
class TxlController extends AppController{
	var $name="Txl";
	var $helpers=array("Html", "Form", "Text");
	var $uses=array("Employee", "Department","Company", 'Sign');
	var $layout='wap';

	function index($id=null){
		$openid = $this->get_openid();
		$person = $this->Employee->get_by_openid($openid);
		
		if ( $person == null ){ // the user does not register
			$this->redirect(array('controller'=>'identify', 'action'=>'identify'));
		}else{
			$this->redirect(array('controller'=>'home', 'action'=>'home'));
		}
	}

	function show_group($group_id = null){
		$myself = $this->Employee->get_by_openid($this->get_openid());
		if ($group_id == null){
			$group_id = $myself['com_id'];
		}

		$department = $this->Department->get_department($group_id);
		$parent = $this->Department->get_parent($group_id);

		// set the members and sub department 
		$members = $this->Department->get_members($group_id);
		$members_info = array();
		foreach($members as $member):
			$emp = $this->Employee->get_employee($member['emp_id']);
			array_push($members_info, $emp);
		endforeach;
		
		$this->set('department', $department);
		$this->set("people", $members_info);
		$this->set('groups', $this->Department->get_children($group_id));
		$this->set('branch', $this->search_branch($group_id, $department['name']));
		$this->set('myid', $myself['id']);

		$this->render('show_group');	
	}

	function show_people($person_id){
		$info =$this->Employee->get_employee($person_id);
		$companyid = $info['com_id'];

		$this->set('companyid', $companyid);
		$this->set('Info', $info);
		$this->set('photoid', $this->get_photoid($info['id']));

		$p = $this->Employee->get_by_openid($this->get_openid());
		$this->set('is_my_home', ($p['id'] == $info['id']));
		$this->set('myid', $p['id']);

		$this->render('show_people');
	}

	function show_sign($person_id = null){
		if ($person_id == null){
			$p = $this->Employee->get_by_openid($this->get_openid());
			$person_id = $p['id'];
		}
		$signs = $this->Sign->get_signs($person_id);
		$this->set("signs", $signs);
		$this->set('id', $person_id);
	}

	function show_map($lat, $lng, $add){
		$this->set('lat', $lat);
		$this->set('lng', $lng);
		$this->set('add', urldecode($add));
	}
	/**/
	function search_people_by_name($companyid = null){
		$person = $this->Employee->get_by_openid($this->get_openid());
		$myid = $person['id'];

		if (empty($companyid)){
			$companyid = $person['com_id'];			
		}
		$this->log($companyid, LOG_DEBUG);
		$this->set("companyid", $companyid);
		$this->set('myid', $myid);
		
		$this->set('employees', $this->Employee->get_all_employee($companyid));			
	}

	function search_branch($department_id, $name){
		$root_id = 1;
		while ($department_id != $root_id){
			$branch[] = array('name'=>$name, 'id'=>$department_id);
			$father = $this->Department->get_parent($department_id);
			$department_id = $father['id'];
			$name = $father['name'];
		}
		return $branch;
	}	

	function get_openid(){
		if ($this->Session->check('openid')){
			return $this->Session->read('openid');
		}else{
			return 1;
		}
	}

	function edit(){
		$this->log('data:'.$this->data['Employee'], LOG_DEBUG);
		$this->log('post:'.$_POST['tel'], LOG_DEBUG);
		$openid = $this->get_openid();
		$person = $this->Employee->get_by_openid($openid);
		$email = $person['email'];
		$tel = $person['tel'];
		$wechat = $person['wechat'];

		if (!empty($this->data['Employee']['email'])){
			$email = $this->data['Employee']['email'];
		}
		if (!empty($this->data['Employee']['tel'])){
			$tel = $this->data['Employee']['tel'];
		}
		if (!empty($this->data['Employee']['wechat'])){
			$wechat = $this->data['Employee']['wechat'];
		}

		$person['email'] = $email;
		$person['tel'] = $tel;
		$person['wechat'] = $wechat;
		$this->Employee->update_info($person);

		$this->set('wechat', $wechat);
		$this->set('tel', $tel);
		$this->set('email', $email);
		$this->set('photoid', $this->get_photoid($person['id']));
		$this->set('myid', $person['id']);
	}

	function load_image(){
		$permitted = array('jpg', 'png');
		$this->set('data', $this->data);
		$loadOk = false;
		$this->log($_FILES, LOG_DEBUG);
		if (!empty($_FILES['file'])){
			$info = $_FILES['file'];

			// check if the file's type is permitted
			$extension = pathinfo($info['name'], PATHINFO_EXTENSION);
			$typeOk = false;
			foreach ($permitted as $type) {
				if ($type == $extension){
					$typeOk = true;
					break;
				}
			}

			if ($typeOk && $info['error'] == 0){
				// image is name after people's id
				$openid = $this->get_openid();
				$p = $this->Employee->get_by_openid($openid);
				$id = $p['id'];

				$file_name = WWW_ROOT.'headimage'.DS.$id;
				if (file_exists($file_name)){
					unlink($file_name);
				}
				move_uploaded_file($info['tmp_name'], $file_name);
				$loadOk = true;
			}

		}
		$this->autoRender = false;
	}

}

?>
