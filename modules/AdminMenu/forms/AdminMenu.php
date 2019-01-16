<?php
class AdminMenuForm extends Form{
	function AdminMenuForm(){
		Form::Form('AdminMenuForm');							
	}	
	
	function draw(){
		//$this->beginForm();	
		global $display, $AccessMod;
				
		if(isset($_SESSION['adm_user'])){
			$display->add('AccessMod',$AccessMod);
		}
		$display->output('AdminMenu');					
		//$this->endForm();
	}
	
}
?>