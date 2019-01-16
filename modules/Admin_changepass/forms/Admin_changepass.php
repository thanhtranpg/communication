<?php
class Admin_changepassForm extends Form{
	function Admin_changepassForm(){
		Form::Form('Admin_changepassForm');	
		if(!CGlobal::$is_adminpage){
			Url::redirect();
		}
		$this->link_js('js/md5.js');	
	}	
	
	function on_submit(){
		global $display;
		$user = System::getParam('user');
		$old_user = System::getParam('old_user');
		$pass = md5('hunghd_'.System::getParam('pass'));	
		$num = 0;					
		if($user != $old_user){
			$row = DB::fetch('SELECT COUNT(*) AS num FROM '.PREFIX_TABLE.'admin WHERE user = "'.$user.'"');
			$num = $row['num'];
		}
		
		if(!$num){			
			$arr = array(
						'user'	=>$user,
						'pwd'	=>$pass
					);
			DB::update(PREFIX_TABLE.'admin',$arr,'uid = '.$_SESSION['adm_user']['uid']);
			echo "<script>alert('Đổi mật khẩu thành công!'); window.location.href='webadmin.php?main=Admin_login&cmd=logout';</script>";
			//Url::redirect_url('webadmin.php?main=Admin_login&cmd=logout');
		}else {
			$this->setFormError('user_name',"Tên đăng nhập đã được sử dụng! Bạn hãy chọn tên đăng nhập khác!");
			$display->add('msg',$this->showFormErrorMessages(1));
		}				
	}
	
	function draw(){
		$this->beginForm();	
		global $display;	
		$user_data=DB::fetch('SELECT user,pwd FROM '.PREFIX_TABLE.'admin WHERE user = "'.$_SESSION['adm_user']['user'].'" AND pwd = "'.$_SESSION['adm_user']['pwd'].'"');
		$display->add('user',$user_data);			
		$display->output('Admin_changepass');					
		$this->endForm();
	}
	
}
?>