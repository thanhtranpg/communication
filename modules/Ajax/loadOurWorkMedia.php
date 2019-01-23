<?php
require_once '../../core/Module.php';
require_once '../../core/Form.php';
require_once '../../core/Debug.php';
require_once '../../core/config.php';
require_once '../../core/Init.php';
global $display;
$id = System::getParam('id',0);
$type = System::getParam('type');
$where = ' Where status = 1';
if( !empty($id)){
	$where .= ' and catid = '.$id;
}

//$sql_count = "SELECT count(id) as total_row FROM ".PREFIX_TABLE."ourwork $where ";
//$total = DB::fetch($sql_count, 'total_row', 0);
$sql_img = "SELECT * FROM ".PREFIX_TABLE."ourwork_media $where and type = 'img'  ORDER BY id desc ";
$arr_img = DB::fetch_all($sql_img);
if(sizeof($arr_img) > 0){
	foreach ($arr_img as $img) {
		$display->add('first_img',$img);
		break;
	}
}
$sql_video = "SELECT * FROM ".PREFIX_TABLE."ourwork_media $where and type = 'video'  ORDER BY id desc ";
$arr_video = DB::fetch_all($sql_video);		
if(sizeof($arr_video) > 0){
	foreach ($arr_video as $video) {
		$display->add('first_video',$video);
		break;
	}
}

$ourwork = DB::select(PREFIX_TABLE."ourwork", "id = $id"); 

$display->add('ourwork',$ourwork);
$display->add('our_work_img',$arr_img);
$display->add('arr_video',$arr_video);
echo $display->output("Media");
?>