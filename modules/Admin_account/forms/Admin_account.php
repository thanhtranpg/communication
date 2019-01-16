<?php
class Admin_accountForm extends Form{
	function Admin_accountForm(){
		Form::Form('Admin_accountForm');	
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
		global $display;
		$arr = $_POST;
		$sql=" SELECT COUNT(*) AS total_row FROM ". PREFIX_TABLE ."account ";
				$total1		= DB::fetch($sql,'total_row',0);		
		unset($arr['form_block']);				
		$arr['title'] = System::getParam('title');
		$arr['brief'] = System::getParam('brief');
		$arr['des'] = System::getParam('des');		
		$arr['keyword'] = System::getParam('keyword');
		$arr['desciption'] = System::getParam('desciption');
		$arr['uid'] = $_SESSION['adm_user']['uid'];
		$arr['author'] = $_SESSION['adm_user']['user'];
		$arr['time'] = TIME_NOW;
		$arr['ord'] = $total1+1;
		
		$account_id = DB::insert(PREFIX_TABLE."account",$arr);
		
		if($account_id){			
			if($_FILES['image']['name']){
				$img = ImageUrl::UploadItemImage($_FILES['image'],$account_id,array(150,610),'account');
				if(!is_int($img)){
					DB::update_id(PREFIX_TABLE."account",array('image'=>$img),$account_id);
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
			Url::redirect_url('webadmin.php?main='.CGlobal::$main.'&cmd=list');
		}
	}
	
	function edit(){
		global $display;	
		$id = System::getParamInt('id');
		$arr = $_POST;
		unset($arr['form_block']);
		
		
		$is_update = DB::update(PREFIX_TABLE."account",$arr,"id = $id");
		if(!$is_update){
			$this->setFormError('tbao',"Không cập nhật được cơ sở dữ liệu!");
			$display->add('msg',$this->showFormErrorMessages(1));
		}	
		
		if($this->errNum){
			$display->add('msg',$this->showFormErrorMessages(1));

		}else {
			Url::redirect_url('webadmin.php?main='.CGlobal::$main.'&cmd=list');
		}		
	}
	
	function del(){
		$accountids = (isset($_POST['selected_ids'])) ? $_POST['selected_ids'] : array();
		$ids = "";
		if(count($accountids)>0){
			for($i=0;$i<count($accountids);$i++){
				if($accountids[$i]){
					$ids .= ($ids ? ',' : '').$accountids[$i];
				}
			}

			DB::query("DELETE FROM ".PREFIX_TABLE."account WHERE id IN(".$ids.")");
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
					$item=DB::select(PREFIX_TABLE."account", "id = $id");
					if(empty($item)){
						$this->setFormError('tbao',"ID tin không tồn tại!");
						$display->add('msg',$this->showFormErrorMessages(1));
					}
				}else {
					$item = array(
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
				$id = System::getParamInt('id');
				if($id) DB::delete(PREFIX_TABLE.'account',"id = $id");				
				Url::redirect_url('webadmin.php?main='.CGlobal::$main.'&cmd=list');
				break;
			default:	
				$keyword = trim(System::getParam('keyword'));
				$s_catid = System::getParamInt('s_catid');
				$s_status = System::getParam('s_status');
				$where = "";
				if(!empty($keyword)){
					$where .= (empty($where)) ? " WHERE " : " AND ";
					$where .= " title LIKE '%$keyword%' ";
				}
				
				
				if(!empty($s_status)){
					$where .= (empty($where)) ? " WHERE " : " AND ";
					$where .= " status = $s_status ";
				}
			
				$sql=" SELECT COUNT(*) AS total_row FROM ". PREFIX_TABLE ."account $where";
				$total		= DB::fetch($sql,'total_row',0);				
				$arritem 	= array();
				if($total){
					$pagingData	= '';
					$limit 		= '';				
					$item_per_page  = 50;
					require_once ROOT_PATH.'core/Paging.php';
					Paging::page_admin($pagingData, $limit,$total, $item_per_page, 5,'page_no','webadmin.php');										
					$sql = "SELECT  * FROM ".PREFIX_TABLE."account $where ORDER BY  id DESC $limit";
					$arritem = DB::fetch_all($sql);
					$display->add("pagingData", $pagingData);
				}
				//$arritem = DB::select_all(PREFIX_TABLE."account","","time DESC");																
				$display->add('arritem',$arritem);
				$display->add('cmd',$cmd);
				$display->add('s_status',$s_status);
				
				$sql=" SELECT COUNT(*) AS total_row FROM ". PREFIX_TABLE ."account ";
				$total1		= DB::fetch($sql,'total_row',0);				
				$display->add('total',$total1);
				break;
		}		
		
			
		$display->add('main',CGlobal::$main);			
		$display->add('cmd',$cmd);			
		$display->output('Admin_account');					
		//$this->endForm();
	}
	
}
?>