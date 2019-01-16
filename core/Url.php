<?php
define('REWRITE_ON',CGlobal::$configs['rewrite']);
//define('REWRITE_ON',1);
class Url{
		static function build_all($except=array(), $addition=false,$page_name='page_no'){
	    $nopage=is_array( $except)? $except[$page_name]:1;
				
		
		if(is_array($except))
			$except+=array('form_block_id','ebug','tbug','delcache','delscache','utm_source','utm_campaign','utm_content','utm_medium');
		else
			$except=array('form_block_id','ebug','tbug','delcache','delscache','utm_source','utm_campaign','utm_content','utm_medium');
		
		$url  = '';
		$main = '';
		$params = array();
		
		foreach($_POST as $key=>$value){
			if(!in_array($key, $except) && $key!='form_block_id'){
				if(!is_array($value)){
					if($key=='main'){
						$main=urlencode($value);
					}
					else/*if($value!='')*/
						//$url.=($url?'&':'').urlencode($key).'='.urlencode($value);
						$params[urlencode($key)] = urlencode($value);
				}
			}
		}
		
		
		foreach($_GET as $key=>$value){	
			
			if(!in_array($key, $except) && $key!='form_block_id' && !isset($_POST[$key])){
				if($key=='main'){
					$main=urlencode($value);
				}
				else/*if($value!='')*/
					//$url.=($url?'&':'').urlencode($key).'='.urlencode($value);
					$params[$key] = $value;
			}
		}
		
		if($addition){
				$per_param_temp = array();
				$all_param = explode('&',$addition);
				foreach ($all_param as $value){
						$per_param_temp = explode('=',$value);
						$params[$per_param_temp[0]] = $per_param_temp[1];
				}
				
		}
		
		$params[$page_name]=$nopage;
		//echo "<pre>";
		//print_r($params);
		//echo "<pre>";
		$url = URL::build($main,$params);
		
		return $url?$url:WEB_DIR;
	}
	
	
	static function build_all_admin($except=array(), $addition=false,$file_name=''){
		if(is_array($except))
			$except+=array('form_block_id','xbug','tbug','delcache','delscache','utm_source','utm_campaign','utm_content','utm_medium');
		else
			$except=array('form_block_id','xbug','tbug','delcache','delscache','utm_source','utm_campaign','utm_content','utm_medium');
		
		$url  = '';
		$main = '';
		$params = array();
		foreach($_POST as $key=>$value){
			if(!in_array($key, $except) && $key!='form_block_id'){
				if(!is_array($value)){
					if($key=='main'){
						$main=urlencode($value);
					}
					else/*if($value!='')*/
						//$url.=($url?'&':'').urlencode($key).'='.urlencode($value);
						$params[urlencode($key)] = urlencode($value);
				}
			}
		}
		
		foreach($_GET as $key=>$value){	
			
			if(!in_array($key, $except) && $key!='form_block_id' && !isset($_POST[$key])){
				if($key=='main'){
					$main=urlencode($value);
				}
				else/*if($value!='')*/
					//$url.=($url?'&':'').urlencode($key).'='.urlencode($value);
					$params[$key] = $value;
			}
		}
		
		if($addition){
				$per_param_temp = array();
				$all_param = explode('&',$addition);
				foreach ($all_param as $value){
						$per_param_temp = explode('=',$value);
						$params[$per_param_temp[0]] = $per_param_temp[1];
				}
				
		}
		$url = URL::build_admin($main,$params,'',$file_name);
		return $url?$url:WEB_DIR;
	}
	
	static function build_current($params=array(),$anchor=''){
		return URL::build((isset(System::$main['name'])?System::$main['name']:'home'),$params,$anchor);
	}
	
