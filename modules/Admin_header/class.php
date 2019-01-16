<?php
class Admin_header extends Module{
	static $curMainCat = false, $curSubCat = false;
	function __construct($row){					
		Module::Module($row);		
		require_once 'forms/Admin_header.php';				
		$this->add_form(new Admin_headerForm);		
	}		
}
?>