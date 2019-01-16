<?php

require_once '../../core/Module.php';
require_once '../../core/Form.php';
require_once '../../core/Debug.php';
require_once '../../core/config.php';
require_once '../../core/Init.php';

$cmd= System::getParam('cmd');
		switch ($cmd){
		case 'down':
		 echo down();
		break;
		case 'up':
		 echo up();
		break;
		}
		
		function up(){
		
		$id= System::getParamInt('id');
		$ord= System::getParamInt('ord');	
		$arr= array();
		$arr1= array();
		$arr['ord']=$ord;
		
		$new_1 = DB::update(PREFIX_TABLE."news",$arr,"ord = $ord +1");
		$arr1['ord']=$ord + 1;
		$new_catid = DB::update(PREFIX_TABLE."news",$arr1,"id = $id");
		echo 1;
		}
		
		function down(){
		
		$id= System::getParamInt('id');
		$ord= System::getParamInt('ord');	
		$arr= array();
		$arr1= array();
		$arr['ord']=$ord;
		
		$new_1 = DB::update(PREFIX_TABLE."news",$arr,"ord = $ord -1");
		$arr1['ord']=$ord -1;
		$new_catid = DB::update(PREFIX_TABLE."news",$arr1,"id = $id");
		echo $new_catid;
		}
?>
