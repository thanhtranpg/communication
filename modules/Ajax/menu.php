<?php
	require_once '../../core/Module.php';
require_once '../../core/Form.php';
require_once '../../core/Debug.php';
require_once '../../core/config.php';
require_once '../../core/Init.php';
	$content='';
	$cid = System::getParamInt('cid',0);
	$id = System::getParamInt('id',0);
	$catid_cat=DB::select(PREFIX_TABLE."product_cat", "catid = $cid");
	
	
	$sql = "SELECT * FROM ".PREFIX_TABLE."product_cat WHERE id=$id AND parentid=0";
			$result = DB::query($sql);	
			$arrItem = array();
			if($result){
			  $content='<select name="parentid" class="input_text" style="width:200px;">
            	<option value="0">Danh mục gốc</option>';
				while($row = mysql_fetch_assoc($result)){	
				     
					 if	($row['catid']	==	$catid_cat['parentid'])
					 $content.=      '<option value="'.$row['catid'].'" selected="selected" > ' .$row['title'].'</option>';  	
					 else
					$content.=      '<option value="'.$row['catid'].'"> ' .$row['title'].'</option>';  				
				}
				  
          $content.='</select>';
		}
	
               
                
          
		  echo  $content;
	
?>