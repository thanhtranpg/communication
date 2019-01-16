<?php 
class Admin_changepass extends Module{
	function Admin_changepass($row){
		Module::Module($row);
		
		require_once 'forms/Admin_changepass.php';
		$this->add_form(new Admin_changepassForm());					
	}
}
?>