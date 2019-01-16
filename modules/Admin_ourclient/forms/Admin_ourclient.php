<?php
class Admin_ourclientForm extends Form{
	private $catid = 10;
	function Admin_ourclientForm(){
		Form::Form('Admin_ourclientForm');	
		if(!CGlobal::$is_adminpage){
			Url::redirect();
		}					
	}	
	
	function on_submit(){
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
	
	function add(){
		$img_folder = 'ourclient';
		$arr = $_POST;
		unset($arr['form_block']);						
		$arr['title'] = System::getParam('title');
		$arr['catid'] = $this->catid;
		
		$adv_id = DB::insert(PREFIX_TABLE."adv",$arr);
		
		if($adv_id){			
			if($_FILES['image']['name']){
				$image = ImageUrl::UploadFile($_FILES['image'],$img_folder,$adv_id);
				DB::update_id(PREFIX_TABLE."adv",array('image'=>$img_folder.'/'.$image),$adv_id);
			}
			
			Url::redirect_url('webadmin.php?main='.CGlobal::$main.'&cmd=list');
		}else {
			$this->setFormError('tbao',"Không cập nhật được CSDL, mời bạn thử lại!");
			$display->add('msg',$this->showFormErrorMessages(1));
		}				
	}
	
	function edit(){
		$img_folder = 'ourclient';
		$id = System::getParamInt('id');
		$arr = $_POST;
		unset($arr['form_block']);
		if(isset($arr['old_image'])) unset($arr['old_image']);
		
		$arr['title'] = System::getParam('title');
		
		if($_FILES['image']['name']){					
			$old_image = System::getParam('old_image');
			if($old_image) @unlink(DIR_UPLOAD.$img_folder.'/'.$old_image);
			$arr["image"] = $img_folder.'/'.ImageUrl::UploadFile($_FILES['image'],$img_folder,$id);	
		}
		$is_update = DB::update(PREFIX_TABLE."adv",$arr,"id = $id");
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
				}
			}

			DB::query("DELETE FROM ".PREFIX_TABLE."adv WHERE id IN(".$ids.")");
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
					$item=DB::select(PREFIX_TABLE."adv", "id = $id");
					if(empty($item)){
						$this->setFormError('tbao',"ID không tồn tại!");
						$display->add('msg',$this->showFormErrorMessages(1));
					}
				}else {
					$item = array(
							'id'		=>'',
							'catid'		=>'',
							'title'		=>'',
							'link'		=>'',							
							'type'	=>'',							
							'image'		=>'',																		
							'ord'		=>'',																		
							'status'	=>1
							);
				}

				
				$display->add('item',$item);																	
				break;
			case 'del':	
				$id = System::getParamInt('id');
				if($id) DB::delete(PREFIX_TABLE.'adv',"id = $id");				
				Url::redirect_url('webadmin.php?main='.CGlobal::$main.'&cmd=list');
				break;
			default:	
				$keyword = trim(System::getParam('keyword'));				
				$s_status = System::getParam('s_status');
				$s_catid = System::getParamInt('s_catid');
				$where = " WHERE catid = " . $this->catid;
				if(!empty($keyword)){
					$where .= (empty($where)) ? " WHERE " : " AND ";
					$where .= " title LIKE '%$keyword%' ";
				}

				if(!empty($s_catid)){
					$where .= (empty($where)) ? " WHERE " : " AND ";
					$where .= " catid = $s_catid ";
				}			
				
				if(!empty($s_status)){
					$where .= (empty($where)) ? " WHERE " : " AND ";
					$where .= " status = $s_status ";
				}
			
				$sql=" SELECT COUNT(*) AS total_row FROM ". PREFIX_TABLE ."adv $where";
				$total		= DB::fetch($sql,'total_row',0);				
				$arritem 	= array();
				if($total){
					$pagingData	= '';
					$limit 		= '';				
					$item_per_page  = 50;
					require_once ROOT_PATH.'core/Paging.php';
					Paging::page_admin($pagingData, $limit,$total, $item_per_page, 5,'page_no','webadmin.php');										
					$sql = "SELECT * FROM ".PREFIX_TABLE."adv $where ORDER BY ord $limit";
					$arritem = DB::fetch_all($sql);
					$display->add("pagingData", $pagingData);
				}
				//$arritem = DB::select_all(PREFIX_TABLE."adv","","time DESC");																
				$display->add('arritem',$arritem);
				$display->add('cmd',$cmd);
				$display->add('s_catid',$s_catid);
				$display->add('s_status',$s_status);
				$display->add('keyword',$keyword);
				break;
		}		
				
			
		$display->add('main',CGlobal::$main);			
		$display->add('cmd',$cmd);				
		$display->add('adv_zone',CGlobal::$adv_zone);	
		$display->output('Admin_ourclient');					
		//$this->endForm();
	}
	
}
?>