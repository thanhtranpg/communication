<?php
	require_once '../../core/Module.php';
require_once '../../core/Form.php';
require_once '../../core/Debug.php';
require_once '../../core/config.php';
require_once '../../core/Init.php';
	$content='';
	$catid = System::getParamInt('catid',0);
	
	
	
	$sql = "SELECT * FROM ".PREFIX_TABLE."city WHERE parentid = $catid ORDER BY ord ASC";
			$result = DB::query($sql);	
			$arrItem = array();
			if($result){
			  $content=' <select name="district" id="district" style="height: 20px; width: 180px;" >
            	<option value="0">Chọn Quận Huyện</option>';
				while($row = mysql_fetch_assoc($result)){	
				     
					
					$content.=      '<option value="'.$row['title'].'"> ' .$row['title'].'</option>';  				
				}
				  
          $content.='</select>';
		}
                
          
		  echo  $content;
	
?>