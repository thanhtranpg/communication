<?php
/**
 * @author 	Tran Quang Thanh
 * 			Mail: tqt_tqt2001@yahoo.com
 * 			Mobile: 01656 254 342
 * 			03/02/2010
 */
define('PAGE_CACHE_DIR',DIR_CACHE.'pages/');
define('PAGE_CACHE_ON',true);
System::del_page_cache();

class System{//Lop he thong,Cac ham dung chung thong dung cho vao day    
    static $false = false,$page_cache_file='',$extraHeader = '',$extraFooter = '',$extraHeaderCSS = '',$extraHeaderJS = '',$blocks = array(),$main=array();
    
    static function Run(){
		self::CheckDir(PAGE_CACHE_DIR);		
		if(isset($_REQUEST['main'])){
			$page_name = ucfirst(strtolower($_REQUEST['main']));
		}
		elseif(CGlobal::$is_adminpage){
			$page_name = 'Admin_home';
		}else{
			$page_name = "Home";
		}
		
		self::$page_cache_file = PAGE_CACHE_DIR.$page_name.'.php';
		
		if(Url::get('refresh_page')==1){
			self::del_page_cache($page_name);
		}
		
		if(Url::get('refresh_page')!=1 && PAGE_CACHE_ON && file_exists(self::$page_cache_file)){
			require_once self::$page_cache_file;
		}
		else{
			self::$main=array('name'=>$page_name);
			self::PageGenerate();
		}
	}
	
	static function PageGenerate(){
		$code = self::TextGenerate();
		
		if(PAGE_CACHE_ON && $fp = @fopen(self::$page_cache_file, 'w+')){
			fwrite ($fp, $code );fclose($fp);
			chmod(self::$page_cache_file,0777);
			require_once self::$page_cache_file;
		}
		else{ eval('?>'.$code.'<?php ');}
	}
	
	static function TextGenerate(){		
		$code='<?php '."\n";
		$code .='System::$main = '.str_replace(array("\n",' '),array('',''),var_export(self::$main,true)).';';
		
		$code.="\n".'System::$blocks = ';
		
		
		
		
		
		$code .= str_replace(array("\n",' '),array('',''),var_export(System::$blocks,true)).';';
		$code .="\n".'foreach(System::$blocks as &$block){';
		$code .="\n".'	if(file_exists(DIR_MODULE.$block[\'name\'].\'/class.php\')){';
		$code .="\n".'		require_once DIR_MODULE.$block[\'name\'].\'/class.php\';';
		$code .="\n".'		$block[\'object\'] = new $block[\'name\']($block[\'name\']);';
		$code .="\n".'		';
		$code .="\n".'		if(isset($_POST[\'form_block\']) && $_POST[\'form_block\'] == $block[\'name\']){';
		$code .="\n".'			$block[\'object\']->submit();';
		$code .="\n".'		}';
		$code .="\n".'	}';
		$code .="\n".'}';
		$code .="\n".'require_once ROOT_PATH."core/PageBegin.php" ?>';
		foreach(self::$blocks as $key=>&$block){
			$code .= "\n".'<?php if(isset(System::$blocks['.$key.'][\'object\'])) System::$blocks['.$key.'][\'object\']->on_draw();?>';
		}


		$code .= "\n<?php require_once ROOT_PATH.'core/PageEnd.php' ?>";

		return $code;
	}
	
	static function RegionGenerate($region){
		$code = '';
		foreach(self::$blocks as $id=>$block){
			if($block['region'] == $region){
		  		$code .= "\n".'<?php if(isset($blocks['.$id.'][\'object\'])) $blocks['.$id.'][\'object\']->on_draw();?>';
			}
		}
		return $code;
	}
	
	static function del_page_cache($page=''){
		if($page!=''){
			if(is_array(CGlobal::$my_server)){
				foreach (CGlobal::$my_server as $server){
					$link = "http://{$server}/?trigger=1&page_cache_file={$page}";
					if(@fopen($link,"r")){
						//if(DEBUG){echo "run service in $link<br>";}					
					}
					else{
						if(DEBUG){echo "error in $link<br>";}	
					}
				}				
			}
			return true;
  		}
		//trigger delscache
		elseif(isset($_REQUEST['trigger'])  && isset($_REQUEST['page_cache_file']) && $_REQUEST['trigger'] && $_REQUEST['page_cache_file']){
			$page_cache_file=$_REQUEST['page_cache_file'];
			@unlink(PAGE_CACHE_DIR.$page_cache_file.'.php');
			if(DEBUG){
				echo "Deleted Page cache file: {$page_cache_file}";
			}
			exit;
		}
	}
    	   
