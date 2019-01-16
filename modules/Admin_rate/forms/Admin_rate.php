<?php
class Admin_rateForm extends Form{
	function Admin_rateForm(){
		Form::Form('Admin_rateForm');	
		if(!CGlobal::$is_adminpage){
			Url::redirect();
		}					
	}	
	
	function on_submit(){
		global $display;
		$cmd = System::getParam('cmd');	
		switch ($cmd){
			case 'addcat':
				self::add_rate();
				break;
			case 'editcat':
				self::edit_rate();
				break;
			case 'listcat':
				self::del_rate();
				break;
			default:
				
				break;			
		}
	}
	
	function add_rate(){
		$arr = $_POST;
		unset($arr['form_block']);
		$arr['title'] = System::getParam('title');
        
       
		$new_catid = DB::insert(PREFIX_TABLE."rate",$arr);
        
        if($new_catid){			
			if($_FILES['image']['name']){
			
                 $img = ImageUrl::UploadItemImage($_FILES['image'],$new_catid,array(150,610),'rate');
                 
				if(!is_int($img)){
				  
					DB::update(PREFIX_TABLE."rate",array('image'=>$img),"id=".$new_catid);
				}else {
					$mes = ImageUrl::getErrorMsg($img);
					$this->setFormError('tbao',$mes);					
				}
			}						
		}else {
			$this->setFormError('tbao',"Không kết nối được CSDL!");
			$display->add('msg',$this->showFormErrorMessages(1));
		}
        
        
		if($new_catid){
			Url::redirect_url('webadmin.php?main='.CGlobal::$main.'&cmd=listcat');
		}else {
			$this->setFormError('tbao',"Không cập nhật được CSDL, mời bạn thử lại!");
			$display->add('msg',$this->showFormErrorMessages(1));
		}				
	}
	
	function edit_rate(){
		$catid = System::getParamInt('catid');
		$arr = $_POST;
		unset($arr['form_block']);
		$arr['title'] = System::getParam('title');
        if(isset($arr['old_image'])) unset($arr['old_image']);
      //  var_dump($_FILES);die;
        if($_FILES['image']['name']){
		
            $img = ImageUrl::UploadItemImage($_FILES['image'],$catid,array(150,610),'rate');
			if(!is_int($img)){
				$arr['image'] = $img;
				$old_image = System::getParam('old_image');
				//if($old_image) ImageUrl::DelNewsImage($old_image);
			}else {
				$mes = ImageUrl::getErrorMsg($img);
				$this->setFormError('tbao',$mes);		
			}
		}
       $arr['url']= System::safe_title($arr['title']);
        //var_dump($arr);
		$new_catid = DB::update(PREFIX_TABLE."rate",$arr,"id = $catid");
		if($new_catid){
			Url::redirect_url('webadmin.php?main='.CGlobal::$main.'&cmd=listcat');
		}else {
			$this->setFormError('tbao',"Không cập nhật được CSDL, mời bạn thử lại!");
			$display->add('msg',$this->showFormErrorMessages(1));
		}			
	}
	
	function del_rate(){
		$ids = (isset($_POST['selected_ids'])) ? $_POST['selected_ids'] : array();
		$catids = "";
		if(count($ids)>0){
			for($i=0;$i<count($ids);$i++){
				if($ids[$i]){
					$id_del = $ids[$i];
					$catids .= ($catids ? ',' : '').$id_del;
					//Xoa tat ca cac tin thuoc catid nay
				
				}
			}			
			DB::query("DELETE FROM ".PREFIX_TABLE."rate WHERE id IN(".$catids.")");
			Url::redirect_url('webadmin.php?main='.CGlobal::$main.'&cmd=listcat');
		}
		
	}
		
	
	function draw(){
	//	$this->beginForm();	
		global $display;			
		$cmd = System::getParam('cmd');	
		$arrcat = DB::select_all(PREFIX_TABLE."rate","","gold DESC,silver DESC,bronze DESC,ord DESC");		
		switch ($cmd){
			case 'addcat':
			case 'editcat':
				$catid = System::getParamInt('catid');
				if($catid){									
					$item=DB::select(PREFIX_TABLE."rate", "id = $catid");
					if(empty($item)){
						$this->setFormError('tbao',"Danh mục tin không tồn tại!");
						$display->add('msg',$this->showFormErrorMessages(1));
					}
				}else {
					$item = array(
							'parentid'=>'',
							'catid'=>'',
							'title'=>'',
							'ord'=>'',
							'status'=>1
							);
				}
				$display->add('item',$item);	
				$display->add('arrcat',$arrcat);	
				
				break;
			case 'delcat':	
				$catid = System::getParamInt('catid');
				if($catid) {
					//Xoa tat ca cac tin thuoc catid nay
				
					DB::delete(PREFIX_TABLE.'rate',"id = $catid");				
				}
				Url::redirect_url('webadmin.php?main='.CGlobal::$main.'&cmd=listcat');
				break;
			default:	
				$display->add('listcat',$arrcat);
				break;
		}
		
		$row=DB::select(PREFIX_TABLE.'config', 'id = 1');
		$arr = unserialize($row['config']);					
		$display->add('main',CGlobal::$main);			
		$display->add('cmd',$cmd);			
		$display->output('Admin_rate');					
	//	$this->endForm();
	}
	
}
?>