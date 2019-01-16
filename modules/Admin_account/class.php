<?php 
class Admin_account extends Module{
	function Admin_account($row){
		Module::Module($row);
		
				require_once 'forms/Admin_account.php';
				$this->add_form(new Admin_accountForm());		
				
					
	}
}
?>