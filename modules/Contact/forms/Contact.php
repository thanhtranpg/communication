<?php
class ContactForm extends Form{
    private  $banner ;
	function ContactForm(){
		Form::Form('ContactForm');		
		$row = DB::select(PREFIX_TABLE . 'about_us', 'id = 7');
        $description = System::post_db_parse_html($row['des']);
        $this->banner['title'] = "Contact Us";
        $this->banner['description'] = $description;
        $this->banner['image'] = array();
            $sql = "SELECT * FROM ".PREFIX_TABLE."adv WHERE status = 1 and catid=6  ORDER BY ord Desc ";
            $arr = DB::query($sql);   
            if (!empty($arr))
            {
              while ($row = mysql_fetch_assoc($arr)){
                
                $this->banner['image'][] = $row['image'];
              }
              
            }
        CGlobal::$website_title = $this->banner['title'];
        CGlobal::$configs['web_keyword'] = $this->banner['title'];
        CGlobal::$configs['web_des'] = $this->banner['description'];
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