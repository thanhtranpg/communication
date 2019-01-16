<?php
require_once 'core/Debug.php'; //System Debug...
require_once 'core/config.php';//System Config...
require_once 'core/Init.php';  //System Init...
require_once 'core/config_admin.php';  

CGlobal::$is_adminpage = true;
if(CGlobal::$main == 'home') CGlobal::$main = 'admin_home';
if(CGlobal::$main != 'admin_login') require_once('core/check_permission.php');
$mod_name = ucfirst(strtolower(CGlobal::$main)); 
System::$blocks = array(
						array('name'=>'Admin_header'),
						array('name'=>'AdminMenu'),
						array('name'=>$mod_name),					
						array('name'=>'Admin_footer')
						);
							
tbug('Load core files');
System::Run();
tbug('End of Page');
exit();
?>