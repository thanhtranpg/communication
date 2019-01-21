<?php
class About_usForm extends Form{
	private  $banner ;
	function About_usForm(){
		Form::Form('About_usForm');
    $row = DB::select(PREFIX_TABLE . 'about_us', 'id = 4');
    $description = System::post_db_parse_html($row['des']);
    $this->banner['title'] = "ABOUT US";
    $this->banner['description'] = $description;
    $this->banner['image'] = array();
		$sql = "SELECT * FROM ".PREFIX_TABLE."adv WHERE status = 1 and catid=3  ORDER BY ord Desc ";
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