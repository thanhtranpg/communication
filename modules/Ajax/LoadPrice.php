<?php
	require_once '../../core/Module.php';
require_once '../../core/Form.php';
require_once '../../core/Debug.php';
require_once '../../core/config.php';
require_once '../../core/Init.php';
$id = System::getParam('id',1);
$from = System::getParam('from',0);
$to = System::getParam('to',0);
    $sql = "SELECT id, price FROM ".PREFIX_TABLE."transport_cost WHERE `from`=$from and `to`=$to and catid=$id limit 0,1";
	
	$arr = DB::fetch($sql);	
	if($arr)
echo 'Price :'.$arr['price'];
else
echo ('no price');
?>