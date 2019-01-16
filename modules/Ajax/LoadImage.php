<?php
require_once '../../core/Module.php';
require_once '../../core/Form.php';
require_once '../../core/Debug.php';
require_once '../../core/config.php';
require_once '../../core/Init.php';
$id = System::getParam('id');
$sql = "SELECT id, image, link, type FROM ".PREFIX_TABLE."adv WHERE status = 1 AND catid = $id ORDER BY ord limit 0,1";
			$arr = DB::fetch_all($sql);		
			$AdvContent = "";
			if (!empty($arr))
			{
			foreach ($arr as $item){
				$AdvContent .= '<div class="left_adv">';
				$AdvContent .= System::show_adv(DIR_UPLOAD.'adv/'.$item['image'],CGlobal::$adv_zone[$id]['w'],CGlobal::$adv_zone[$id]['h'],$item['link'],$item['type']);
				$AdvContent .= '</div>';
			}
			}
echo $AdvContent;
?>