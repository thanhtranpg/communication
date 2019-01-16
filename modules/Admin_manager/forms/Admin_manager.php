<?php
class Admin_managerForm extends Form{
	function Admin_managerForm(){
		Form::Form('Admin_managerForm');	
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
		$arr['name'] = System::getParam('name');		
		$arr['user'] = System::getParam('user');				
		$arr['email'] = System::getParam('email');
		$arr['mobile'] = System::getParam('mobile');
		$pwd = System::getParam('pwd');
		if(!empty($pwd)) $arr['pwd'] = md5('hunghd_'.$pwd);
		//$arrmod = $_POST['arrmod'];
		$arrmod =isset($_POST['arrmod'])?$_POST['arrmod']:array();
		$arrmod[] = 'admin_login';
		$arr['mod'] = serialize($arrmod);
		
		
		$admin_id = DB::insert(PREFIX_TABLE."admin",$arr);
		
		if($admin_id){									
			Url::redirect_url('webadmin.php?main='.CGlobal::$main.'&cmd=list');
		}else {
			$this->setFormError('tbao',"Không cập nhật được CSDL, mời bạn thử lại!");
			$display->add('msg',$this->showFormErrorMessages(1));
		}				
	}
	
	function edit(){		
		$id = System::getParamInt('id');
		$arr['name'] = System::getParam('name');		
		$arr['user'] = System::getParam('user');				
		$arr['email'] = System::getParam('email');
		$arr['mobile'] = System::getParam('mobile');
		$pwd = System::getParam('pwd');
		if(!empty($pwd)) $arr['pwd'] = md5('hunghd_'.$pwd);
		$arrmod = $_POST['arrmod'];
		$arrmod[] = 'admin_login';
		$arr['mod'] = serialize($arrmod);
		
		$is_update = DB::update(PREFIX_TABLE."admin",$arr,"uid = $id");
		
		if($is_update){
			Url::redirect_url('webadmin.php?main='.CGlobal::$main.'&cmd=list');
		}else {
			$this->setFormError('tbao',"Không cập nhật được CSDL, mời bạn thử lại!");
			$display->add('msg',$this->showFormErrorMessages(1));
		}			
	}
	
	function del(){
		$adminids = (isset($_POST['selected_ids'])) ? $_POST['selected_ids'] : array();
		$ids = "";
		if(count($adminids)>0){
			for($i=0;$i<count($adminids);$i++){
				if($adminids[$i]){
					$ids .= ($ids ? ',' : '').$adminids[$i];
				}
			}
            
			DB::query("DELETE FROM ".PREFIX_TABLE."admin WHERE uid IN(".$ids.")");
			Url::redirect_url('webadmin.php?main='.CGlobal::$main.'&cmd=list');
		}
		
	}
		
	
	function draw(){
		//$this->beginForm(true);	
		global $display, $SetAdmMod;					
		$cmd = System::getParam('cmd');		
			
		switch ($cmd){
			case 'add':
			case 'edit':				
				$id = System::getParamInt('id');
				if($id){									
					$item=DB::select(PREFIX_TABLE."admin", "uid = $id");
					if(empty($item)){
						$this->setFormError('tbao',"ID không tồn tại!");
						$display->add('msg',$this->showFormErrorMessages(1));
					}					
				}else {
					$item = array(							
							'name'		=>'',
							'user'		=>'',
							'pwd'		=>'',							
							'email'		=>'',							
							'mobile'	=>'',
							'mod'		=>''
							);
				}
				$arrUserMod = (empty($item['mod'])) ? array() : unserialize($item['mod']);
				$arrMod = array();
				
				foreach ($SetAdmMod as $mod){
					$mod['selected'] = in_array($mod['modkey'],$arrUserMod) ? 1 : 0;	
					$arrMod[] = $mod;
				}
				
				$display->add('arrMod',$arrMod);	
				$display->add('item',$item);																	
				break;
			case 'del':	
				$id = System::getParamInt('id');
				if($id) DB::delete(PREFIX_TABLE.'admin',"uid = $id");				
				Url::redirect_url('webadmin.php?main='.CGlobal::$main.'&cmd=list');
				break;
			default:	
				$where = "WHERE uid > 1 ";
				
			
				$sql=" SELECT COUNT(*) AS total_row FROM ". PREFIX_TABLE ."admin $where";
				$total		= DB::fetch($sql,'total_row',0);				
				$arritem 	= array();
				if($total){
					$pagingData	= '';
					$limit 		= '';				
					$item_per_page  = 50;
					require_once ROOT_PATH.'core/Paging.php';
					Paging::page_admin($pagingData, $limit,$total, $item_per_page, 5,'page_no','webadmin.php');										
					$sql = "SELECT * FROM ".PREFIX_TABLE."admin $where ORDER BY uid $limit";
					$arritem = DB::fetch_all($sql);
					$display->add("pagingData", $pagingData);
				}
				//$arritem = DB::select_all(PREFIX_TABLE."admin","","time DESC");																
				$display->add('arritem',$arritem);
				$display->add('cmd',$cmd);
				break;
		}		
				
			
		$display->add('main',CGlobal::$main);			
		$display->add('cmd',$cmd);										
		$display->output('Admin_manager');					
		//$this->endForm();
	}
	
}
?>