    static function halt(){
        if ( REWRITE_ON){
            require_once ROOT_PATH."includes/rewrite.class.php";
           
            $getcontents = ob_get_contents();
            ob_end_clean();   
            @ob_start('ob_gzhandler');
            $rewrite = new REWRITE_URL();
            echo $rewrite->doReplace($getcontents);
            unset($getcontents,$rewrite);
        }
        self::ftp_image_close();exit();
    }
    
    static function get_config($update_cache = 0,$delcache = false){
		if(!CGlobal::$configs || $delcache || $update_cache){
			if(ArrCache::is_not_cached('config_arr',0,'',$delcache)){
				if(!$delcache){
					$re = DB::query('SELECT * FROM configs',__LINE__.__FILE__);

					if($re){
						while ($value = mysql_fetch_assoc($re)){
							CGlobal::$configs[$value['conf_key']]=$value;
						}
					}

					ArrCache::set(CGlobal::$configs);
				}
			}
			else{
				CGlobal::$configs 		= ArrCache::$arr_cache;
				ArrCache::$arr_cache 	= array();
			}
		}
	}	

	/*-------------------------------------------------------------------------*/
	// Sets a cookie, abstract layer allows us to do some checking, etc
	/*-------------------------------------------------------------------------*/
	static function my_setcookie($name, $value = "", $expires=""){
		$expires = ($expires)? $expires : time() + 60*60*24*365;

		if(preg_match('/tqt/',$_SERVER['HTTP_HOST'])){
			setcookie($name, $value, $expires,"/",'.tqt');
		}
		else{
			setcookie($name, $value, $expires,"/");
		}
		$_COOKIE[$name] = $value;
	}

	static function ftp_image_connect(){
		if(!CGlobal::$ftp_image_connect_id){
			CGlobal::$ftp_image_connect_id = ftp_connect(FTP_IMAGE_SERVER);

			if(CGlobal::$ftp_image_connect_id){
				// Login to FTP Server
				$login_result= ftp_login(CGlobal::$ftp_image_connect_id, FTP_IMAGE_USER, FTP_IMAGE_PASSWORD);
				if($login_result){
					// turn passive mode on
					ftp_pasv(CGlobal::$ftp_image_connect_id, true);
					return true;
				}
				return false;
			}
			return false;
		}
		return true;
	}

	static function ftp_image_close(){
		if(CGlobal::$ftp_image_connect_id){
			ftp_close(CGlobal::$ftp_image_connect_id);
			CGlobal::$ftp_image_connect_id=false;
		}
	}

	static function ftp_image_put_file($destFileName,$sourceFileName,$mode=FTP_BINARY){
		if(System::ftp_image_connect()){
			if(@ftp_put(CGlobal::$ftp_image_connect_id, $destFileName, $sourceFileName, $mode)){
				@ftp_chmod ( CGlobal::$ftp_image_connect_id, 0777, $destFileName );
				return true;
			}
		}
		return false;
	}

	static function ftp_image_delete_file($sourceFileName){
		if(System::ftp_image_connect()){
			if(@ftp_delete(CGlobal::$ftp_image_connect_id, $sourceFileName)){
				return true;
			}
		}
		return false;
	}

	static  function ftp_check_dir($remote_dir_path,$mkdir=true){
		$ret = true;
		if(self::ftp_image_connect()){
			if($remote_dir_path=='')
			return true;

			$dir=split("/", $remote_dir_path);
			$remote_dir_path="";

			for ($i=0;$i<count($dir);$i++){
				if($dir[$i]!=''){
					$remote_dir_path.="/".$dir[$i];
					if(!@ftp_chdir(CGlobal::$ftp_image_connect_id,$remote_dir_path)){
						if($mkdir){
							@ftp_chdir(CGlobal::$ftp_image_connect_id,"/");

							if(!@ftp_mkdir(CGlobal::$ftp_image_connect_id,$remote_dir_path)){
								$ret=false;
								break;
							}
						}
						else{
							$ret=false;
							break;
						}
					}
				}
			}
			@ftp_chdir(CGlobal::$ftp_image_connect_id,"/");
		}
		else{
			$ret=false;
		}
		return $ret;
	}

