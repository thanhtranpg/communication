<?php
class Admin_configForm extends Form{
	function Admin_configForm(){
		Form::Form('Admin_configForm');	
		if(!CGlobal::$is_adminpage){
			Url::redirect();
		}		
	}	
	
	function on_submit(){
		global $display;
		$array_config = $_POST;
		unset($array_config['form_block']);		
		$array_config['rewrite']=System::getParamInt('rewrite',0);
		$data_config = serialize($array_config);
		DB::update_id(PREFIX_TABLE.'config',array('config'=>$data_config),1);	
		
		if(DB::affected_rows()){	
			//Tao lai cache
//			ArrCache::del_cache('website_config');
//			if(ArrCache::is_not_cached('website_config',0)){
//				 ArrCache::set($array_config);
//			}	
			@file_put_contents(DIR_CACHE.'arr/website_config.php',$data_config);
			$this->setFormError('tbao',"Cập nhật thành công!");
			$display->add('msg',$this->showFormErrorMessages(1,'Thông báo'));
		}else {
			$this->setFormError('tbao',"Không cập nhật được CSDL, mời bạn thử lại!");
			$display->add('msg',$this->showFormErrorMessages(1));
		}				
	}
	
	function draw(){
		$this->beginForm();	
		global $display;	
		$row=DB::select(PREFIX_TABLE.'config', 'id = 1');
		$arr = unserialize($row['config']);
		$display->add('item',$arr);			
		$display->output('Admin_config');					
		$this->endForm();
	}
	
}
?>