<?php
/**
 * @author 	Tran Quang Thanh
 * 			Mail: tqt_tqt2001@yahoo.com
 * 			Mobile: 01656 254 342
 * 			03/02/2010
 */
//Xoá cache tự động
ArrCache::del_cache();

class ArrCache{   
	static $expire = 3600,$arr_cache = array(),$cache_file='',$createdTime=TIME_NOW,$cache_list='';

	static function is_not_cached($a_name = '', $expire = 3600 , $subDirCache='',$del_cache=false){
		self::$arr_cache = array();
    	if (CACHE_ON){
    		$c_name 			= ($subDirCache?$subDirCache.'/':'').$a_name;
    		self::$cache_file 	= $c_name;
			
    		if ($del_cache || (isset($_GET['delscache']) && (int)$_GET['delscache']=='1')){//Nếu chỉ xoá cache
    			self::del_cache($c_name);
				return true;
    		}
    		
    		self::$expire 	= ($expire<0)?0:$expire;
    		
    		if(System::CheckDir(DIR_CACHE.'arr/'.($subDirCache?$subDirCache.'/':''))){
	    		self::$cache_file 	= DIR_CACHE.'arr/'.$c_name.'.php';
	    		
	    		if(file_exists(self::$cache_file)){	
	    			self::$createdTime = filemtime(self::$cache_file);
	    			
					if(self::$expire ==0 || (self::$expire>0 && TIME_NOW < self::$createdTime + self::$expire)){
						self::$arr_cache = unserialize(stripslashes((@file_get_contents(self::$cache_file))));
						
						
						if(DEBUG){
							$info="<br /><font color=red><b>".self::$cache_file."</b></font><br /><b>Cache Time:</b> ".self::$expire."s ";
							
							$info.="<b>Created:</b> ".date('d/m/Y H:i:s',self::$createdTime);
							
							if(self::$expire>0)
								$info.="<b> Expire:</b> ".date('d/m/Y H:i:s',self::$expire+self::$createdTime);
							else 
								$info.="<b> Expire:</b> forever";
							self::$cache_list.="<li>".$info."</li>";
						}
						
						return false;
					}
				}
			}
    	}
		
    	return true;
  	}
  	static function set($array) {
  		if(CACHE_ON && self::$cache_file){
  			@file_put_contents(self::$cache_file,addslashes(serialize($array)));  			
  			self::$arr_cache = $array;
  		}
  		
		return true;    			
  	}

  	static function get(){
		return self::$arr_cache; 
  	}
  	
  	static function del_cache($cache_key=''){
  		if($cache_key!=''){  
  			@unlink(DIR_CACHE . "arr/{$cache_key}.php");			
//			if(is_array(CGlobal::$my_server)){
//				foreach (CGlobal::$my_server as $server){
//					$link = "http://{$server}/?trigger=1&cache_arr={$cache_key}";	
//					if(@fopen($link,"r")){
//						//if(DEBUG){echo "run service in $link <br>";}
//					}
//					else{
//						if(DEBUG){echo "error in $link  <br>";}
//					}
//				}					
//			}  			
			return true;				
  		}
  		//trigger delcache
  		elseif(isset($_REQUEST['trigger'],$_REQUEST['cache_arr']) && $_REQUEST['trigger'] && $_REQUEST['cache_arr']  ){
			$cache_arr=$_REQUEST['cache_arr'];
			@unlink(DIR_CACHE . "arr/{$cache_arr}.php");			
			if(DEBUG){
				echo "Deleted Array cache file : {$cache_arr}";
			}
			exit;			
		}
  	}
}
?>
