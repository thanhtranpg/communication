<?php 
class Event extends Module{
	function Event($row){
		Module::Module($row);
		require_once 'forms/Event.php';
		$this->add_form(new EventForm());
		//self::on_draw();			
	}
}
?>