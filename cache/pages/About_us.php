<?php 
System::$main = array('name'=>'About_us',);
System::$blocks = array(0=>array('name'=>'Header',),1=>array('name'=>'About_us',),2=>array('name'=>'Footer',),);
foreach(System::$blocks as &$block){
	if(file_exists(DIR_MODULE.$block['name'].'/class.php')){
		require_once DIR_MODULE.$block['name'].'/class.php';
		$block['object'] = new $block['name']($block['name']);
		
		if(isset($_POST['form_block']) && $_POST['form_block'] == $block['name']){
			$block['object']->submit();
		}
	}
}
require_once ROOT_PATH."core/PageBegin.php" ?>
<?php if(isset(System::$blocks[0]['object'])) System::$blocks[0]['object']->on_draw();?>
<?php if(isset(System::$blocks[1]['object'])) System::$blocks[1]['object']->on_draw();?>
<?php if(isset(System::$blocks[2]['object'])) System::$blocks[2]['object']->on_draw();?>
<?php require_once ROOT_PATH.'core/PageEnd.php' ?>