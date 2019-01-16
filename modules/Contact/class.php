<?php 
class Contact extends Module{
	function Contact($row){
		Module::Module($row);
		require_once 'forms/Contact.php';
		$this->add_form(new ContactForm());
		//self::on_draw();			
	}
}
?>