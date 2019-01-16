<?php
ob_start();//start buffering
//@ob_start('ob_gzhandler');
require_once ROOT_PATH.'core/language/vie.inc';
require_once ROOT_PATH.'core/CGlobal.php';
require_once ROOT_PATH.'core/Str.php';
require_once ROOT_PATH.'core/DB.php';
require_once ROOT_PATH.'core/StaticCache.php';
require_once ROOT_PATH.'core/ArrCache.php';
require_once ROOT_PATH.'core/ImageURL.php';
require_once ROOT_PATH.'core/SmartyFunction.php';
require_once ROOT_PATH.'core/Time.php';
require_once ROOT_PATH.'core/phpmail.php';
//if(isset($_REQUEST['trigger']) && (int)$_REQUEST['trigger']==1){
//	exit();
//}

$is_search_engine_array = array("Google", "Fast", "Slurp", "Ink", "Atomz", "Scooter", "Crawler", "MSNbot", "Poodle", "Genius");
$is_search_engine = 0;
foreach($is_search_engine_array as $key => $val){
	if(strstr($_SERVER['HTTP_USER_AGENT'], $val))
	$is_search_engine++;
}

if(isset($_GET['main']) && $_GET['main']=='error'){
	define('ERROR_PAGE',1);
}else{
	define('ERROR_PAGE',0);
}

if($is_search_engine == 0 && !defined('NO_SESSION') && !ERROR_PAGE){
	session_start();
}

require_once ROOT_PATH.'core/System.php';

require_once ROOT_PATH.'core/Form.php';
require_once ROOT_PATH.'core/Module.php';
require_once ROOT_PATH.'includes/display.class.php';


global $display, $main;
$display = new TplLoad();
CGlobal::$main = System::getParam('main','home');


$cachefile = DIR_CACHE.'arr/website_config.php';
if(!file_exists($cachefile)){
	$arr_site_config = array();	
	$row=DB::select(PREFIX_TABLE.'config', 'id = 1');
	$arr_site_config = unserialize($row['config']);	
	CGlobal::$configs = $arr_site_config;	
	if(!empty($arr_site_config) && System::CheckDir(DIR_CACHE.'arr')){
		@file_put_contents($cachefile,serialize($arr_site_config));
	}
}else {
	CGlobal::$configs = unserialize(@file_get_contents($cachefile));
}

define('CACHE_ON', CGlobal::$configs['is_cache']);
define('CACHE_TIME', CGlobal::$configs['cache_time']);
// Disable ALL magic_quote
//set_magic_quotes_runtime(0);

if (get_magic_quotes_gpc()){
	function stripslashes_deep($value){
		$value = is_array($value) ? array_map('stripslashes_deep', $value) : stripslashes($value);
		return $value;
	}
	$_REQUEST = array_map('stripslashes_deep', $_REQUEST);
	$_COOKIE  = array_map('stripslashes_deep', $_COOKIE);
}
require_once ROOT_PATH.'core/Url.php';
if(!ERROR_PAGE){
	//Url::redirect_url();
}
?>