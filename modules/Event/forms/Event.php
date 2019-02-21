<?php
class EventForm extends Form{
	private  $banner = 1;
	function EventForm(){
		Form::Form('EventForm');	
		$sql = "SELECT * FROM ".PREFIX_TABLE."adv WHERE status = 1 and catid=20  ORDER BY ord Desc limit 1";
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
		$our_clients = array();
		$sql = "SELECT * FROM ".PREFIX_TABLE."adv WHERE status = 1 and catid=12  ORDER BY ord ASC";
        $arr = DB::query($sql);

        if (!empty($arr))
        {
        	$i=1;
          while ($row = mysql_fetch_assoc($arr)){
          	$our_clients[$i]['id'] = $row['id'];
          	$our_clients[$i]['title'] = $row['title'];
          	$our_clients[$i]['image'] = $row['image'];
          	$our_clients[$i]['description'] = $row['description'];
          	$our_clients[$i]['link'] = $row['link'];
          	$i++;
          }
          $display->add('our_clients',$our_clients);
          $display->add('datas_js',json_encode($our_clients));
        }
    	
		$display->add('facebooklink', CGlobal::$configs['facebooklink']);
		$display->add('banner',$this->banner);
		$display->output('Event');
	}
	
}
?>