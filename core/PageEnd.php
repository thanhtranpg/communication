<script src="<?php echo STATIC_URL;?>www/assets/dist/aos.js?v=<?php echo CGlobal::$version; ?>"></script>

<script src="<?php echo STATIC_URL;?>www/assets/dist/jquery.zoomslider.min.js?v=<?php echo CGlobal::$version; ?>"></script>

<script src="<?php echo STATIC_URL;?>www/assets/js/javascript.js?v=<?php echo CGlobal::$version; ?>"></script>
<script type="text/javascript">

  $('#send_email_contact').click(function(){
    var txtName = $('#txtName').val(); 
    var txtCompany = $('#txtCompany').val();
    var txtEmail = $('#txtEmail').val();
    var txtDetail = $('#txtDetail').val();
    var mess = '';
    $('.message_email').html(mess);
    $('.message_email').addClass('ms_error');
    $('.message_email').removeClass('ms_seccess');
    if( txtName == '' ){
    	mess = 'Please input full name!';
    	$('.message_email').html(mess);
    	$('#txtName').focus();
    	return false;
    }

    if( txtName == '' ){
    	mess = 'Please input full name!';
    	$('.message_email').html(mess);
    	$('#txtName').focus();
    	return false;
    }

    if( txtEmail == '' ){
    	mess = 'Please input E-mail address!';
    	$('.message_email').html(mess);
    	$('#txtEmail').focus();
    	return false;
    }else if(!validateEmail(txtEmail)){
    	mess = 'E-mail address not validate!';
    	$('.message_email').html(mess);
    	$('#txtEmail').focus();
    	return false;
    }

    if( txtCompany == '' ){
    	mess = 'Please input Company / Organization!';
    	$('.message_email').html(mess);
    	$('#txtCompany').focus();
    	return false;
    }

    if( txtDetail == '' ){
    	mess = 'Please input project detail!';
    	$('.message_email').html(mess);
    	$('#txtDetail').focus();
    	return false;
    }
    send_email_contact(txtEmail,txtName,txtDetail,txtCompany,1,'#send_email_contact')
  })

  function validateEmail(email) {
	  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	  return re.test(email);
	}
  function scrollto(element){

  }

  $('#send_email_career').click(function(){
  	var txtName = $('#txtName').val();
    var txtEmail = $('#txtEmail').val();
    var txtDetail = $('#txtDetail').val();
  	var mess = '';
  	$('.message_email').html(mess);
    $('.message_email').addClass('ms_error');
    $('.message_email').removeClass('ms_seccess');
    if( txtName == '' ){
    	mess = 'Please input full name!';
    	$('.message_email').html(mess);
    	$('#txtName').focus();
      scrollto('.message_email');
    	return false;
    }

    if( txtName == '' ){
    	mess = 'Please input full name!';
    	$('.message_email').html(mess);
    	$('#txtName').focus();
      scrollto('.message_email');
    	return false;
    }

    if( txtEmail == '' ){
    	mess = 'Please input E-mail address!';
    	$('.message_email').html(mess);
    	$('#txtEmail').focus();
      scrollto('.message_email');
    	return false;
    }else if(!validateEmail(txtEmail)){
    	mess = 'E-mail address not validate!';
    	$('.message_email').html(mess);
    	$('#txtEmail').focus();
      scrollto('.message_email');
    	return false;
    }


    if( txtDetail == '' ){
    	mess = 'Please input your message!';
    	$('.message_email').html(mess);
    	$('#txtDetail').focus();
      scrollto('.message_email');
    	return false;
    }
    
    send_email_contact(txtEmail,txtName,txtDetail,'',2,'#send_email_career')
  })
              

    function send_email_contact(txtEmail,txtName,txtDetail,txtCompany,type,bt){
      $(bt).hide();
      $('.lds-roller').show();
      $.ajax({
    	   type:"POST",
    	   data:{'txtEmail': txtEmail , 'txtName' : txtName , 'txtDetail' : txtDetail , 'txtCompany' : txtCompany , 'type' : type },
    	   url:"modules/Ajax/sendEmail.php",
    	   dataType:"json",
    	   success:function(data){
      		$('.message_email').removeClass('ms_error');
      		$('.message_email').addClass('ms_seccess');
    	   	$('.message_email').html('Contact sent was successful');
          $('#txtName').val(''); 
          $('#txtCompany').val('');
          $('#txtEmail').val('');
          $('#txtDetail').val('');
    	   	$(bt).show();
      		$('.lds-roller').hide();

      	   }									
  	   });		
	}

	function load_our_work_media(id,type){
      $.ajax({
    	   type:"POST",
    	   data:{'id': id , 'type' : type },
    	   url:"modules/Ajax/loadOurWorkMedia.php",
    	   dataType:"html",
    	   success:function(data){
    	   	$('.load_media').html(data);
      	   }									
  	   });		
	}

	function media_play(a,mes){
		$(a).attr('_id',mes);
		console.log($(a).attr('href'));
	}

</script>



