<?php
class Header extends Module{
	static $curMainCat = false, $curSubCat = false;
	function __construct($row){					
		Module::Module($row);		
		require_once 'forms/Header.php';
		//print_r($this);				
		$this->add_form(new HeaderForm);
		//self::on_draw();
	}		
}
?>