	//Hàm chia thư mục ảnh!
	static function folderUpload($item_id,$userid=false,$folder='news/images'){
		//$folder='items/images' 		: ảnh sp
		//$folder='items/price_lists' 	: báo giá
		if(!$userid)
		$userid=User::id();

		if($folder!='')
		$folder='news/images';

		return  $folder.'/'.round($userid/1000).'/'.round($item_id/1000).'/';
	}

	static function _name_cleaner($name,$replace_string="_"){
		return preg_replace( "/[^a-zA-Z0-9\-\_]/", $replace_string , $name );
	}
	
	static function safe_title($text){
		$text = System::post_db_parse_html($text);
		$text = self::stripUnicode($text);
		$text = self::_name_cleaner($text,"-");
		$text = str_replace("----","-",$text);
		$text = str_replace("---","-",$text);
		$text = str_replace("--","-",$text);
		$text = trim($text, '-');

		if($text){
			return $text;
		}
		else{
			return "enbac";
		}
	}

///////////Hàm loại bỏ dấu tiếng việt
	static function stripUnicode($str){
		if(!$str) return false;
		$marTViet=array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă",
		"ằ","ắ","ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề"
		,"ế","ệ","ể","ễ",
		"ì","í","ị","ỉ","ĩ",
		"ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ"
		,"ờ","ớ","ợ","ở","ỡ",
		"ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
		"ỳ","ý","ỵ","ỷ","ỹ",
		"đ",
		"À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă"
		,"Ằ","Ắ","Ặ","Ẳ","Ẵ",
		"È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
		"Ì","Í","Ị","Ỉ","Ĩ",
		"Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ"
		,"Ờ","Ớ","Ợ","Ở","Ỡ",
		"Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
		"Ỳ","Ý","Ỵ","Ỷ","Ỹ",
		"Đ");

		$marKoDau=array("a","a","a","a","a","a","a","a","a","a","a"
		,"a","a","a","a","a","a",
		"e","e","e","e","e","e","e","e","e","e","e",
		"i","i","i","i","i",
		"o","o","o","o","o","o","o","o","o","o","o","o"
		,"o","o","o","o","o",
		"u","u","u","u","u","u","u","u","u","u","u",
		"y","y","y","y","y",
		"d",
		"A","A","A","A","A","A","A","A","A","A","A","A"
		,"A","A","A","A","A",
		"E","E","E","E","E","E","E","E","E","E","E",
		"I","I","I","I","I",
		"O","O","O","O","O","O","O","O","O","O","O","O"
		,"O","O","O","O","O",
		"U","U","U","U","U","U","U","U","U","U","U",
		"Y","Y","Y","Y","Y",
		"D");

		$str = str_replace($marTViet,$marKoDau,$str);
		return $str;
	}

	static function getExtension($file) {
		$pos = strrpos($file, '.');
		if(!$pos) {
			return false;
		}
		$str = substr($file, $pos, strlen($file));
		return strtolower($str);
	}

		
	static function getParam($aVarName,$aVarAlt=""){
		$lVarName=@$_REQUEST[$aVarName];
		if (!empty($lVarName)){
			if (is_array($lVarName)){
				$lReturnArray = array();
				foreach ($lVarName as $key => $value) {
					$value = self::clean_value($value);
					$key = self::clean_key($key);
					$lReturnArray[$key]=$value;
				}
				return $lReturnArray;
			}
			else
			return self::clean_value($lVarName); // Clean input and return it

		}
		else
		return $aVarAlt;
	}

	static function cleanHtml($aVarName,$aVarAlt=""){
		$lVarName=$aVarName;
		if (!Empty($lVarName)){
			if (is_array($lVarName)){
				$lReturnArray = array();
				foreach ($lVarName as $key => $value) {
					$value = self::clean_value($value);
					$key = self::clean_key($key);
					$lReturnArray[$key]=$value;
				}
				return $lReturnArray;
			}
			else
			return self::clean_value($lVarName); // Clean input and return it

		}
		else
		return $aVarAlt;
	}

