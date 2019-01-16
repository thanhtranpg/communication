<?php 
class Admin_carrer extends Module{
	function Admin_carrer($row){
		Module::Module($row);		
		require_once 'forms/Admin_carrer.php';
		$this->add_form(new Admin_carrerForm());		
	}
}
?>