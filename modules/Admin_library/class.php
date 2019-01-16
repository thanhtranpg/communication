<?php 
class Admin_library extends Module{
	function Admin_library($row){
		Module::Module($row);
		$cmd = System::getParam('cmd');
		switch ($cmd){
			case 'addcat':
			case 'editcat':
			case 'listcat':
			case 'delcat':
				require_once 'forms/Admin_library_cat.php';
				$this->add_form(new Admin_library_catForm());
				break;
			default:
				require_once 'forms/Admin_library.php';
				$this->add_form(new Admin_libraryForm());		
				break;
				
		}				
	}
}
?>