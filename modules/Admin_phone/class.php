<?php 
class Admin_phone extends Module{
	function Admin_phone($row){
		Module::Module($row);
		$cmd = System::getParam('cmd');
		switch ($cmd){
			case 'addcat':
			case 'editcat':
			case 'listcat':
			case 'delcat':
				require_once 'forms/Admin_news_cat.php';
				$this->add_form(new Admin_news_catForm());
				break;
			default:
				require_once 'forms/Admin_phone.php';
				$this->add_form(new Admin_phoneForm());		
				break;
				
		}				
	}
}
?>