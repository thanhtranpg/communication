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
if( !empty($type)){
	$where .= ' and type = "'.$type.'"';
}

//$sql_count = "SELECT count(id) as total_row FROM ".PREFIX_TABLE."ourwork $where ";
//$total = DB::fetch($sql_count, 'total_row', 0);
$sql = "SELECT * FROM ".PREFIX_TABLE."ourwork_media $where  ORDER BY id desc ";
$arr = DB::fetch_all($sql);		
$our_work_content = "";
if (!empty($arr))
{
	foreach ($arr as $item){

	}
}
$display->add('our_work_contents',$arr);
echo $display->output("Media");
?>