<?php 
class AdminMenu extends Module{
	function AdminMenu($row){
		Module::Module($row);
		require_once 'forms/AdminMenu.php';
		$this->add_form(new AdminMenuForm());		
	}
}
?>