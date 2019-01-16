<?php
require_once '../../core/Module.php';
require_once '../../core/Form.php';
require_once '../../core/Debug.php';
require_once '../../core/config.php';
require_once '../../core/Init.php';
$email= System::getParam('email');
$sql =' select id,fullname from '.PREFIX_TABLE.'account where email = \''.$email.'\''; 
        
        DB::query($sql);
        $result=  DB::fetch_row();
		if($result){
			echo '<span style="color:red;" > Email này đã được đăng ký </span>';
		}else{
			echo '<span style="color:blue;" _check="1" id="check_email_span"> Email này chưa đăng ký !</span>';
		}
?>