	static function build($main,$params=array(),$anchor=''){
		$request_string = '';
		//$ext = '.html';
		$ext = '';
		$other_params ='';
		if(!REWRITE_ON){
				if($main=='home')
						$request_string = '';
				else{
					$request_string = '?main='.$main;
				}
		
				if ($params){
					foreach ($params as $param=>$value){
						if(is_numeric($param)){
							if(isset($_REQUEST[$value]) && $value!='main'){
								$request_string .= ($request_string?'&':'?').$value.'='.urlencode($_REQUEST[$value]);
							}
						}
						elseif($param!='main'){
							$request_string .= ($request_string?'&':'?').$param.'='.urlencode($value);
						}
					}
				}
		}
		else{
				$array_page = array(	
										'home' 			=> '',
										'about_us' 		=> 'about',
										'service' 		=> 'service',
										'our_work' 		=> 'ourwork',	
         	                            'career' 		=> 'career',						
										'contact' 		=> 'contact',
                                        'event' 		=> 'event',
										
									);
				if ($params){
						$params_order = array();
						$prefix_params = array();
						// thu tu cac param truyen vao theo tung trang
						switch ($main){
						
						
						
								case 'news':
										$params_order[$main] = array('Newsid','xtname','page_no','catid');
										$prefix_params[$main] = array(
										 								'Newsid' =>'muc',	
																		'page_no' =>'trang'	
															  );
										break;	
								case 'our_work':
										$params_order[$main] = array('page_no','catid','xtname');
										$prefix_params[$main] = array(
										 																						
															  );
										break;	
                                	case 'cart':
										$params_order[$main] = array('cmd');
                                        $prefix_params[$main] = array(
										 							
																		'page_no' =>'trang'															
															  );
										
										break;	        
								    case 'course':
										$params_order[$main] = array('Courseid','xtname','page_no');
										$prefix_params[$main] = array(
																		'page_no' =>'trang'															
															  );
										break;	
                                 	case 'place':
										$params_order[$main] = array('Placeid','xtname');
										$prefix_params[$main] = array(
										 								'Placeid' =>'pid',	
																															
															  );
										break;							
								case 'about_us':
										$params_order[$main] = array('id');
										
										break;
							  
						      case 'feedback':
										$params_order[$main] = array('Feedbackid','xtname','page_no','feed');
										$prefix_params[$main] = array('Feedbackid'		=>'cat'	,
																		'page_no' =>'trang'																	
															  );
																	  
										break;	
									
						}
						
						
						
						$new_params = (isset($params_order[$main])) ? array_fill_keys($params_order[$main], '') : array();
						$new_params += array('other_params'=>'');
						
						foreach ($params as $param=>$value){
								if(is_numeric($param)){ // truong hop chi truyen vao param khong co gia tri di kem thi lay gia tri dang co tren url
										if(isset($_REQUEST[$value]) && $value!='main'){
												$param = $value;
												$value = $_REQUEST[$value];
										}
										
								}
								if(!is_numeric($param)&&$param!='main'){
										if(isset($new_params[$param])){
												if(isset($prefix_params[$main][$param])){
														$new_value = $prefix_params[$main][$param].urlencode($value);
												}
												else{
														$new_value = urlencode($value);
												}
												$new_params[$param] = $new_value;
												
										}
										else{
												if($new_params['other_params']){
														$new_params['other_params'] .= '&'.$param.'='.urlencode($value);
												}
												else{
														$new_params['other_params'] = '?'.$param.'='.urlencode($value);
												}
										}
								}
								
						}
						//check trang can add them ten trang vao
						if(isset($params_order[$main])){
							
							foreach ($new_params as $key=>$value){
									if($value && $key!='other_params' && $params_order[$main]){
										$request_string = ($request_string) ? '-'.$request_string : '';
										$request_string = $value.$request_string;
										
											
											
									}
									
							}
						}
						
						// neu la trang profile chi co user_name khong co param di kem thi khong can duoi .html
						if($main=='profile' && count($params) == 1 && isset($params['user_name'])){
								$request_string = $request_string.$new_params['other_params'];
						}
						else{
								
								if($request_string){
										$main = (isset($array_page[$main])) ? '-'.$array_page[$main] : '';
										$request_string = $request_string.$main.$ext.$new_params['other_params'];
								}
								else{ // neu khong dc rewrite
										$main = (isset($array_page[$main])) ? $array_page[$main] : $main;
										$request_string = $main.$ext.$new_params['other_params'];
								}
						}
						
						
				}
				else{
						if($main=='home')
								$request_string = '';
						else{
								$request_string = (isset($array_page[$main])) ? $array_page[$main].$ext : $main.$ext;
						}
						
						
				}
		}		
		return WEB_DIR.$request_string.$anchor;
	}
	
	static function build_admin($main,$params=array(),$anchor='',$file_name=''){
		$request_string = '';
		$ext = '.html';
		$other_params ='';
		
		if($main=='home')
				$request_string = '';
		else{
			$request_string = '?main='.$main;
		}

		if ($params){
			foreach ($params as $param=>$value){
				if(is_numeric($param)){
					if(isset($_REQUEST[$value]) && $value!='main'){
						$request_string .= ($request_string?'&':'?').$value.'='.urlencode($_REQUEST[$value]);
					}
				}
				elseif($param!='main'){
					$request_string .= ($request_string?'&':'?').$param.'='.urlencode($value);
				}
			}
		}
		
				
		return WEB_DIR.$file_name.$request_string.$anchor;
	}
	
