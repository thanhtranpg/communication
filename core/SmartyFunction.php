<?php
function insert_getImageUrl($arr) {
	$img = trim($arr['img']);
	$path= trim($arr['path']);	
	return ImageUrl::getImageUrl(true,$img,$path);
}

function insert_getItemImage($arr) {
	$img 	= trim($arr['img']);
	$type	= trim($arr['type']);
	$id     = intval($arr['id']);
	$folder 	= trim($arr['folder']);
	return ImageUrl::getItemImage($type,true,true,$img,$id,$folder).'?v='.uniqid();
}

function insert_getImageNews($arr) {
	$img = trim($arr['img']);
	$type= trim($arr['type']);
	$id     = intval($arr['id']);
	return ImageUrl::getNewsImage($type,true,true,$img,$id);
}

function insert_formatTime($arr){	
	$time = intval($arr['time']);
	return date('d/m/Y H:s',$time);
}

function insert_numberFormat($arr){	
	$number = $arr['number'];	
	return number_format($number,0,',','.');
}

//lay url chuan
function get_url($str = ''){
	$params = explode('&',$str);
	$page = explode('=',$params[0]);
	$page = array_pop($page);
	$len  = count($params);
	$arr  = array();
	for($i=1;$i<$len;$i++){
	  $keys = explode('=', $params[$i]);
	  $arr[$keys[0]] = $keys[1];
	}
	return Url::build($page,$arr);;
}
?>