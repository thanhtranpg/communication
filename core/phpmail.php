 <?php
/**
 * @author 	Tran Quang Thanh
 * 			Mail: tqt_tqt2001@yahoo.com
 * 			Mobile: 01656 254 342
 * 			03/02/2010
 Access aount google
 https://accounts.google.com/DisplayUnlockCaptcha
 https://www.google.com/settings/security/lesssecureapps
 */

class phpmail{
  
   function __construct() {
	}
	
	 static function send_mail($title='',$mes='',$from_email,$from_name,$to_email,$to_name){
	                $user = CGlobal::$configs['email'];
					$pass = CGlobal::$configs['email_pass'];
					//echo $from_email.$to_email.$to_name.$from_email.$from_name;
                    //echo $user='thanhtqnd@gmail.com';
		            //$pass='adtqt141284';
								include "PHPMailer/class.phpmailer.php"; 
								include "PHPMailer/class.smtp.php"; 
								
								$mail = new PHPMailer();
								$mail->IsSMTP(); // set mailer to use SMTP
								$mail->Host = "smtp.gmail.com"; // specify main and backup server
								$mail->Port = 465; // set the port to use
								$mail->SMTPAuth = true; // turn on SMTP authentication
								$mail->SMTPDebug  = 1;    
								$mail->SMTPSecure = 'ssl';
								$mail->Username = $user; // your SMTP username or your gmail username
								$mail->Password = $pass; // your SMTP password or your gmail password
								
								
								$mail->From = $from_email;
								$mail->FromName = $from_name; // Name to indicate where the email came from when the recepient received
								$mail->AddAddress($to_email,$to_name);
								$mail->AddReplyTo($from_email,$from_name);
								$mail->WordWrap = 50; // set word wrap
								$mail->IsHTML(true); // send as HTML
								$mail->Subject = $title;
								$mail->Body =$mes;//HTML Body
								
								$mail->AltBody = "<a href=\"thuocdongypqa.vn\">thuocdongypqa.vn</a>";  //Text Body
								//$mail->SMTPDebug = 2;
								if(!$mail->Send())
								{
									//echo "<h1>Erro: " . $mail->ErrorInfo . '</h1>';
								}else return 1;
	                 }
	
	}
?>