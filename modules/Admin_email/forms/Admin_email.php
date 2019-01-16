<?php
class Admin_emailForm extends Form{
	function Admin_emailForm(){
		Form::Form('Admin_emailForm');	
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
		
	}
	
	function edit(){
		global $display;	
			
	}
	
	function del(){
		$catid = System::getParamInt('catid',1);
		$newsids = (isset($_POST['selected_ids'])) ? $_POST['selected_ids'] : array();
		$ids = "";
		if(count($newsids)>0){
			for($i=0;$i<count($newsids);$i++){
				if($newsids[$i]){
					$ids .= ($ids ? ',' : '').$newsids[$i];
				}
			}

			DB::query("DELETE FROM ".PREFIX_TABLE."email WHERE id IN(".$ids.")");
			Url::redirect_url('webadmin.php?main='.CGlobal::$main.'&cmd=list&catid='.$catid);
		}
		
	}
		
	
	function draw(){
		//$this->beginForm(true);	
		global $display;					
		$cmd = System::getParam('cmd');
		$catid = System::getParamInt('catid',1);
		$total = 0;		
			
		switch ($cmd){
			case 'add':
			case 'edit':				
				$id = System::getParamInt('id');
				if($id){									
					$item=DB::select(PREFIX_TABLE."email", "id = $id");
					if(empty($item)){
						$this->setFormError('tbao',"ID tin khÃ´ng tá»“n táº¡i!");
						$display->add('msg',$this->showFormErrorMessages(1));
					}
				}else {
					$item = array(
							'parentid'	=>'',
							'catid'		=>'',
							'id'		=>'',
							'title'		=>'',
							'brief'		=>'',
							'des'		=>'',							
							'source'	=>'',							
							'image'		=>'',																		
							'status'	=>1
							);
				}

				if(isset($item['uid'])){
					$row = DB::fetch("SELECT user FROM ".PREFIX_TABLE."admin WHERE uid = ".$item['uid']);
					$item['user'] = (!empty($row['user'])) ? $row['user'] : "";
				}						
				
				$display->add('item',$item);					
				
				break;
			case 'del':
				$catid = System::getParamInt('catid',1);	
				$id = System::getParamInt('id');
				if($id) DB::delete(PREFIX_TABLE.'email',"id = $id");				
				Url::redirect_url('webadmin.php?main='.CGlobal::$main.'&cmd=list&catid='.$catid);
				break;
			default:	
				$keyword = trim(System::getParam('keyword'));
				$s_catid = System::getParamInt('catid',1);
				$s_status = System::getParam('s_status');
				$where = " Where cat = $catid";
				if(!empty($keyword)){
					$where .= (empty($where)) ? " WHERE " : " AND ";
					$where .= "( fullname LIKE '%$keyword%' or email LIKE '%$keyword%' or company LIKE '%$keyword%' or content LIKE '%$keyword%' )";
				}

				if(!empty($s_status)){
					$where .= (empty($where)) ? " WHERE " : " AND ";
					$where .= " status = $s_status ";
				}
			
				$sql=" SELECT COUNT(*) AS total_row FROM ". PREFIX_TABLE ."email $where";
				$total		= DB::fetch($sql,'total_row',0);				
				$arritem 	= array();
				if($total){
					$pagingData	= '';
					$limit 		= '';				
					$item_per_page  = 30;
					require_once ROOT_PATH.'core/Paging.php';
					Paging::page_admin($pagingData, $limit,$total, $item_per_page, 5,'page_no','webadmin.php');										
					$sql = "SELECT * FROM ".PREFIX_TABLE."email $where ORDER BY time DESC $limit";
					$arritem = DB::fetch_all($sql);
					$display->add("pagingData", $pagingData);
				}
				//$arritem = DB::select_all(PREFIX_TABLE."news","","time DESC");																
				$display->add('arritem',$arritem);
				$display->add('cmd',$cmd);
				$display->add('s_catid',$s_catid);
				
				break;
		}		
		
			
			
		$display->add('main',CGlobal::$main);			
		$display->add('cmd',$cmd);
		$display->add('total',$total);			
	
		$display->output('Admin_email');					
		//$this->endForm();
	}
	
}
?>