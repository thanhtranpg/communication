<?php
class About_usForm extends Form{
	private  $banner = 1;
	function About_usForm(){
		Form::Form('About_usForm');	
		$sql = "SELECT * FROM ".PREFIX_TABLE."adv WHERE status = 1 and catid=3  ORDER BY ord Desc limit 1";
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
	
	function draw(){
		global $display;
		$our_clients = array();
		$sql = "SELECT * FROM ".PREFIX_TABLE."adv WHERE status = 1 and catid=10  ORDER BY ord Desc";
        $arr = DB::query($sql);   
        if (!empty($arr))
        {
          while ($row = mysql_fetch_assoc($arr)){
          	$our_clients[] = $row;
          }
          
        }
    $display->add('our_clients',$our_clients);
		$display->add('banner',$this->banner);
		$display->output('About_us');
	}
	
}
?>