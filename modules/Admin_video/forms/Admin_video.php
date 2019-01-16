<?php
class Admin_videoForm extends Form{
	function Admin_videoForm(){
		Form::Form('Admin_videoForm');	
		if(!CGlobal::$is_adminpage){
			Url::redirect();
		}					
	}	
	
	function on_submit()
	{
		global $display;
		$cmd = System::getParam('cmd');			
		switch ($cmd){
			case 'add':
				self::add();
				break;
			case 'edit':				
				self::edit();				
				break;
			case 'list':
				self::del();
				break;
			default:
				
				break;			
		}
	}
	
	function add()
	{
		$img_folder = 'video';
		$arr = $_POST;
		unset($arr['form_block']);						
		$arr['title'] = System::getParam('title');	
		$arr['video'] = System::getParam('video');	
					
		$adv_id = DB::insert(PREFIX_TABLE."video",$arr);		
		   if($adv_id)
		    {			
			  
			 
			Url::redirect_url('webadmin.php?main='.CGlobal::$main.'&cmd=list');
		}else 
		{
			$this->setFormError('tbao',"Không cập nhật được CSDL, mời bạn thử lại!");
			$display->add('msg',$this->showFormErrorMessages(1));
		}				
	}
	
	function edit()
	{
		$img_folder = 'video';
		$id = System::getParamInt('id');
		$arr = $_POST;
		unset($arr['form_block']);
		if(isset($arr['old_image'])) unset($arr['old_image']);
		if(isset($arr['old_video'])) unset($arr['old_video']);				
		$arr['title'] = System::getParam('title');	
		$arr['video'] = System::getParam('video');		
		
		$is_update = DB::update(PREFIX_TABLE."video",$arr,"id = $id");
		if($is_update){
			Url::redirect_url('webadmin.php?main='.CGlobal::$main.'&cmd=list');
		}else {
			$this->setFormError('tbao',"Không cập nhật được CSDL, mời bạn thử lại!");
			$display->add('msg',$this->showFormErrorMessages(1));
		}			
	}
	
	function del(){
		$advids = (isset($_POST['selected_ids'])) ? $_POST['selected_ids'] : array();
		$ids = "";
		if(count($advids)>0){
			for($i=0;$i<count($advids);$i++){
				if($advids[$i]){
					$ids .= ($ids ? ',' : '').$advids[$i];
					$item=DB::select(PREFIX_TABLE."video", "id = $advids[$i]");
				unlink(DIR_UPLOAD.'video/'.$item['image']);	
				unlink(DIR_UPLOAD.'video/'.$item['video']);	
				}
			}

			DB::query("DELETE FROM ".PREFIX_TABLE."video WHERE id IN(".$ids.")");
			Url::redirect_url('webadmin.php?main='.CGlobal::$main.'&cmd=list');
		}
		
	}
		
	
	function draw(){
		//$this->beginForm(true);	
		global $display;					
		$cmd = System::getParam('cmd');		
			
		switch ($cmd){
			case 'add':
			case 'edit':				
				$id = System::getParamInt('id');
				if($id){									
					$item=DB::select(PREFIX_TABLE."video", "id = $id");
					if(empty($item)){
						$this->setFormError('tbao',"ID không tồn tại!");
						$display->add('msg',$this->showFormErrorMessages(1));
					}
				}else {
					$item = array(
							'id'		=>'',
							'catid'		=>'',
							'title'		=>'',
													
							'image'		=>'',																		
							'ord'		=>'',																		
							'status'	=>1
							);
				}

				
				$display->add('item',$item);																	
				break;
			case 'del':	
				$id = System::getParamInt('id');
				if($id) 
				{
				$item=DB::select(PREFIX_TABLE."video", "id = $id");
				unlink(DIR_UPLOAD.'video/'.$item['image']);	
				unlink(DIR_UPLOAD.'video/'.$item['video']);	
				DB::delete(PREFIX_TABLE.'video',"id = $id");
				}			
				Url::redirect_url('webadmin.php?main='.CGlobal::$main.'&cmd=list');
				break;
			default:	
			   
				$where = "";
				$keyword = trim(System::getParam('keyword'));				
				$s_status = System::getParamInt('s_status');
				
				
				if(!empty($keyword)){
					$where .= (empty($where)) ? " WHERE " : " AND ";
					$where .= " title LIKE '%$keyword%' ";
				}
                     
				
					
						
				
				if(!empty($s_status))
				{
					$where .= (empty($where)) ? " WHERE " : " AND ";
					$where .= " status = $s_status ";
				}
			
				$sql=" SELECT COUNT(*) AS total_row FROM ". PREFIX_TABLE ."video $where";
				$total		= DB::fetch($sql,'total_row',0);				
				$arritem 	= array();
				if($total){
					$pagingData	= '';
					$limit 		= '';				
					$item_per_page  = 50;
					require_once ROOT_PATH.'core/Paging.php';
					Paging::page_admin($pagingData, $limit,$total, $item_per_page, 5,'page_no','webadmin.php');										
					$sql = "SELECT  id, title,  status FROM ".PREFIX_TABLE."video $where ORDER BY id DESC $limit";
					$arritem = DB::fetch_all($sql);
					$display->add("pagingData", $pagingData);
				}
				//$arritem = DB::select_all(PREFIX_TABLE."adv","","time DESC");																
				$display->add('arritem',$arritem);
				$display->add('cmd',$cmd);
				$display->add('s_status',$s_status);
				$display->add('keyword',$keyword);
				break;
		}		
				
			
		$display->add('main',CGlobal::$main);			
		$display->add('cmd',$cmd);				
		$display->add('adv_zone',CGlobal::$adv_zone);	
		$display->output('Admin_video');					
		//$this->endForm();
	}
	
}
?>