<?php 
class Admin_ourclient extends Module{
	function Admin_ourclient($row){
		Module::Module($row);		
		require_once 'forms/Admin_ourclient.php';
		$this->add_form(new Admin_ourclientForm());		
	}
}
?>