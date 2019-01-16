<?php
class Admin_footer extends Module{	
	function __construct($row){					
		Module::Module($row);		
		require_once 'forms/Admin_footer.php';
		//print_r($this);				
		$this->add_form(new Admin_footerForm);
		//self::on_draw();
	}		
}
?>