<?php
class Admin_headerForm extends Form{
	function __construct(){
		Form::Form('Admin_headerForm');
		
		
	}
	
	function draw(){
		global $display;		
		$display->add('url_root',WEB_ROOT);											
	  	$display->output("Admin_header");
		  	
	}	
}

?>