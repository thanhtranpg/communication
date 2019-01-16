<?php
/**
 * @author 	Tran Quang Thanh
 * 			Mail: tqt_tqt2001@yahoo.com
 * 			Mobile: 01656 254 342
 * 			03/02/2010
 */
StaticCache::delCache();
class StaticCache{
	static $curentCacheFilePath='';
	static $handleContent='';
	static $curentContent='';
	static $cacheFilesList='';
	static $curentExpTime=0;
	static $pNum=0;
	static $cNum=0;
	/* 
		- Kiem ra file cache co ton tai khong
		- Tham so: 
				$filePath: Ten file (Bao gom ca duong dan)
		- Tra ve: true or false
	*/
	static function notExistCache($filePath,$exp_time=0,$handleContent=false,$subDir=''){
		self::$curentContent='';
		self::$handleContent=$handleContent;
		  
		if(!CACHE_ON)//Nếu tắt chế độ cache
		return true;
		
		
		if($subDir!=''){
			System::CheckDir(DIR_CACHE.'html/'.$subDir.'/');
			$filePath=$subDir.'/'.$filePath;
		}
		else{
			System::CheckDir(DIR_CACHE.'html/');
		}
		
		self::$curentCacheFilePath	= DIR_CACHE.'html/'.$filePath.'.html';
		self::$curentExpTime		= $exp_time;
		
		if (isset($_GET['delscache']) && (int)$_GET['delscache']=='1'){
			self::delCache($filePath);
			return true;
		}
		
		if (file_exists(self::$curentCacheFilePath)){
			if($exp_time>0){
				$filemtime= filemtime(self::$curentCacheFilePath);
				if(TIME_NOW > $filemtime+$exp_time){
					return true;	
				}
			}
			else{
				$filemtime = 0;
			}
			
			if(DEBUG){
				self::$cNum++;
				self::$pNum++;
				
				if(class_exists('Module') && Module::$name!=''){
					$module_name = Module::$name;
				}
				else{								
					$module_name = "-- Enbac system";
				}
				
				$info="<b>".$module_name."</b><br /><font color=red><b>".self::$curentCacheFilePath."</b></font><br /><b>Cache Time:</b> ".$exp_time."s ";
				
				
				
				$info.="<b>Created:</b> ".date('d/m/Y H:i:s',$filemtime);
				if($exp_time>0)
					$info.="<b> Expire:</b> ".date('d/m/Y H:i:s',$filemtime + $exp_time);
				else
					$info.="<b> Expire:</b> forever";
				
				self::$cacheFilesList.="<li>".$info."</li>";
			}
			
			if(self::$handleContent){
				self::$curentContent= file_get_contents(self::$curentCacheFilePath);
			}
			else 
				echo file_get_contents(self::$curentCacheFilePath);
			return false;
		}
	
		return true;
	}
	
	//Bat dau cache 
	static function delCache($cache_file='',$ext='html'){
		if($cache_file!=''){			
			@unlink(DIR_CACHE.'html/'.$cache_file.'.'.$ext);						
//			if(DEBUG){
//				echo "Deleted HTML cache file: {$cache_file}";
//			}
			//exit;
		}
		
	}
  	  
	static function startCache(){
		//if(CACHE_ON)
		ob_start();
	}
	
	/* Ket thuc cache 
		$filePath: Neu truyen vao file name, ham se sinh ra file cache, dong thoi output content
		Neu $filePath=false: chi output noi dung, ko ghi file
	*/
	static function endCache($return=false){
		//if(!CACHE_ON)
		//return ;
		
		self::$curentContent=ob_get_contents();
		ob_end_clean();
		
		if(CACHE_ON){			
			if(self::$curentCacheFilePath!=''){
				@file_put_contents(self::$curentCacheFilePath,self::$curentContent);
				if(DEBUG){
					self::$pNum++;
					if(class_exists('Module') && Module::$name!=''){
						$module_name = Module::$name;
					}
					else{								
						$module_name = "-- Enbac system";
					}
					
					$info="<b>".$module_name."</b><br /><font color=red><b>".self::$curentCacheFilePath."</b></font><br /><b>Created:</b> ".date('d/m/Y H:i:s',TIME_NOW)." <b>Expire:</b> ".(self::$curentExpTime?date('d/m/Y H:i:s',self::$curentExpTime+TIME_NOW):'Forever');
					self::$cacheFilesList.="<li>".$info."</li>";
				}
				
				self::$curentCacheFilePath	= '';
				self::$curentExpTime		= 0;
			}
			else{
				if(DEBUG){
					self::$pNum++;
					
					if(class_exists('Module') && Module::$name!=''){
						$module_name = Module::$name;
					}
					else{								
						$module_name = "-- Enbac system";
					}
					
					$info="<b>".$module_name."</b><br /><font color=red><b>No file</b></font><br />";
					self::$cacheFilesList.="<li>".$info."</li>";
				}
				self::$curentExpTime			=0;
			}			
		}
		
		if($return)
			return self::$curentContent;
		elseif(!self::$handleContent)
			echo self::$curentContent;
		
		return true;
	}
}

/*
//Example
$filePath='cachTest.html';
if (getParam('cmd','')=='del_c')
	@unlink($filePath);
	
if (!self::existCache($filePath,1000))
{
	self::startCache();
	echo "Chào cả nhà nhé, tôi đi  <font color=red><b>chơi đây</b></font>";	
	self::endCache();
}
*/
?>