	static function redirect_current($params=array(),$anchor = ''){
		
		URL::redirect(System::$main['name'],$params,$anchor);
	}
	
	static function redirect_href($params=false){
		if(Url::check('href')){
			Url::redirect_url(Url::attach($_REQUEST['href'],$params));
			return true;
		}
	}
	
	static function check($params){
		if(!is_array($params)){
			$params=array(0=>$params);
		}
		
		foreach($params as $param=>$value){
			if(is_numeric($param)){
				if(!isset($_REQUEST[$value])){
					return false;
				}
			}
			else{
				if(!isset($_REQUEST[$param])){
					return false;
				}
				else{
					if($_REQUEST[$param]!=$value){
						return false;
					}
				}
			}
		}
		return true;
	}
	
	//Chuyen sang trang chi ra voi $url
	static function redirect($main=false,$params=false, $anchor=''){
		
		if(!$main && !$params){
			Url::redirect_url();
		}
		else{
			Url::redirect_url(Url::build($main, $params,$anchor));
		}
	}
	
	static function redirect_url($url=false){
		/*if(!$url || $url==''){
			$url='?'.$_SERVER['QUERY_STRING'];
		}*/	
		$url = str_replace(array(WEB_ROOT,WEB_DIR),'',$url);
		
		if (REWRITE_ON){
			require_once(ROOT_PATH.'includes/rewrite.class.php');
			$rewrite = new REWRITE_URL();
			$url= $rewrite->doReplace($url);
			unset($rewrite);
		}
		
		header('Location:'.WEB_DIR.$url);
		System::halt();
	}
	
	static function access_denied(){
		Url::redirect('home');
		//header("Location: ".WEB_ROOT."err/error.html");
		//die();
	}
	
	static function get($name,$default=''){
		if (isset($_REQUEST[$name])){
			return $_REQUEST[$name];
		}
		elseif (isset($_POST[$name])){
			return $_POST[$name];
		}
		elseif(isset($_GET[$name])){
			return $_GET[$name];
		}
		else{
			return $default;		
		}
	}
	
	/**
	 *@author PhongCT
	 *get Params without space (use function trim())
	 */
	static function tget($name,$default=''){
		if (isset($_REQUEST[$name])){
			return trim($_REQUEST[$name]);
		}
		elseif (isset($_POST[$name])){
			return  trim($_POST[$name]);
		}
		elseif(isset($_GET[$name])){
			return  trim($_GET[$name]);
		}
		else{
			return $default;
		}
	}
	static function sget($name,$default=''){
		return strtr(URL::get($name, $default),array('"'=>'\\"'));
	}
	
	static function cdouble( $doubleval ){
		//if(!is_numeric($doubleval))
		{
			$doubleval=strtr($doubleval,array('.'=>''));
			$doubleval=strtr($doubleval,array(','=>'.'));
		}
		return doubleval($doubleval);
	}
	
	static function open_popup($url=false,$width=false,$height=false,$top=false,$left=false,$event=false,$resizable=0,$toolbar=0,$status=0,$scrollbars=0,$address_bar=0,$menubar=0){
		if(!$url)
			$url	='about:blank';
		elseif(strpos($url,'?')===false)
			$url.='?is_popup=1';
		else 
			$url.='&is_popup=1';
			
		if(!$width)
			$width	=300;
		if(!$height)
			$height	=400;
			
		if(!$top)
			$top	='\' + (screen.height -'.$height.')/2 +\'';		
		if(!$left)
			$left	='\' + (screen.width -'.$width.')/2 +\'';
		
		if(!$event)
			$event	='onclick';	

		return $event.'="window.open(\''.$url.'\' ,\'\',\'status='.$status.',toolbar='.$toolbar.',scrollbars='.$scrollbars.',resizable='.$resizable.',width='.$width.',height='.$height.',top='.$top.',left='.$left.',location ='.$address_bar.',menubar ='.$menubar.'\');"';	
	}
	
	static function query()
			{
			$s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
			$protocol = substr(strtolower($_SERVER["SERVER_PROTOCOL"]), 0, strpos(strtolower($_SERVER["SERVER_PROTOCOL"]), "/")) . $s;
			$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
			return $protocol . "://" . $_SERVER['SERVER_NAME'] . $port . $_SERVER['REQUEST_URI'];
			}
	
};

?>