<style>
.lds-roller {
  display: inline-block;
  position: relative;
  width: 20px;
  height: 20px;
}
.lds-roller div {
  animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  transform-origin: 32px 32px;
}
.lds-roller div:after {
  content: " ";
  display: block;
  position: absolute;
  width: 3px;
  height: 3px;
  border-radius: 50%;
  background: #5d5c5c;
  margin: -3px 0 0 -3px;
}
.lds-roller div:nth-child(1) {
  animation-delay: -0.036s;
}
.lds-roller div:nth-child(1):after {
  top: 50px;
  left: 50px;
}
.lds-roller div:nth-child(2) {
  animation-delay: -0.072s;
}
.lds-roller div:nth-child(2):after {
  top: 54px;
  left: 45px;
}
.lds-roller div:nth-child(3) {
  animation-delay: -0.108s;
}
.lds-roller div:nth-child(3):after {
  top: 57px;
  left: 39px;
}
.lds-roller div:nth-child(4) {
  animation-delay: -0.144s;
}
.lds-roller div:nth-child(4):after {
  top: 58px;
  left: 32px;
}
.lds-roller div:nth-child(5) {
  animation-delay: -0.18s;
}
.lds-roller div:nth-child(5):after {
  top: 57px;
  left: 25px;
}
.lds-roller div:nth-child(6) {
  animation-delay: -0.216s;
}
.lds-roller div:nth-child(6):after {
  top: 54px;
  left: 19px;
}
.lds-roller div:nth-child(7) {
  animation-delay: -0.252s;
}
.lds-roller div:nth-child(7):after {
  top: 50px;
  left: 14px;
}
.lds-roller div:nth-child(8) {
  animation-delay: -0.288s;
}
.lds-roller div:nth-child(8):after {
  top: 45px;
  left: 10px;
}
@keyframes lds-roller {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

</style>



<?php echo System::$extraFooter;?>

<?php

//Set default debug
if (isset($_GET["xbug"])){
	System::my_setcookie("xbug",(int)(boolean)$_GET["xbug"]);
	if (isset($_GET["level"])){
		System::my_setcookie("level",$_GET["level"]);
	}
}

if (isset($_GET["tbug"])){
	System::my_setcookie("tbug",(int)$_GET["tbug"]);
}


global $start_rb;
$mtime 			= microtime();
$mtime 			= explode(" ",$mtime);
$mtime 			= $mtime[1] + $mtime[0];
$end_rb 		= $mtime;			
$page_load_time = round(($end_rb - $start_rb),5)."s";	

$time_now 		= date('H:i:s - d-m-Y', TIME_NOW);
$html_debug 	= CGlobal::$query_debug;
$queries_count 	= DB::num_queries();
$queries_time 	= CGlobal::$query_time;
$conn_debug 	= CGlobal::$conn_debug;


if(DEBUG){
	$sql_load_time = round($queries_time,5) ."s";
	
	if(isset($_REQUEST["level"]) && intval($_REQUEST["level"]) == 1){
		$html_debug = "<ol>{$html_debug}</ol>";
	}
	
	echo "<center><div align=\"left\" style=\"clear:left;width:950px;border:1px red solid;padding-left:30px;padding-bottom:30px;overflow: auto;\">";
	echo "<div style='text-align:center'><span style='color:#444;'>Pageload time : $page_load_time</span></div>";
	echo "<html><head><title>SQL Debugger</title><body bgcolor='white'>";
	echo "<h1 align='center'>SQL Total Time: {$sql_load_time} for {$queries_count} queries</h1>";
	echo "<div style='text-align:center'><span style='color:#666;'>$conn_debug</span></div>";	
	echo "<br>{$html_debug}";
	
	if(StaticCache::$cacheFilesList!=''){
		echo "<table width='95%' border='1' cellpadding='6' cellspacing='0' bgcolor='#FEFEFE'  align='center'>
			 <tr>
				  <td style='font-size:14px' bgcolor='#EFEFEF' align='center'><span style='color:green'><b>STATIC CACHES</b></span></td>
				 </tr>
				<tr>
			  <td style='font-family:courier, monaco, arial;font-size:14px;color:green'>
			 <ol> ".StaticCache::$cacheFilesList."</ol>
			  </td>
			 </tr>
			 <tr>
			</table><br />";
	}
	if(ArrCache::$cache_list!=''){
		echo "<table width='95%' border='1' cellpadding='6' cellspacing='0' bgcolor='#FEFEFE'  align='center'>
			 <tr>
				  <td style='font-size:14px' bgcolor='#EFEFEF' align='center'><span style='color:green'><b>ARRAY CACHES</b></span></td>
				 </tr>
				<tr>
			  <td style='font-family:courier, monaco, arial;font-size:14px;color:green'>
			 <ol> ".ArrCache::$cache_list."</ol>
			  </td>
			 </tr>
			 <tr>
			</table><br />\n\n";
	}
	
	echo "<br /><div align='center'><strong>Pageload time: <span style='color:red'>{$page_load_time}</span> - Total SQL Time: <span style='color:red'>{$sql_load_time}</span> - Total queries : <span style='color:red'>{$queries_count}</span> -  Server IP address : <span style='color:red'>{$_SERVER['SERVER_ADDR']}</span> - Time now is : <span style='color:red'>{$time_now}</span></strong></div></body></html>";
	
	if(isset($_REQUEST["level"]) && intval($_REQUEST["level"]) == 4){
		if(CGlobal::$error_handle){
			echo "<table width='95%' border='1' cellpadding='6' cellspacing='0' bgcolor='#FEFEFE'  align='center'>
			<tr><td style='font-size:14px' bgcolor='#EFEFEF'  align='center'>Enbac Error handle</td></tr>
			".CGlobal::$error_handle."
			</table><br />\n\n";
		}
	}
		
	echo "</div></center>";	
	//All error here	
}



DB::close();
?>


</body>
</html>