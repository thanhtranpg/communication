<?php 
class Admin_manager extends Module{
	function Admin_manager($row){
		Module::Module($row);		
		require_once 'forms/Admin_manager.php';
		$this->add_form(new Admin_managerForm());		
	}
}
?>