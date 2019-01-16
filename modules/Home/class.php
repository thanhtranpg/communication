<?php 
class Home extends Module{
	function Home($row){
		Module::Module($row);
		
		
		require_once 'forms/Home.php';
		$this->add_form(new HomeForm());
		//self::on_draw();			
	}
}
?>