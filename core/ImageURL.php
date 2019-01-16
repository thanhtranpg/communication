<?php
class ImageUrl{
	static $rand_number = 0;
	
	static function getImageServerUrl(){
		return URL_UPLOAD;
	}
	
	static function getTempPath($prefix = 'news'){
		return $prefix.'/tmp/';
	}
	
	static function getFolderByID($id = 0, $prefix='news'){
		$max_item_in_folder = 1000;
		$max_folder_in_folder = 100;
		return $prefix.ceil($id/$max_item_in_folder).'/'.ceil( ($id%$max_item_in_folder)/$max_folder_in_folder ).'/';
	}
	
	static function getDirectPath($type = -1, $prefix = 'news'){
		$type = intval($type);
		$type = $type > -1 ? $type : 150;
		return $prefix.'/size'.$type.'/';
	}
	
	static function getImageUrl($server = false, $img = '', $path = ''){
		//300, 140, 70
		if($img != ''){			
			$ser = $server ? self::getImageServerUrl() : '';
			
			return $ser.$path.'/'.$img;
		}
		return '';
	}
	
	static function getItemImage($type = 100, $server = false, $path = false, $img = '', $id = 0, $folder = 'news'){
		//150, 500
		if($img != ''){
			$type= ($type == '') ? 100 : $type;
			$ser = $server ? self::getImageServerUrl() : '';
			$path= $path ? self::getDirectPath($type,$folder): '';
			$pre = $path ? self::getFolderByID($id, $folder) : '';
			return $ser.$path.$pre.$img;
		}
		return '';
	}
	
	static function getNewsImage($type = 150, $server = false, $path = false, $img = '', $id = 0){
		//150, 500
		if($img != ''){
			$type= ($type == '') ? 150 : $type;
			$ser = $server ? self::getImageServerUrl() : '';
			$path= $path ? self::getDirectPath($type,'news'): '';
			$pre = $path ? self::getFolderByID($id, 'news') : '';
			return $ser.$path.$pre.$img;
		}
		return '';
	}
	
	//ho tro
	static function getMicroTime(){
		return '_'.preg_replace("/[. ]+/", "_", microtime());
	}
	//get random string
	static function randString(){
		if(self::$rand_number <= 0){
			self::$rand_number = rand();
		}
		return '?rand='.self::$rand_number;
	}
	
	static function UploadFile($aFileArray,$path,$id){			
						
		$newFileName = strtolower($id.'_'.$aFileArray['name']);
		$aSaveAs = DIR_UPLOAD.$path."/";
		
		if(System::CheckDir($aSaveAs)){
			$saveTo_org=$aSaveAs . $newFileName;		
	    	if(!move_uploaded_file($aFileArray['tmp_name'],$saveTo_org)){
			 	return 5;			
	    	}	
		}			
		 
		 return $newFileName;	
    }
    
    static function UploadImage($aFileArray,$path,$id){
		
		$lImageArray = array('image/gif','image/pjpeg','image/jpeg','image/png','image/gif');			
		$maxSize = (CGlobal::$configs['maxsize_image']) ? CGlobal::$configs['maxsize_image'] : 150;

		if (!in_array($aFileArray["type"],$lImageArray))
		{
			echo $aFileArray["type"];
			return 1;
		}
			
		// Security check
		if (!is_uploaded_file($aFileArray["tmp_name"]))
			return 2;
		
		// File-size check
		if ($aFileArray["size"]>($maxSize*1024))
			return 3;
		
		// New filename						
		if ($aFileArray["type"]=="image/gif")
			$ext="gif";
		elseif ($aFileArray["type"]=="image/pjpeg" || $aFileArray["type"]=="image/jpeg")
			$ext="jpg";
		elseif ($aFileArray["type"]=="image/png")
			$ext="png";
		elseif (!$aType)
			return 4;
						
		$newFileName = strtolower($id.'_'.$aFileArray['name']);
		$aSaveAs = DIR_UPLOAD.$path."/";
		
		if(System::CheckDir($aSaveAs)){
			$saveTo_org=$aSaveAs . $newFileName;		
	    	if(!move_uploaded_file($aFileArray['tmp_name'],$saveTo_org)){
			 	return 5;			
	    	}	
		}			
		 
		 return $newFileName;	
    }
	static function DelItemImage($img,$id,$arrSize=array(150,500),$path){
	
	
	    		if($arrSize){
	    			foreach ($arrSize as $size){
	    				$SaveAsDir = DIR_UPLOAD;
	    				$SaveAsDir .= self::getDirectPath($size,$path);
	    				$SaveAsDir .= self::getFolderByID($id,$path);	    				
	    				if(System::CheckDir($SaveAsDir)){
		    				//Copy & Resize Image
		    				$SaveAs = $SaveAsDir.$img;
		    				@unlink($SaveAs);
	    				}
	    			}
	    		}
	
    	
    }    
    
