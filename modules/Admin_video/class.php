<?php 
class Admin_video extends Module{
	function Admin_video($row){
		Module::Module($row);		
		require_once 'forms/Admin_video.php';
		$this->add_form(new Admin_videoForm());		
	}
}
?>