<?php
class MaintenanceForm extends Form{
	function MaintenanceForm(){
		Form::Form('MaintenanceForm');	
        
       $PageTitle= 'Công ty cổ phần dược phẩm PQA, Thuốc Nam PQA, Thuốc đông y pqa';    	
		CGlobal::$website_title = $PageTitle;		 
			
		//$this->link_css('style/styles.css');		
	}	
	
	function draw(){
		//$this->beginForm();	
		global $display;
		$row=DB::select(PREFIX_TABLE.'about_us', 'id = 3');
		$Content = System::post_db_parse_html($row['des']);							
		$display->add('Content',$Content);
		$display->output('Maintenance');					
		//$this->endForm();
	}
	
}
?>