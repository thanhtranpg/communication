<?php
	require_once '../../core/Module.php';
require_once '../../core/Form.php';
require_once '../../core/Debug.php';
require_once '../../core/config.php';
require_once '../../core/Init.php';
	$content='';
	$id = System::getParamInt('id');
	$catid = System::getParamInt('catid',0);
	$sql = "SELECT * FROM ".PREFIX_TABLE."product_cat WHERE id=$id ";
			$result = DB::query($sql);
			
			$arrItem = array();
			if($result){
			  $content='<select id="catid" name="catid" class="input_text" style="width:200px;">
            	<option value="0">...Chọn danh mục</option>';
				while($row = mysql_fetch_assoc($result))
				{
				   
					if 	($row['parentid']==0)	
					 if ($row['catid']==$catid)	
					$content.= '<option value="'.$row['catid'].'"  style="font-weight:bold" selected="selected"  >'.$row['title'].'</option>';
					 else
					 $content.= '<option value="'.$row['catid'].'"  style="font-weight:bold"  >'.$row['title'].'</option>';
					$sql2 = "SELECT * FROM ".PREFIX_TABLE."product_cat WHERE id=$id ";
					$result2 = DB::query($sql2);	
				    while($row2 = mysql_fetch_assoc($result2))
					
				      {	if 	($row2['parentid']==$row['catid']){	
					  
					  	if ($row2['catid']==$catid)
					$content.= '<option value="'.$row2['catid'] .'" selected="selected" >&nbsp;&nbsp;&nbsp;&nbsp;&raquo;'.$row2['title'].'</option>';	
					  else
					  $content.= '<option value="'.$row2['catid'] .'">&nbsp;&nbsp;&nbsp;&nbsp;&raquo;'.$row2['title'].'</option>';
					}		
				      }			
				}
				  
				
          $content.='</select>';
		}
	
               
                
          
		  echo  $content;
	
?>



