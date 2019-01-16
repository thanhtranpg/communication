<?php
require_once '../../core/Module.php';
require_once '../../core/Form.php';
require_once '../../core/Debug.php';
require_once '../../core/config.php';
require_once '../../core/Init.php';

	$content='';
	$fullname = System::getParam('txtName');
	$company = System::getParam('txtCompany');
	$email = System::getParam('txtEmail');
	$content = System::getParam('txtDetail');
	$type = System::getParam('type');

	$to_email = CGlobal::$configs['email'];
	$mes = "<b>Thư liên hệ từ ".WEB_ROOT;
	$mes .= "<br><br>Thông tin khách hàng:</b><br><br>";
	$mes .= "Full Name: <b>$fullname</b><br>";
	$mes .= "Company: <b>$company</b><br>";
	$mes .= "Email: <b>$email</b><br>";
	$mes .= "<br><b>Message</b><br><br>";
    $mes .= $content;	
    $title='Thu khach hang '.$fullname;
    
    
    $arr['fullname'] = $fullname;
	$arr['email'] = $email;
    $arr['company'] = $company;
    $arr['content'] = $content;
    $arr['status'] = 1;
    $arr['cat'] = $type;
	$arr['time'] = TIME_NOW;
    $email_id = DB::insert(PREFIX_TABLE."email",$arr);
	if($email_id){
		if(!empty(CGlobal::$configs['sendemail']) && CGlobal::$configs['sendemail']==1){
				phpmail::send_mail($title,$mes,$email,$fullname,$to_email,CGlobal::$configs['web_name']);
		}
	
    }
    echo $email_id;
       