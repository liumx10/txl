<?php 
	class EditController extends AppController{
		var $name="Edit";
		var $helpers=array("Html", "Form", "Text");
		var $uses=array("Employee", "Department","Company");
		var $layout='wap';

		function edit($load_image = false){
			$openid = $this->get_openid();
			$person = $this->Employee->get_by_openid($openid);
			$email = $person['email'];
			$tel = $person['tel'];
			$wechat = $person['wechat'];

			if (!empty($_POST['email'])){
				$email = $_POST['email'];
			}
			if (!empty($_POST['tel'])){
				$tel = $_POST['tel'];
			}
			if (!empty($_POST['wechat'])){
				$wechat = $_POST['wechat'];
			}

			$person['email'] = $email;
			$person['tel'] = $tel;
			$person['wechat'] = $wechat;
			$this->log($wechat, 'debug');
			$this->Employee->update_info($person);

			$this->set('wechat', $wechat);
			$this->set('tel', $tel);
			$this->set('email', $email);
			$this->set('photoid', $this->get_photoid($person['id']));
			$this->set('myid', $person['id']);
			$this->set('load_image', $load_image);

			$this->render('edit');
		}
		
		function load_image(){
			$permitted = array('image/gif','image/jpeg','image/pjpeg','image/png', 'image/jpg', 'application/octet-stream');
			$this->set('data', $this->data);
			$loadOk = false;
			if (!empty($this->data['Employee']['photo'])){
				$info = $this->data['Employee']['photo'];

				// check if the file's type is permitted
				$typeOk = false;
				foreach ($permitted as $type) {
					if ($type == $info['type']){
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
			if ($loadOk){
				$this->edit(true);
			}
		}

		function get_openid(){
			return $this->Session->read('openid');
		}
	}
?>