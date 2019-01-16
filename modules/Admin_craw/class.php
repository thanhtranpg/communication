<?php 
class Admin_craw extends Module{
	function Admin_craw($row){
		Module::Module($row);
		$cmd = System::getParam('cmd');
		switch ($cmd){
			case 'addcat':
			case 'editcat':
			case 'listcat':
			case 'delcat':
				require_once 'forms/Admin_craw.php';
				$this->add_form(new Admin_crawForm());
				break;
			default:
				require_once 'forms/Admin_craw.php';
				$this->add_form(new Admin_crawForm());		
				break;
		}				
	}
}
?>