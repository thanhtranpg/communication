<?php
class Admin_slideForm extends Form{
	function Admin_slideForm(){
		Form::Form('Admin_slideForm');	
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
			case 'editslide':				
				self::edit();				
				break;
			case 'del':
				self::del();
				break;
			default:
				self::del();
				self::add();
				
				break;
					
		}
	}
	
	function add()
	{
		$cmd = $_GET['cmd'];
		$img_folder = 'ourwork_slide';
		$arr = $_POST;
		$id = System::getParamInt('id');
		unset($arr['form_block']);						
		$arr['title'] = System::getParam('title');	
		$arr['catid']=$id;
		$arr['type']=$cmd;
		$adv_id = DB::insert(PREFIX_TABLE."ourwork_slide",$arr);		
		  if($adv_id){			
			if($_FILES['image']['name']){
				$img = ImageUrl::UploadItemImage($_FILES['image'],$adv_id,array(610,1680),$img_folder);
				if(!is_int($img)){
					DB::update_id(PREFIX_TABLE."ourwork_slide",array('media'=>$img),$adv_id);
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
		
			Url::redirect_url('webadmin.php?main='.CGlobal::$main.'&cmd='.$cmd.'&id='.$id);
		}			
	}
	
	function edit()
	{
		$img_folder = 'ourwork_slide';
		$cid = System::getParamInt('cid');
		$id = System::getParamInt('id');
		$arr = $_POST;
		unset($arr['form_block']);
		if(isset($arr['old_image'])) unset($arr['old_image']);
					
		$arr['title'] = System::getParam('title');		
		
		if($_FILES['image']['name']){
			$img = ImageUrl::UploadItemImage($_FILES['image'],$cid,array(610,1680),$img_folder);
			if(!is_int($img)){
				$arr['media'] = $img;
				$old_image = System::getParam('old_image');
				
			}else {
				$mes = ImageUrl::getErrorMsg($img);
				$this->setFormError('tbao',$mes);		
			}
		}
		
		$is_update = DB::update(PREFIX_TABLE."ourwork_slide",$arr,"id = $cid");
		if($is_update){
			Url::redirect_url('webadmin.php?main='.CGlobal::$main.'&cmd=slide&id='.$id);
		}else {
			$this->setFormError('tbao',"Không cập nhật được CSDL, mời bạn thử lại!");
			$display->add('msg',$this->showFormErrorMessages(1));
		}			
	}
	
	function del(){
		$id = System::getParamInt('id');
		$advids = (isset($_POST['selected_ids'])) ? $_POST['selected_ids'] : array();
		
		$ids = "";
		if(count($advids)>0){
			for($i=0;$i<count($advids);$i++){
				if($advids[$i]){
					$ids .= ($ids ? ',' : '').$advids[$i];
					DB::query("DELETE FROM ".PREFIX_TABLE."ourwork_slide WHERE id IN(".$ids.")");
				//unlink(DIR_UPLOAD.'ourwork_image/'.$item['image']);	
				
				}
			}
			//DB::query("DELETE FROM ".PREFIX_TABLE."image WHERE id IN(".$ids.")");
			Url::redirect_url('webadmin.php?main='.CGlobal::$main.'&cmd=slide&id='.$id);
		}
		
	}
		
	
	function draw(){
		//$this->beginForm(true);	
		global $display;					
		$cmd = System::getParam('cmd');		
			
		switch ($cmd){
			case 'addslide':
			case 'editslide':
				$cid = System::getParamInt('cid');
				if($cid){									
					$item=DB::select(PREFIX_TABLE."ourwork_slide", "id = $cid");
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

				
				$display->add('item_adjust',$item);																	
				break;
			case 'delslide':	
				$id = System::getParamInt('id');
				$cid = System::getParamInt('cid');
				if($id) 
				{
				$item=DB::select(PREFIX_TABLE."ourwork_slide", "id = $cid");
				//unlink(DIR_UPLOAD.'image/'.$item['image']);	
				
				DB::delete(PREFIX_TABLE.'ourwork_slide',"id = $cid");
				}			
				Url::redirect_url('webadmin.php?main='.CGlobal::$main.'&cmd=slide&id='.$id);
				break;
			default:	
			
			
			}
			   $id = System::getParamInt('id');
				$where = "where catid = ".$id." and type = 'slide'";
				$sql=" SELECT COUNT(*) AS total_row FROM ". PREFIX_TABLE ."ourwork_slide $where";
				$total		= DB::fetch($sql,'total_row',0);				
				$arritem 	= array();
				if($total){
					$pagingData	= '';
					$limit 		= '';				
					$item_per_page  = 50;
					require_once ROOT_PATH.'core/Paging.php';
					Paging::page_admin($pagingData, $limit,$total, $item_per_page, 5,'page_no','webadmin.php');										
					$sql = "SELECT  * FROM ".PREFIX_TABLE."ourwork_slide $where ORDER BY ord asc $limit";
					$arritem = DB::fetch_all($sql);
					$display->add("pagingData", $pagingData);
				}
				
				$display->add('arritem',$arritem);
				$display->add('cmd',$cmd);
				$display->add('id',$id);
				
				
				$item_title=DB::select(PREFIX_TABLE."ourwork_cat", "catid = $id");
				$display->add('item_title',$item_title);
			
		$id = System::getParamInt('id');
		$display->add('total',$total);
		$display->add('id',$id);
		$display->add('main',CGlobal::$main);			
		$display->add('cmd',$cmd);				
		$display->add('adv_zone',CGlobal::$adv_zone);	
		$display->output('Admin_slide');					
		//$this->endForm();
	}
	
}
?>