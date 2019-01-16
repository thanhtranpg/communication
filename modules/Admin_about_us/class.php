<?php 
class Admin_about_us extends Module{
	function Admin_about_us($row){
		Module::Module($row);
		
		require_once 'forms/Admin_about_us.php';
		$this->add_form(new Admin_about_usForm());					
	}
}
?>