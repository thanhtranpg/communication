<?php 
class About_us extends Module{
	function About_us($row){
		Module::Module($row);
		require_once 'forms/About_us.php';
		$this->add_form(new About_usForm());
		//self::on_draw();			
	}
}
?>