static	function getParamInt($aVarName,$aVarAlt=0){
		$lNum = 0;
		if ($aVarName){
			if (isset($_POST[$aVarName]))
				$lNum = $_POST[$aVarName];
			elseif (isset($_GET[$aVarName]))
				$lNum = $_GET[$aVarName];
			else
				$lNum = $aVarAlt;
		}

		return (int)$lNum;
		//return (int)preg_replace('/\D+/', '', $lNum);
	}

	/*-------------------------------------------------------------------------*/
	// Key Cleaner - ensures no funny business with form elements
	/*-------------------------------------------------------------------------*/
	static function clean_key($key){
		if ($key == ""){
			return "";
		}

		$key = htmlspecialchars(urldecode($key));
		$key = preg_replace( "/\.\./"           , ""  , $key );
		$key = preg_replace( "/\_\_(.+?)\_\_/"  , ""  , $key );
		$key = preg_replace( "/^([\w\.\-\_]+)$/", "$1", $key );
		return $key;
	}

	/*-------------------------------------------------------------------------*/
	// Clean value
	/*-------------------------------------------------------------------------*/

	static function clean_value($val){
		$strip_space_chr = 1;
		$get_magic_quotes = @get_magic_quotes_gpc();

		if ($val == ""){
			return "";
		}

		$val = str_replace( "&#032;", " ", $val );

		if ( $strip_space_chr ){
			$val = str_replace( chr(0xCA), "", $val );  //Remove sneaky spaces
		}
		//$val = str_replace( "&"            , "&amp;"         , $val );
		$val = str_replace( "<!--"         , ""  , $val ); //&#60;&#33;--
		$val = str_replace( "-->"          , ""       , $val ); //--&#62;
		$val = preg_replace( "/<script/i"  , "&#60;script"   , $val );
		$val = str_replace( ">"            , "&gt;"          , $val );
		$val = str_replace( "<"            , "&lt;"          , $val );
		$val = str_replace( "\""           , "&quot;"        , $val );
		//$val = preg_replace( "/\n/"        , "<br />"        , $val ); // Convert literal newlines
		$val = preg_replace( "/\\\$/"      , "&#036;"        , $val );
		$val = preg_replace( "/\r/"        , ""              , $val ); // Remove literal carriage returns
		$val = str_replace( "!"            , "&#33;"         , $val );
		$val = str_replace( "'"            , "&#39;"         , $val ); // IMPORTANT: It helps to increase sql query safety.
        
        
        
        
		if ( $get_magic_quotes ){
			$val = stripslashes($val);
		}

		$val = preg_replace( "/\\\(?!&amp;#|\?#)/", "&#092;", $val );

		return $val;
	}

	//-----------------------------------------
	// parse_html
	// Converts the doHTML tag
	//-----------------------------------------
	static function post_db_parse_html($t=""){
		if ( $t == "" ){
			return $t;
		}

		//-----------------------------------------
		// Remove <br>s 'cos we know they can't
		// be user inputted, 'cos they are still
		// &lt;br&gt; at this point :)
		//-----------------------------------------

		/*		if ( $this->pp_nl2br != 1 )
		{
		$t = str_replace( "<br>"    , "\n" , $t );
		$t = str_replace( "<br />"  , "\n" , $t );
		}*/

		$t = str_replace( "&#39;"   , "'", $t );
		$t = str_replace( "&#33;"   , "!", $t );
		$t = str_replace( "&#036;"  , "$", $t );
		$t = str_replace( "&#124;"  , "|", $t );
		$t = str_replace( "&amp;"   , "&", $t );
		$t = str_replace( "&gt;"    , ">", $t );
		$t = str_replace( "&lt;"    , "<", $t );
		$t = str_replace( "&quot;"  , '"', $t );
		

	
       // $t = str_replace( "điều trị"            , "Hỗ trợ điều trị"         , $t );
       // $t = str_replace( "Điều trị"            , "Hỗ trợ điều trị"         , $t );
       // $t = str_replace( "Điều Trị"            , "Hỗ trợ điều trị"         , $t );
       // $t = str_replace( "ĐIỀU TRỊ"            , "HỖ TRỢ ĐIỀU TRỊ"        , $t );
        $t = str_replace( "trị tận gốc"            , "điều trị hiệu quả"         , $t );
        $t = str_replace( "Trị tận gốc"            , "Điều trị hiệu quả"         , $t );
        //$t = str_replace( "Thuốc"            , "Sản phẩm"         , $t );
        //$t = str_replace( "thuốc"            , "sản phẩm"         , $t );
        //$t = str_replace( "THUỐC"            , "SẢN PHẨM"         , $t );
		$t = str_replace( "Thuô'c"            , "Thuốc"           , $t );
		$t = str_replace( "chữa trị"            , "điều trị"           , $t );
        $t = str_replace( "Chữa TrỊ"            , "Điều Trị"        , $t );
        $t = str_replace( "CHỮA TRỊ"            , "ĐIỀU TRỊ"        , $t );
		
       // $t = str_replace( "chữa"            , "điều trị"           , $t );
       // $t = str_replace( "Chữa"            , "Điều Trị"      , $t );
       // $t = str_replace( "CHỮA"            , "ĐIỀU TRỊ"         , $t );
		
        $t = str_replace( "hỗ trợ hỗ trợ"            , "Hỗ trợ"         , $t );
        $t = str_replace( "hỗ trợ Hỗ trợ"            , "Hỗ trợ"         , $t );
        $t = str_replace( "Hỗ trợ Hỗ trợ"            , "Hỗ trợ"         , $t );
        $t = str_replace( "Hỗ trợ hỗ trợ"            , "Hỗ trợ"         , $t );
		 $t = str_replace( "HỖ TRỢ HỖ TRỢ"            , "HỖ TRỢ"         , $t );

		//-----------------------------------------
		// Take a crack at parsing some of the nasties
		// NOTE: THIS IS NOT DESIGNED AS A FOOLPROOF METHOD
		// AND SHOULD NOT BE RELIED UPON!
		//-----------------------------------------

	//	$t = preg_replace( "/javascript/i" , "j&#097;v&#097;script", $t );
		$t = preg_replace( "/alert/i"      , "&#097;lert"          , $t );
		$t = preg_replace( "/about:/i"     , "&#097;bout:"         , $t );
		$t = preg_replace( "/onmouseover/i", "&#111;nmouseover"    , $t );
		$t = preg_replace( "/onmouseout/i", "&#111;nmouseout"    , $t );
		$t = preg_replace( "/onclick/i"    , "&#111;nclick"        , $t );
		$t = preg_replace( "/onload/i"     , "&#111;nload"         , $t );
	//	$t = preg_replace( "/onsubmit/i"   , "&#111;nsubmit"       , $t );
		$t = preg_replace( "/object/i"   , "&#111;bject"       , $t );
	//	$t = preg_replace( "/frame/i"   , "fr&#097;me"       , $t );
		$t = preg_replace( "/applet/i"   , "&#097;pplet"       , $t );
		$t = preg_replace( "/meta/i"   , "met&#097;"       , $t );
	//	$t = preg_replace( "/embed/i"   , "met&#097;"       , $t );
    
        

		return $t;
	}
	
	//-----------------------------------------
	// parse_html
	// Converts the doHTML tag, alow opject, embed
	//-----------------------------------------
	static function post_db_parse_html_2($t=""){
		if ( $t == "" ){
			return $t;
		}

		//-----------------------------------------
		// Remove <br>s 'cos we know they can't
		// be user inputted, 'cos they are still
		// &lt;br&gt; at this point :)
		//-----------------------------------------

		/*		if ( $this->pp_nl2br != 1 )
		{
		$t = str_replace( "<br>"    , "\n" , $t );
		$t = str_replace( "<br />"  , "\n" , $t );
		}*/

		$t = str_replace( "&#39;"   , "'", $t );
		$t = str_replace( "&#33;"   , "!", $t );
		$t = str_replace( "&#036;"  , "$", $t );
		$t = str_replace( "&#124;"  , "|", $t );
		$t = str_replace( "&amp;"   , "&", $t );
		$t = str_replace( "&gt;"    , ">", $t );
		$t = str_replace( "&lt;"    , "<", $t );
		$t = str_replace( "&quot;"  , '"', $t );

		//-----------------------------------------
		// Take a crack at parsing some of the nasties
		// NOTE: THIS IS NOT DESIGNED AS A FOOLPROOF METHOD
		// AND SHOULD NOT BE RELIED UPON!
		//-----------------------------------------

		$t = preg_replace( "/javascript/i" , "j&#097;v&#097;script", $t );
		$t = preg_replace( "/alert/i"      , "&#097;lert"          , $t );
		$t = preg_replace( "/about:/i"     , "&#097;bout:"         , $t );
		$t = preg_replace( "/onmouseover/i", "&#111;nmouseover"    , $t );
		$t = preg_replace( "/onmouseout/i", "&#111;nmouseout"    , $t );
		$t = preg_replace( "/onclick/i"    , "&#111;nclick"        , $t );
		$t = preg_replace( "/onload/i"     , "&#111;nload"         , $t );
		$t = preg_replace( "/onsubmit/i"   , "&#111;nsubmit"       , $t );
		//$t = preg_replace( "/object/i"   , "&#111;bject"       , $t );
		$t = preg_replace( "/frame/i"   , "fr&#097;me"       , $t );
		$t = preg_replace( "/applet/i"   , "&#097;pplet"       , $t );
		$t = preg_replace( "/meta/i"   , "met&#097;"       , $t );
		//$t = preg_replace( "/embed/i"   , "met&#097;"       , $t );

		return $t;
	}
	
	static function word_limit($string, $length, $ellipsis="...") {
		return (count($words = explode(' ', $string)) > $length) ? implode(' ', array_slice($words, 0, $length)) . $ellipsis : $string;
	}

	static function CheckDir($pDir){
		if (is_dir($pDir))
		return true;
		if (!@mkdir($pDir,0777,true)){
			return false;
		}
		self::chmod_dir($pDir,0777);
		return true;
	}

	static function chmod_dir($dir,$mod=0777){
		$parent_dir=dirname(str_replace(ROOT_PATH,'',$dir));
		if($parent_dir!='' && $parent_dir!='.'){
			//echo $parent_dir.'/<br />';
			@chmod($dir,$mod);
			self::chmod_dir($parent_dir,$mod);
		}
		return true;
	}
	
	static function getOption($options_array,$selected){
		$input='';
		if ($options_array)
		foreach($options_array as $key=>$text){
			$input .= '<option value="'.$key.'"';
			if($key==='' && $selected==='')
			{
				$input .=  ' selected';
			}
			else
			if( $selected!=='' && $key==$selected )
			{
				$input .=  ' selected';
			}
			$input .= '>'.$text.'</option>';
		}
		return $input;
	}

	static function getOptionMulti($options,$select_array){
		if ($options)
		foreach($options as $key=>$text){
			$input .= '<option value="'.$key.'"';
			if(in_array($key,$select_array))
			{
				$input .=  ' selected';
			}

			$input .= '>'.$text.'</option>';
		}
		return $input;
	}

	static function getOptionNum($min,$max,$default=1){
		$options = '';
		for($i=$min;$i<=$max;$i++){
			$options .= '<option value="';
			if ( $i<10 )
			$options .= '0'.$i.'"';
			else
			$options .= $i.'"';
			if ( $i == $default )
			{
				$options .= ' selected';
			}
			$options .= '>'.$i.'</option>';
		}
		return $options;
	}							

	static function getParamSearch($str_search){
		$str_search = str_replace( array('+','/','|','-','*') , "", $str_search );
		$str_search = self::trimSpace($str_search);
		$str_search = str_replace( "'" , '"', $str_search );
		$str_search = str_replace( "&#39;" , '"', $str_search );
		$str_search = str_replace( "&quot;" , '"', $str_search );

		if (eregi('"',$str_search) ){
			$pattern = '#\"(.+?)\"#is';
			preg_match_all($pattern, $str_search, $matches);
			$chars = preg_split($pattern, $str_search);

			$results .= implode(" ",$matches[0]);
			foreach ($chars as $row){
				if ($row){
					$row_array = explode(' ', $row);
					if (is_array($row_array)){
						foreach ($row_array as $word){
							if ($word) $results.=" +".trim($word)."";
						}
					}
					else{
						$results.=" +".trim($row)."";
					}
				}
			}
			return $results;
		}
		else{
			$search_array = explode(' ', $str_search);
			$content = implode(" +",$search_array);
			$content ="+".$content.'';
			return $content;
		}
	}	
	
	static function trimSpace($str=""){
		if($str==""){
			return;
		}
		$str = str_replace("&nbsp;", " ", $str);
		$str = preg_replace('![\t ]*[\r\n]+[\t ]*!', ' ', $str);
		return trim(preg_replace('/[[:space:]]/', ' ', trim($str)));

	}
	
	static function show_adv($img,$width,$height,$link,$type){
		global $url;	
		if($type == 1) $show = '<a href="'.$link.'" target="_blank"><img src="'.$img.'" width="'.$width.'" height="'.$height.'" border="0" alt="advertiser" /></a>';
		elseif($type == 2)
			$show = "<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0\" width=\"$width\" height=\"$height\">
	  <param name=\"movie\" value=\"$img\" />
	  <param name=\"wmode\" value=\"transparent\">
	  <param name=\"quality\" value=\"high\" />
	  <embed src=\"$img\" quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" width=\"$width\" height=\"$height\"></embed>
	</object>";
		else $show = "";
		return $show;
	}

   
    static function debug($array){
        echo '<div align="left"><pre>';
        print_r($array);
        echo '</pre></div>';
    }	
    
    static function send_email($to,$subject,$message,$sender_email,$sender){
	//Khai bao dia chi nguoi gui
		$from="From: $sender";
		$from.="<$sender_email>\n";
				
		//Khai bao dia chi nguoi nhan khi gui mail phat sinh loi
		$from.="X-Sender: ";
		$from.="<$sender_email>\n";
				
		//Khai bao dinh dang email
		$from.="X-Mailer: PHP\n";
		
		//Khai bao do uu tien cua mail doi voi nguoi gui
		$from.="X-Priority:: 1\n";
		$from.="Return-Path: ";
		
		//Khai bao dia chi email nguoi nhan khi gui mail phat sinh loi
		$from.="<$sender_email>\n";
				
		//Khai bao dinh dang email
		$from.="Content-Type: text/html; ";
		$from.="charset=utf-8\n";
				
		mail($to,$subject,$message,$from);
	}	
	
	static function hs_replace($in) {
		$in = preg_replace('/<img height="([^"]*)" width="([^"]*)" src="([^"]*)" alt="" \/>/', '<a href="\\3" class="highslide" onclick="return hs.expand(this)" ><img src="\\3" border="0" alt="" onload="HSImageResizer.createOn(this);" /></a>', $in);
		$in = preg_replace('/<img height="([^"]*)" width="([^"]*)" alt="" src="([^"]*)" \/>/', '<a href="\\3" class="highslide" onclick="return hs.expand(this)" ><img src="\\3" border="0" alt="" onload="HSImageResizer.createOn(this);" /></a>', $in);
		return $in;
	}
	//////////////////////Hàm bổ xung////////////////////////
	
	/////////////lay random ky tu
	function make_rand_str($length=8){
	$str = "";
	$chars = array(
		"1","2","3","4","5","6","7","8","9","0",
		"a","A","b","B","c","C","d","D","e","E","f","F","g","G","h","H","i","I","j","J",
		"k","K","l","L","m","M","n","N","o","O","p","P","q","Q","r","R","s","S","t","T",
		"u","U","v","V","w","W","x","X","y","Y","z","Z");

	$count = count($chars) - 1;

	srand((double)microtime()*1000000);

	for($i = 0; $i < $length; $i++)	{
		$str .= $chars[rand(0, $count)];
	}

	return($str);
}
      //////////////////////////kiem tra email/////////////////////
	  function validEmail($aEmail)
{
	$aEmail=ereg_replace("_","",$aEmail);	
	if(eregi("^[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,4}$",$aEmail, $regs))
  		return true;
	else
		return false;
}
///////////////////////////lu mang vao file/////////////////////////
function GetCacheFile($file){
	$content = @file_get_contents($file);
	$arr = unserialize($content);
	return $arr;
}

function PutCacheFile($file,$array){
	$content = serialize($array);
	@file_put_contents($file,$content);
}

function today()
{
	$date = date("D");
	$day = array("Mon" => "Th&#7913; hai", "Tue" => "Th&#7913; ba", "Wed" => "Th&#7913; t&#432;", "Thu" => "Th&#7913; n&#259;m", "Fri" => "Th&#7913; s&#225;u", "Sat" => "Th&#7913; b&#7843;y", "Sun" => "Ch&#7911; nh&#7853;t");
	$today = $day[$date].", ".date("d.m.Y");
	return $today;
}
  /////////////////end//////////////////      
}
?>