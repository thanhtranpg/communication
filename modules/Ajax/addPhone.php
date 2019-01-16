<?php
require_once '../../core/Module.php';
require_once '../../core/Form.php';
require_once '../../core/Debug.php';
require_once '../../core/config.php';
require_once '../../core/Init.php';

	$content='';
	$customer_phone = System::getParam('customer_phone');
	$customer_name = System::getParam('customer_name')!=''?System::getParam('customer_name'):'Khach';
	$customer_message = System::getParam('customer_message');
	$url = System::getParam('url');

	
		$title = $customer_name.' yeu cau goi lai so '.$customer_phone;
		
		$to_email = CGlobal::$configs['email'];
		$mes = "<b>Thư liên hệ từ: ".$url;
		$mes .= "<br><br>Khách yêu cầu gọi lại</b><br><br>";
		$email='thuocdongypq@gmail.com';
		$mes .= "Họ và Tên: <b>$customer_name</b><br>";
		$mes .= "Phone: <b>$customer_phone</b><br>";
		$mes .= "<b>Nội Dung Tin Nhắn</b><br>";
		$mes .= $customer_message;
			
        
        
        
        $arr['title'] = $customer_phone;
		$arr['time'] = TIME_NOW;
		$arr['des'] = $mes;
        $email_id = DB::insert(PREFIX_TABLE."phone",$arr);
         echo $email_id;
		if($email_id){			
		 phpmail::send_mail($title,$mes,$email,$customer_phone,$to_email,CGlobal::$configs['web_name']);
        }
       