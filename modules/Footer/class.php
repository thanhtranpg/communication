<?php
class Footer extends Module{	
	function __construct($row){					
		Module::Module($row);		
		require_once 'forms/Footer.php';
		//print_r($this);				
		$this->add_form(new FooterForm);
		//self::on_draw();
	}		
}
?>