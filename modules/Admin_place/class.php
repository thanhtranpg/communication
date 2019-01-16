<?php 
class Admin_place extends Module{
	function Admin_place($row){
		Module::Module($row);
		$cmd = System::getParam('cmd');
		
				require_once 'forms/Admin_place.php';
				$this->add_form(new Admin_placeForm());
			
		
			
	}
}
?>