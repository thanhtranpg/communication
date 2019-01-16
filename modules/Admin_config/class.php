<?php 
class Admin_config extends Module{
	function Admin_config($row){
		Module::Module($row);
		
		require_once 'forms/Admin_config.php';
		$this->add_form(new Admin_configForm());					
	}
}
?>