<?php 
class Admin_event extends Module{
	function Admin_event($row){
		Module::Module($row);		
		require_once 'forms/Admin_event.php';
		$this->add_form(new Admin_eventForm());		
	}
}
?>