<?php
class Admin_library_catForm extends Form{
	function Admin_library_catForm(){
		Form::Form('Admin_library_catForm');	
		if(!CGlobal::$is_adminpage){
			Url::redirect();
		}					
	}	
	
	function on_submit(){
		global $display;
		$cmd = System::getParam('cmd');	
		switch ($cmd){
			case 'addcat':
				self::add_library_cat();
				break;
			case 'editcat':
				self::edit_library_cat();
				break;
			case 'listcat':
				self::del_library_cat();
				break;
			default:
				
				break;			
		}
	}
	
	function add_library_cat(){
		$arr = $_POST;
		unset($arr['form_block']);
		$arr['title'] = System::getParam('title');
         $arr['url']= System::safe_title($arr['title']);
        
		$new_catid = DB::insert(PREFIX_TABLE."library_cat",$arr);
       
        if($new_catid){			
			if($_FILES['image']['name']){
			
                 $img = ImageUrl::UploadItemImage($_FILES['image'],$new_catid,array(150,298),'library_cat');
                 
				if(!is_int($img)){
				  
					DB::update(PREFIX_TABLE."library_cat",array('image'=>$img),"catid=".$new_catid);
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
	
	function edit_library_cat(){
		$catid = System::getParamInt('catid');
		$arr = $_POST;
		unset($arr['form_block']);
		$arr['title'] = System::getParam('title');
        if(isset($arr['old_image'])) unset($arr['old_image']);
      //  var_dump($_FILES);die;
        if($_FILES['image']['name']){
		
            $img = ImageUrl::UploadItemImage($_FILES['image'],$catid,array(150,298),'library_cat');
			if(!is_int($img)){
				$arr['image'] = $img;
				$old_image = System::getParam('old_image');
				//if($old_image) ImageUrl::DellibraryImage($old_image);
			}else {
				$mes = ImageUrl::getErrorMsg($img);
				$this->setFormError('tbao',$mes);		
			}
		}
       $arr['url']= System::safe_title($arr['title']);
        //var_dump($arr);
		$new_catid = DB::update(PREFIX_TABLE."library_cat",$arr,"catid = $catid");
		if($new_catid){
			Url::redirect_url('webadmin.php?main='.CGlobal::$main.'&cmd=listcat');
		}else {
			$this->setFormError('tbao',"Không cập nhật được CSDL, mời bạn thử lại!");
			$display->add('msg',$this->showFormErrorMessages(1));
		}			
	}
	
	function del_library_cat(){
		$ids = (isset($_POST['selected_ids'])) ? $_POST['selected_ids'] : array();
		$catids = "";
		if(count($ids)>0){
			for($i=0;$i<count($ids);$i++){
				if($ids[$i]){
					$id_del = $ids[$i];
					$catids .= ($catids ? ',' : '').$id_del;
					//Xoa tat ca cac tin thuoc catid nay
					DB::query("DELETE FROM ".PREFIX_TABLE."library WHERE catid = $id_del OR parentid = $id_del");
				}
			}			
			DB::query("DELETE FROM ".PREFIX_TABLE."library_cat WHERE catid IN(".$catids.")");
			Url::redirect_url('webadmin.php?main='.CGlobal::$main.'&cmd=listcat');
		}
		
	}
		
	
	function draw(){
	//	$this->beginForm();	
		global $display;			
		$cmd = System::getParam('cmd');	
		$arrcat = DB::select_all(PREFIX_TABLE."library_cat","","ord ASC");		
		switch ($cmd){
			case 'addcat':
			case 'editcat':
				$catid = System::getParamInt('catid');
				if($catid){									
					$item=DB::select(PREFIX_TABLE."library_cat", "catid = $catid");
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
					DB::query("DELETE FROM ".PREFIX_TABLE."library WHERE catid = $catid OR parentid = $catid");
					DB::delete(PREFIX_TABLE.'library_cat',"catid = $catid");				
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
		$display->output('Admin_library_cat');					
	//	$this->endForm();
	}
	
}
?>