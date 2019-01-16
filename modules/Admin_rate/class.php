<?php 
class Admin_rate extends Module{
	function Admin_rate($row){
		Module::Module($row);
		$cmd = System::getParam('cmd');
		
				require_once 'forms/Admin_rate.php';
				$this->add_form(new Admin_rateForm());
			
		
			
	}
}
?>