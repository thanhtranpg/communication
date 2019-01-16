<?php
class CareerForm extends Form{
	private  $banner = 1;
	function CareerForm(){
		Form::Form('CareerForm');	
		$sql = "SELECT * FROM ".PREFIX_TABLE."adv WHERE status = 1 and catid=5  ORDER BY ord Desc limit 1";
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