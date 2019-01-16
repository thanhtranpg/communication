<?php
class Admin_footerForm extends Form{
	function __construct(){
		Form::Form('Admin_footerForm');
		
		
	}
	
	function draw(){
		global $display;
		if(!isset($_SESSION['adm_user'])){
			$row=DB::select(PREFIX_TABLE.'about_us', 'id = 8');
			$FooterContent =System::post_db_parse_html($row['des']);	
			$display->add('FooterContent',$FooterContent);
		}
	  	$display->output("Admin_footer");		  	
	}	
		
}

?>