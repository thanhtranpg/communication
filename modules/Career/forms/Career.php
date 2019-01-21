<?php
class CareerForm extends Form{
	private  $banner;
	function CareerForm(){
		Form::Form('CareerForm');	
		$row = DB::select(PREFIX_TABLE . 'about_us', 'id =6');
    $description = System::post_db_parse_html($row['des']);
    $this->banner['title'] = "Careers";
    $this->banner['description'] = $description;
    $this->banner['image'] = array();
    $sql = "SELECT * FROM ".PREFIX_TABLE."adv WHERE status = 1 and catid=5  ORDER BY ord Desc ";
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
		$careers = array();
		$sql = "SELECT * FROM ".PREFIX_TABLE."adv WHERE status = 1 and catid=11   ORDER BY ord Desc";
        $arr = DB::query($sql);   
        if (!empty($arr))
        {
          while ($row = mysql_fetch_assoc($arr)){
          	$careers[] = $row;
          }
          
        }
        $display->add('careers',$careers);
		$display->add('banner',$this->banner);
		$display->output('Career');
	}
	
}
?>