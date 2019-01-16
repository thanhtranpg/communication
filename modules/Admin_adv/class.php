<?php 
class Admin_adv extends Module{
	function Admin_adv($row){
		Module::Module($row);		
		require_once 'forms/Admin_adv.php';
		$this->add_form(new Admin_advForm());		
	}
}
?>