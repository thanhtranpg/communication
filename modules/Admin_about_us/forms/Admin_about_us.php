<?php
class Admin_about_usForm extends Form{
	function Admin_about_usForm(){
		Form::Form('Admin_about_usForm');	
		if(!CGlobal::$is_adminpage){
			Url::redirect();
		}		
	}	
	function on_submit(){
		global $display;
		$des = System::getParam('des');
		$id = System::getParamInt('id');		
		DB::update_id(PREFIX_TABLE.'about_us',array('des'=>$des),$id);				
	}
	
	function draw(){
		$this->beginForm();	
		global $display;	
		$arr_about_us = array(
			1=>'Address',
			2=>"Coypyright",
			3=>"Bảo trì website",
			4=>"About us",
			5=>"Service",
			6=>"Carrer",
			7=>"Contact us",
			8=>"Our Work"
		);
		$id = System::getParamInt('id');
		$id = (empty($id)) ? 1 : $id;
		if($id > count($arr_about_us)) Url::redirect();
		$cur_title = $arr_about_us[$id];
		
		$row=DB::select(PREFIX_TABLE.'about_us', 'id = '.$id);
		$des = $row['des'];
		$display->add('main',CGlobal::$main);	
		$display->add('des',$des);	
		$display->add('id',$id);			
		$display->add('arr_about_us',$arr_about_us);			
		$display->add('cur_title',$cur_title);			
		$display->output('Admin_about_us');					
		$this->endForm();
	}
	
}
?>