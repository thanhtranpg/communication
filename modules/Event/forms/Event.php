<?php
class EventForm extends Form{
	private  $banner = 1;
	function EventForm(){
		Form::Form('EventForm');	
		$sql = "SELECT * FROM ".PREFIX_TABLE."adv WHERE status = 1 and catid=12  ORDER BY ord Desc limit 1";
        $arr = DB::query($sql);   
        if (!empty($arr))
        {
          while ($row = mysql_fetch_assoc($arr)){
          	CGlobal::$website_title = $row['title'];
          	CGlobal::$configs['web_keyword'] = $row['title'];
            CGlobal::$configs['web_des'] = $row['title'];
           	$this->banner = $row;
          }
          
        }

	}	
	
	function draw(){
		global $display;
		
		$display->add('banner',$this->banner);
		$display->output('Event');
	}
	
}
?>