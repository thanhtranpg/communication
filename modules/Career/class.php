<?php 
class Career extends Module{
	function Career($row){
		Module::Module($row);
		require_once 'forms/Career.php';
		$this->add_form(new CareerForm());
		//self::on_draw();			
	}
}
?>