<?php 
class Admin_login extends Module{
	function Admin_login($row){
		Module::Module($row);
		$cmd = System::getParam('cmd');
		switch ($cmd){
			case 'logout':
				if(isset($_SESSION['adm_user'])) unset($_SESSION['adm_user']);				
				Url::redirect_url('webadmin.php');
				break;
			default:
				if(isset($_SESSION['adm_user'])){
					Url::redirect_url('webadmin.php');
				}else {
					require_once 'forms/Admin_login.php';
					$this->add_form(new Admin_loginForm());	
				}
				break;	
		}
					
	}
}
?>