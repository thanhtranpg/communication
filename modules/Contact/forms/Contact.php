<?php
class ContactForm extends Form{
	function ContactForm(){
		Form::Form('ContactForm');		
		$sql = "SELECT * FROM ".PREFIX_TABLE."adv WHERE status = 1 and catid=6  ORDER BY ord Desc limit 1";
        $arr = DB::query($sql);   
        if (!empty($arr))
        {
          while ($row = mysql_fetch_assoc($arr)){
          	CGlobal::$website_title = $row['title'];
            CGlobal::$configs['web_keyword'] = $row['title'];
            CGlobal::$configs['web_des'] = $row['description'];
           	$this->banner = $row;
          }
        }
	}	
	function on_submit(){
		global $display;
	}
	
	function draw(){

		global $display;						
		$row = DB::select(PREFIX_TABLE . 'about_us', 'id = 1');
        $address = System::post_db_parse_html($row['des']);

        $row_copyright = DB::select(PREFIX_TABLE . 'about_us', 'id = 2');
        $copyright = System::post_db_parse_html($row_copyright['des']);

        $display->add('copyright', $copyright);
        $display->add('address', $address);
		
        $display->add('hotline', CGlobal::$configs['hotline']);
        $display->add('email', CGlobal::$configs['email_contact']); 
        $display->add('facebooklink', CGlobal::$configs['facebooklink']);
        $display->add('youtubelink', CGlobal::$configs['youtubelink']);
        $display->add('banner',$this->banner);
		
		$display->output('Contact');
	}
	
}
?>