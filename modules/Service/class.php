<?php 
class Service extends Module{
	function Service($row){
		Module::Module($row);
		require_once 'forms/Service.php';
		$this->add_form(new ServiceForm());
		//self::on_draw();			
	}
}
?>