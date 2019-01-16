<?php
class Admin_loginForm extends Form{
	function Admin_loginForm(){
		Form::Form('Admin_loginForm');	
		if(!CGlobal::$is_adminpage){
			Url::redirect();
		}
	}	
	
	function on_submit(){
		global $display;
		$user = System::getParam('user');
		$pass = md5('hunghd_'.System::getParam('pass'));				
		$user_data=DB::fetch('SELECT * FROM '.PREFIX_TABLE.'admin WHERE user = "'.$user.'" AND pwd = "'.$pass.'"');
		if(!$user_data){
			$this->setFormError('user_name',"Tài khoản hoặc mật khẩu không đúng!");
			$display->add('msg',$this->showFormErrorMessages(1));
		}else{			
			$_SESSION["adm_user"] = $user_data;
			Url::redirect_url('webadmin.php');	
		}
	}
	
	function draw(){
		$this->beginForm();	
		global $display;	
		//print_r($_SESSION['adm_user']);					
		$display->output('Admin_login');					
		$this->endForm();
	}
	
}
?>