<?php
	function loadTime()
	{
		global $start_rb;
		
		$mtime = microtime();
		$mtime = explode(" ",$mtime);
		$mtime = $mtime[1] + $mtime[0];
		$end_rb = $mtime;			
		$page_load_time = round(($end_rb - $start_rb),5)."s";	
		
		$color = (DEBUG) ? "red" : "#FFFFFF";
		echo "<br clear='left'><font style='color:$color;'><b>Load time: $page_load_time</b></font>";	
		exit();
	}
	
	function startLoadTime()
	{
		global $start_rb;
		
		$rtime = microtime();
		$rtime = explode(" ",$rtime);
		$rtime = $rtime[1] + $rtime[0];
		$start_rb = $rtime;
	}
	//error_reporting  (E_ERROR | E_WARNING | E_PARSE);
	error_reporting  (0);
	
	//debug enable
	if(isset($_GET["xbug"])){
		define('DEBUG',(int)(boolean)$_GET["xbug"]);	
	}
	elseif (isset($_REQUEST["xbug"]) && intval($_REQUEST["xbug"]) > 0){
		define('DEBUG',1);
	}
	else{
		define('DEBUG',0);
	}
	
	
	function enbac_error_handle($errno, $errmsg, $filename, $linenum, $vars)
	{
	   $dt = date("Y-m-d h:i:s");
	   $errortype = array (
				   E_USER_ERROR        => 'ENBAC Fatal Error',
				   E_ERROR              => 'ENBAC Error',
				   E_WARNING            => 'ENBAC Warning',
				   E_PARSE              => 'ENBAC Parsing Error',
				   E_NOTICE            => 'ENBAC Notice',
				   E_CORE_ERROR        => 'ENBAC Core Error',
				   E_CORE_WARNING      => 'ENBAC Core Warning',
				   E_COMPILE_ERROR      => 'ENBAC Compile Error',
				   E_COMPILE_WARNING    => 'ENBAC Compile Warning',
				   E_USER_ERROR        => 'ENBAC User Error',
				   E_USER_WARNING      => 'ENBAC User Warning',
				   E_USER_NOTICE        => 'ENBAC User Notice'
				  // E_STRICT            => 'ENBAC Runtime Notice',
				  // E_RECOVERABLE_ERROR  => 'ENBAC Catchable Fatal Error'
				   );

	
	 $errortype = $errortype["$errno"];	 
	 CGlobal::$error_handle .= "<tr>
								  <td style='font-size:14px' bgcolor='#FFFFFF'>
								  <b>$errortype</b> [Error num : $errno] -- date : $dt <br>
								  File: $filename - Line: $linenum<br>
	 							  $errmsg
								  </td>
								 </tr>";
	}
	
			
	if( DEBUG && isset($_REQUEST["level"]) && intval($_REQUEST["level"]) == 4){
		error_reporting(E_ALL);
		//set_error_handler("enbac_error_handle");
	}

	if(isset($rtime)){
		$time_check = $rtime;

	}
	function tbug($str=''){
		static $count=1,$display=0;
		if(!$display){
			if(!$display && isset($_GET['tbug'])){
				if($_GET['tbug']==1){
					$display=1;	
				}
				else
					$display=2;
			}
			elseif(!$display && isset($_REQUEST['tbug'])){
				if($_REQUEST['tbug']==1){
					$display=1;	
				}
				else
					$display=2;
			}
		}
		
		if($display==1){
			global $start_rb,$time_check;
			$mtime  = microtime();
			$mtime  = explode(" ",$mtime);
			$mtime  = $mtime[1] + $mtime[0];
			$end_rb = $mtime;
				
			$module_load_time 	= round(($end_rb - $time_check),4)."s";	
			$page_load_time 	= round(($end_rb - $start_rb),4)."s";	
			
			$time_check = $end_rb;	
			
			echo "<br /><font style='color:#F00;'>".($count++).") $str $page_load_time".($page_load_time!=$module_load_time?" ($module_load_time)":"")."</font>";	
		}
	}
	error_reporting(E_ALL);
?>