	static function UploadItemImage($aFileArray,$id,$arrSize=array(150,500),$path){
		
		$lImageArray = array('image/gif','image/pjpeg','image/jpeg','image/png','image/gif');	
		$maxSize = (CGlobal::$configs['maxsize_image']) ? CGlobal::$configs['maxsize_image'] : 150;		

		if (!in_array($aFileArray["type"],$lImageArray))
		{
			echo $aFileArray["type"];
			return 1;
		}
			
		// Security check
		if (!is_uploaded_file($aFileArray["tmp_name"]))
			return 2;
		
		// File-size check
		if ($aFileArray["size"]>($maxSize*1024))
			return 3;
		
		// New filename						
		if ($aFileArray["type"]=="image/gif")
			$ext="gif";
		elseif ($aFileArray["type"]=="image/pjpeg" || $aFileArray["type"]=="image/jpeg")
			$ext="jpg";
		elseif ($aFileArray["type"]=="image/png")
			$ext="png";
		elseif (!$aType)
			return 4;
				
		$newFileName=$path."_".$id.".".$ext;
		$aSaveAs = DIR_UPLOAD.self::getTempPath($path);
		
		if(System::CheckDir($aSaveAs)){
			$saveTo_org=$aSaveAs . $newFileName;		
	    	if(@move_uploaded_file($aFileArray['tmp_name'],$saveTo_org)){
	    		//$url_tmp_image = URL_UPLOAD.self::getTempPath('news').$newFileName;
	    		if($arrSize){
	    			foreach ($arrSize as $size){
	    				$SaveAsDir = DIR_UPLOAD;
	    				$SaveAsDir .= self::getDirectPath($size,$path);
	    				$SaveAsDir .= self::getFolderByID($id,$path);	    				
	    				if(System::CheckDir($SaveAsDir)){
		    				//Copy & Resize Image
		    				$SaveAs = $SaveAsDir.$newFileName;
		    				self::CreateResizeImage($saveTo_org,$aFileArray["type"],$SaveAs,$size);
	    				}
	    			}
	    		}
	    		
	    		unlink($saveTo_org);
	    		
	    		
	    	}else{
			 	return 5;			
	    	}	
		}			
		 
		 return $newFileName;	
    }       
    
    static function CreateResizeImage($Url_Image,$imageType,$aSaveAs,$new_width=150){
		// Get sizes
		list($width, $height) = getimagesize($Url_Image);	
		if($new_width < $width){
			$new_height = round($height * $new_width / $width);	
		}else {
			$new_width = $width;
			$new_height = $height;
		}
	
		$thumb = imagecreatetruecolor($new_width, $new_height);
		$f = fopen($aSaveAs,'w');
		if ($imageType=="image/gif"){
			$source = imagecreatefromgif($Url_Image);
			imagecopyresized($thumb, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height);				
			imagegif($thumb,$aSaveAs);
		}	
		elseif ($imageType=="image/png"){
			$source = imagecreatefrompng($Url_Image);	
			imagecopyresized($thumb, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height);				
			imagepng($thumb,$aSaveAs);
		}		
		else {
			$source = imagecreatefromjpeg($Url_Image);
			imagecopyresized($thumb, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height);				
			imagejpeg($thumb,$aSaveAs,100);
		}	
			
		fclose($f);
	}
    
    
    
    static function getErrorMsg($aID){
		if ($aID==1)
			return LA_UP_ER1;
		elseif ($aID==2)
			return LA_UP_ER2;
		elseif ($aID==3)
			return LA_UP_ER3;
		elseif ($aID==4)
			return LA_UP_ER4;
		elseif ($aID==5)
			return LA_UP_ER5;
		elseif ($aID==6)
			return LA_UP_ER6;
		else 
			return LA_UP_UNKNOWN;
		
	}
		
}
?>