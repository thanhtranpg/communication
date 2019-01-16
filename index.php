<?php
$rtime 		= microtime();
$rtime 		= explode(" ",$rtime);
$rtime 		= $rtime[1] + $rtime[0];
$start_rb 	= $rtime;

require_once 'core/Debug.php'; //System Debug...
require_once 'core/config.php';//System Config...
require_once 'core/Init.php';  //System Init...
$mod_name = ucfirst(strtolower(CGlobal::$main)); 
$maintenance=false;
if(isset(CGlobal::$configs['closewebsite']) && CGlobal::$configs['closewebsite']==1){
  if(!CGlobal::$is_adminpage && $mod_name!='Maintenance'){
   Url::redirect_url('?main=Maintenance');
  }  
}

  if($mod_name=='Home'  || $mod_name=='Contact' || $mod_name=='Cart'){
 System::$blocks = array(
						array('name'=>'Header'),
                        	
						array('name'=>$mod_name),						
									
						array('name'=>'Footer')
						);
						   
}elseif($mod_name=='Maintenance'){
    System::$blocks = array(
						array('name'=>'Maintenance'),
						);  
}else
 System::$blocks = array(
						array('name'=>'Header'),
                        	
						array('name'=>$mod_name),						
									
						array('name'=>'Footer')
						);  


tbug('Load core files');
System::Run();
tbug('End of Page');
exit();
