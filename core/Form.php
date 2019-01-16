<?php
class Form{
	var $name = false, $error_messages = false, $succes_messages = false, $errNum = 0;

	function beginForm($upload=false, $method='post', $target=false, $action=false, $return=false,$ext=""){
		$html='<form '.(($this->name)?'name="'.$this->name.'" id="'.$this->name.'" ':'').' method="'.$method.'" '.($upload?' enctype="multipart/form-data" ':'').($target?' target="'.$target.'" ':'').($action?' action="'.$action.'" ':'').$ext.' >';
		if(Module::$name)
		$html.= '<input type="hidden" name="form_block" value="'.Module::$name.'">';
		if ($return)
		return  $html;
		else
		echo $html;
	}

	function endForm($return = false){
		if ($return)return   '</form>';else echo '</form>';
	}

	function Form($name=false){$this->name=$name;}
	
	function link_css($file_name){		
		if(strpos(System::$extraHeaderCSS,'<link rel="stylesheet" href="'.STATIC_URL.$file_name.'?ver='.CGlobal::$css_ver.'" type="text/css">')===false)
		System::$extraHeaderCSS .= '<link rel="stylesheet" href="'.STATIC_URL.$file_name.'?ver='.CGlobal::$css_ver.'" type="text/css">'."\n";
	}

	function link_js($file_name){
		if(strpos(System::$extraHeaderJS,'<script type="text/javascript" src="'.STATIC_URL.$file_name.'?ver='.CGlobal::$js_ver.'"></script>')===false)
		System::$extraHeaderJS .= '<script type="text/javascript" src="'.STATIC_URL.$file_name.'?ver='.CGlobal::$js_ver.'"></script>'."\n";
	}

	function link_header($text){
		System::$extraHeader .= $text."\n";
	}
	
	function link_footer($text){
		System::$extraFooter .= $text."\n";
	}
	function on_submit(){}

	function setFormError($name, $msg){
		@$this->error_messages[$this->name][$name].=$msg;
		$this->errNum++;
	}

	function showFormErrorMessages($return=false,$error_title='Thông báo lỗi'){
		if($this->error_messages[$this->name]){
			$txt ='<div style="border:solid 1px #f00; padding:5px" align="center" class="msg_alert">
						<center style="margin-bottom:5px;"><b><font color=red>'.$error_title.'</font></b></center>						
						<div align="left"  style="padding:5px;">
					<div style="margin-left:20px;">';

			foreach ($this->error_messages[$this->name] as $name=>$error_message){
				$txt .="<div style=\"margin-bottom:5px\">".$error_message."</div>";
			}
			$txt .= '</div>
					</div>
					
					</div><div style="height:20px">&nbsp;</div>';

			if($return)return $txt;
			else echo $txt;
		}
	}
	
	function setFormSucces($name, $msg){
		@$this->succes_messages[$this->name][$name].=$msg;
		$this->errNum++;
	}
	
	function showFormSuccesMessages($return=false,$error_title='THÔNG BÁO'){
		if($this->succes_messages[$this->name]){
			$txt ='<div style="width:96%; border:solid 1px #CCFF66; padding:10px" align="center" class="msg_alert">
						<center style="margin:10px;"><b><font color=green>'.$error_title.'</font></b></center>						
						<div align="left"  style="margin-bottom:10px;padding:5px;">
					<div style="margin-left:20px;">';

			foreach ($this->succes_messages[$this->name] as $name=>$succes_message){
				$txt .="<div style=\"margin-bottom:5px\">".$succes_message."</div>";
			}
			$txt .= '</div>
					</div>
					
					</div><div style="height:18px">&nbsp;</div>';

			if($return)return $txt;
			else echo $txt;
		}
	}

	function checkFormInput($inputLabel,$inputName,$inputVal=false,$inputCheckType='str',$required=false, $msg='',$min=false, $max=false,$inputType='str',$valDefault=''){
		
		$inputVal_leng = mb_strlen($inputVal,'UTF-8');
		
		if($msg!='')
		$msg.='<br/>';
		if($inputVal===false){
			$inputVal=Url::get($inputName,$valDefault);
		}

		if($required && $inputVal===''){
			$this->errNum++;
			$this->error_messages[$this->name][$inputName]=$msg."Bạn chưa nhập giá trị vào <font color=blue><i><b>".$inputLabel."</b></i></font>";
			return ;
		}

		if($inputCheckType=='int' || $inputCheckType=='double'){

			if($max!==false && $min!==false && $max==$min && $inputVal!=$max){
				$this->errNum++;
				$this->error_messages[$this->name][$inputName]=$msg."<font color=blue><i><b>".$inputLabel."</b></i></font> chỉ có thể lấy giá trị bằng ".number_format($max,0,',','.');
				return ;
			}
			
			if($max!==false && $inputVal>$max){
				$this->errNum++;
				$this->error_messages[$this->name][$inputName]=$msg."<font color=blue><i><b>".$inputLabel."</b></i></font> phải là một giá trị nhỏ hơn hoặc bằng ".number_format($max,0,',','.');
				return ;
			}
			if($min!==false && $inputVal<$min){
				$this->errNum++;
				$this->error_messages[$this->name][$inputName]=$msg."<font color=blue><i><b>".$inputLabel."</b></i></font> phải là một giá trị lớn hơn hoặc bằng ".number_format($min,0,',','.');
				return ;
			}
		}
		elseif($inputVal_leng==0 && !$required){
			return ;
		}
		else{
			
			if($max && $inputVal_leng>$max){
				$this->errNum++;
				$this->error_messages[$this->name][$inputName]=$msg."<font color=blue><i><b>".$inputLabel."</b></i></font> phải có độ dài dưới ".number_format($max,0,',','.')." ký tự!";
				return ;
			}
			if($min && $inputVal_leng<$min){
				$this->errNum++;
				$this->error_messages[$this->name][$inputName]=$msg."<font color=blue><i><b>".$inputLabel."</b></i></font> phải có độ dài từ ".number_format($min,0,',','.')." ký tự trở lên!";
				return ;
			}
		}
		if($inputCheckType=='uname'){
			//if(preg_match('/[^A-Za-z0-9_.]/',$inputVal))
			if(preg_match('/[^A-Za-z0-9_]/',$inputVal)){
				$this->errNum++;
				$this->error_messages[$this->name][$inputName]=$msg.'<font color=blue><i><b>'.$inputLabel.'</b></i></font> chỉ được dùng các ký tự từ a-z, A-Z, 0-9 và "_", "."';
				return ;
			}
		}
		if($inputCheckType=='email'){
			if(!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,6}$",$inputVal) ){
				$this->errNum++;
				$this->error_messages[$this->name][$inputName]=$msg.'<font color=blue><i><b>'.$inputLabel.'</b></i></font> phải có dạng abc@xyz.com';
				return ;
			}
		}
	}
	
	function draw(){}
	
	function on_draw(){$this->draw();}
}
?>