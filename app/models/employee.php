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
		$verification = substr(md5(time()), 0, 6);
		$info['verification'] = $verification;
		$newemployee = array('Employee' => $info);
		$this->save($newemployee);
		$id = $this->getInsertId();
		$this->Work->job($id,$dep_id);
		// send emial
		$address = $info['email'];
		require_once 'mail/PHPMailerAutoload.php';

		$mail = new PHPMailer;

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.163.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'thu2011txl@163.com';                 // SMTP username
		$mail->Password = 'tsinghua2011txl';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

		$mail->CharSet = 'UTF-8';
		$mail->From = 'thu2011txl@163.com';
		$mail->FromName = "WeWork";
		$mail->addAddress($address);     // Add a recipient

		$mail->WordWrap = 50;                                 // Set word wrap to 50 characters

		$mail->Subject = "公共平台验证码";
		$mail->Body    = "尊敬的".$info['name'].":\n\n  您好！欢迎使用WeWork企业办公平台！\n\n  您的注册手机为：".$info['tel']."\n  验证码为：".$verification."\n";

		$mail->send();

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

	function get_all_employee($companyid){
		return $this->find('all', array('conditions'=>array('com_id'=>$companyid)));
	}
}
?>
