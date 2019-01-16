<?php
class Admin_productForm extends Form{
	function Admin_productForm(){
		Form::Form('Admin_productForm');	
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
		
		unset($arr['form_block']);				
		$arr['title'] = System::getParam('title');
		$arr['brief'] = System::getParam('brief');
		$arr['des'] = System::getParam('des');
		if($arr['catid']){
			$row = DB::fetch("SELECT parentid FROM ".PREFIX_TABLE."product_cat WHERE catid = ".$arr['catid']);
			$arr['parentid'] = $row['parentid'];
		}
		
		$arr['uid'] = $_SESSION['adm_user']['uid'];
		$arr['author'] = $_SESSION['adm_user']['user'];
		$arr['time'] = TIME_NOW;
		
		$product_id = DB::insert(PREFIX_TABLE."product",$arr);
		
		if($product_id){			
			if($_FILES['image']['name']){
			
                 $img = ImageUrl::UploadItemImage($_FILES['image'],$product_id,array(298,610),'product');
				if(!is_int($img)){
					DB::update_id(PREFIX_TABLE."product",array('image'=>$img),$product_id);
				}else {
					$mes = ImageUrl::getErrorMsg($img);
					$this->setFormError('tbao',$mes);					
				}
			}						
		}else {
			$this->setFormError('tbao',"Không cập nhật được CSDL, Bạn thử lại!");
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
		if(isset($arr['old_image'])) unset($arr['old_image']);
		
		$arr['title'] = System::getParam('title');
		$arr['brief'] = System::getParam('brief');
		$arr['des'] = System::getParam('des');
		if($arr['catid']){
			$row = DB::fetch("SELECT parentid FROM ".PREFIX_TABLE."product_cat WHERE catid = ".$arr['catid']);
			$arr['parentid'] = $row['parentid'];
		}
		
		if($_FILES['image']['name']){
		
            $img = ImageUrl::UploadItemImage($_FILES['image'],$id,array(298,610),'product');
			if(!is_int($img)){
				$arr['image'] = $img;
				$old_image = System::getParam('old_image');
				//if($old_image) ImageUrl::DelproductImage($old_image);
			}else {
				$mes = ImageUrl::getErrorMsg($img);
				$this->setFormError('tbao',$mes);		
			}
		}
		$is_update = DB::update(PREFIX_TABLE."product",$arr,"id = $id");
		if(!$is_update){
			$this->setFormError('tbao',"Không c?p nh?t ???c CSDL, m?i b?n th? l?i!");
			$display->add('msg',$this->showFormErrorMessages(1));
		}	
		
		if($this->errNum){
			$display->add('msg',$this->showFormErrorMessages(1));

		}else {
			Url::redirect_url('webadmin.php?main='.CGlobal::$main.'&cmd=list');
		}		
	}
	
	function del(){
		$productids = (isset($_POST['selected_ids'])) ? $_POST['selected_ids'] : array();
		$ids = "";
		if(count($productids)>0){
			for($i=0;$i<count($productids);$i++){
				if($productids[$i]){
					$ids .= ($ids ? ',' : '').$productids[$i];
				}
			}

			DB::query("DELETE FROM ".PREFIX_TABLE."product WHERE id IN(".$ids.")");
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
					$item=DB::select(PREFIX_TABLE."product", "id = $id");
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
				$id = System::getParamInt('id');
				if($id) DB::delete(PREFIX_TABLE.'product',"id = $id");				
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
				
				if($s_catid){
					$where .= (empty($where)) ? " WHERE " : " AND ";
					$where .= " catid = $s_catid OR parentid = $s_catid ";
				}
				
				if(!empty($s_status)){
					$where .= (empty($where)) ? " WHERE " : " AND ";
					$where .= " status = $s_status ";
				}
			
				$sql=" SELECT COUNT(*) AS total_row FROM ". PREFIX_TABLE ."product $where";
				$total		= DB::fetch($sql,'total_row',0);				
				$arritem 	= array();
				if($total){
					$pagingData	= '';
					$limit 		= '';				
					$item_per_page  = 50;
					require_once ROOT_PATH.'core/Paging.php';
					Paging::page_admin($pagingData, $limit,$total, $item_per_page, 5,'page_no','webadmin.php');										
					$sql = "SELECT id, title, time, status,image,ord FROM ".PREFIX_TABLE."product $where ORDER BY ord, time DESC $limit";
					$arritem = DB::fetch_all($sql);
					$display->add("pagingData", $pagingData);
				}
				//$arritem = DB::select_all(PREFIX_TABLE."product","","time DESC");																
				$display->add('arritem',$arritem);
				$display->add('cmd',$cmd);
				break;
		}		
		
		$arrcat = DB::select_all(PREFIX_TABLE."product_cat","","ord ASC");				
			
		$display->add('main',CGlobal::$main);			
		$display->add('cmd',$cmd);			
		$display->add('arrcat',$arrcat);	
		$display->output('Admin_product');					
		//$this->endForm();
	}
	
}
?>