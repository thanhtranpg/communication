<?php
class Admin_imageForm extends Form{
	function Admin_imageForm(){
		Form::Form('Admin_imageForm');	
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
			case 'editimg':				
				self::edit();				
				break;
			case 'list':
				self::del();
				break;
			default:
				self::add();
				break;
					
		}
	}
	
	function add()
	{
		$img_folder = 'image';
		$arr = $_POST;
		$id = System::getParamInt('id');
		unset($arr['form_block']);						
		$arr['title'] = System::getParam('title');	
		$arr['catid']=$id;			
		$adv_id = DB::insert(PREFIX_TABLE."image",$arr);		
		  if($adv_id){			
			if($_FILES['image']['name']){
				$img = ImageUrl::UploadImage($_FILES['image'],'image',$adv_id);
				if(!is_int($img)){
					DB::update_id(PREFIX_TABLE."image",array('image'=>$img),$adv_id);
				}else {
					$mes = ImageUrl::getErrorMsg($img);
					$this->setFormError('tbao',$mes);					
				}
			}						
		}else {
			$this->setFormError('tbao',"Không cập nhật được cơ sở dữ liệu!");
			$display->add('msg',$this->showFormErrorMessages(1));
		}

		if($this->errNum){
			$display->add('msg',$this->showFormErrorMessages(1));

		}else {
		
			Url::redirect_url('webadmin.php?main='.CGlobal::$main.'&cmd=img&id='.$id);
		}			
	}
	
	function edit()
	{
		$img_folder = 'image';
		$cid = System::getParamInt('cid');
		$id = System::getParamInt('id');
		$arr = $_POST;
		unset($arr['form_block']);
		if(isset($arr['old_image'])) unset($arr['old_image']);
					
		$arr['title'] = System::getParam('title');		
		
		if($_FILES['image']['name']){
			$img = ImageUrl::UploadImage($_FILES['image'],'image',$cid);
			if(!is_int($img)){
				$arr['image'] = $img;
				$old_image = System::getParam('old_image');
				
			}else {
				$mes = ImageUrl::getErrorMsg($img);
				$this->setFormError('tbao',$mes);		
			}
		}
		
		$is_update = DB::update(PREFIX_TABLE."image",$arr,"id = $cid");
		if($is_update){
			Url::redirect_url('webadmin.php?main='.CGlobal::$main.'&cmd=img&id='.$id);
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
					$item=DB::select(PREFIX_TABLE."image", "id = $advids[$i]");
				unlink(DIR_UPLOAD.'image/'.$item['image']);	
				
				}
			}
echo ($ids);
			//DB::query("DELETE FROM ".PREFIX_TABLE."image WHERE id IN(".$ids.")");
			Url::redirect_url('webadmin.php?main='.CGlobal::$main.'&cmd=list');
		}
		
	}
		
	
	function draw(){
		//$this->beginForm(true);	
		global $display;					
		$cmd = System::getParam('cmd');		
			
		switch ($cmd){
			case 'addimg':
			case 'editimg':				
				$cid = System::getParamInt('cid');
				if($cid){									
					$item=DB::select(PREFIX_TABLE."image", "id = $cid");
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
			case 'delimg':	
				$id = System::getParamInt('id');
				$cid = System::getParamInt('cid');
				if($id) 
				{
				$item=DB::select(PREFIX_TABLE."image", "id = $cid");
				unlink(DIR_UPLOAD.'image/'.$item['image']);	
				
				DB::delete(PREFIX_TABLE.'image',"id = $cid");
				}			
				Url::redirect_url('webadmin.php?main='.CGlobal::$main.'&cmd=img&id='.$id);
				break;
			default:	
			
			
			}
			   $id = System::getParamInt('id');
				$where = "where catid = ".$id;
				
			
				$sql=" SELECT COUNT(*) AS total_row FROM ". PREFIX_TABLE ."image $where";
				$total		= DB::fetch($sql,'total_row',0);				
				$arritem 	= array();
				if($total){
					$pagingData	= '';
					$limit 		= '';				
					$item_per_page  = 50;
					require_once ROOT_PATH.'core/Paging.php';
					Paging::page_admin($pagingData, $limit,$total, $item_per_page, 5,'page_no','webadmin.php');										
					$sql = "SELECT  id, title, image, status FROM ".PREFIX_TABLE."image $where ORDER BY id DESC $limit";
					$arritem = DB::fetch_all($sql);
					$display->add("pagingData", $pagingData);
				}
				//$arritem = DB::select_all(PREFIX_TABLE."adv","","time DESC");																
				$display->add('arritem',$arritem);
				$display->add('cmd',$cmd);
				$display->add('id',$id);
				
				
				//$item_title=DB::select(PREFIX_TABLE."flat", "id = $id");
				//$display->add('item_title',$item_title);
			
			
		$display->add('main',CGlobal::$main);			
		$display->add('cmd',$cmd);				
		$display->add('adv_zone',CGlobal::$adv_zone);	
		$display->output('Admin_image');					
		//$this->endForm();
	}
	
}
?>