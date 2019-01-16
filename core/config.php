<?php
define('TIME_NOW',time());
$url = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME'])."/";
define( 'ROOT_PATH', str_replace(basename(dirname( __FILE__ )),"",dirname( __FILE__ )));
$full_path_to_public_program = ROOT_PATH;
$weblink=str_replace('\\','/','http://'.$_SERVER['HTTP_HOST']);
$webroot=str_replace('\\','/','http://'.$_SERVER['HTTP_HOST'].(dirname($_SERVER['SCRIPT_NAME'])?dirname($_SERVER['SCRIPT_NAME']):''));
$webroot.=$webroot[strlen($webroot)-1]!='/'?'/':'';
define('WEB_ROOT',$webroot);
unset($webroot);
define('WEB_DIR','');

define('STATIC_URL',$url);

$set_chmod = "0777";
$set_charset = "utf-8";

//define('CACHE_ON', 1);
//define('REWRITE_ON',0);
define('PREFIX_TABLE','phpclass_');
define('DIR_CACHE', ROOT_PATH."cache/");
define('DIR_MODULE', ROOT_PATH."modules/");
define('DIR_TEMPLATE', ROOT_PATH."templates/");
define('DIR_BLOCKS', "blocks/");
define('DIR_UPLOAD', "uploads/");
define('URL_UPLOAD', $weblink.'/'.DIR_UPLOAD);

// Master server DB
define('DB_MASTER_SERVER','localhost');
define('DB_MASTER_USER','root');
define('DB_MASTER_PASSWORD','');
define('DB_MASTER_NAME','communication.com');


//Set default charset DB : LATIN / UTF8
define('DB_CHARSET','UTF8');
?>