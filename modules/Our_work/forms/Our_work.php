<?php
class Our_workForm extends Form{
	private  $banner = 1;
	function Our_workForm(){
		Form::Form('Our_workForm');	
		$sql = "SELECT * FROM ".PREFIX_TABLE."adv WHERE status = 1 and catid=7  ORDER BY ord Desc limit 1";
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
		$where = ' Where status =1 ';
        $sql = "SELECT * FROM " . PREFIX_TABLE . "ourwork_cat $where ORDER BY ord asc ";
        $result = DB::query($sql);
        $product_cat=array();
        if ($result)
        {
            while ($row = mysql_fetch_assoc($result)){
                $row['href'] = Url::build('our_work', array('catid' => $row['catid'], 'xtname' =>
                                System::safe_title($row['title'])));
                $row['title'] = System::post_db_parse_html($row['title']);
                $sql_ourwork = "SELECT title, image FROM " . PREFIX_TABLE . "ourwork Where status =1 and catid = ".$row['catid']." ORDER BY ord desc ";
            $result_ourwork = DB::query($sql_ourwork);
            $product_cat[]=$row;
            }
           
          }
          
        $display->add('ourwork_link', Url::build('our_work'));
        $display->add('ourwork_cats', $product_cat);
		$display->add('banner',$this->banner);
		$display->output('Our_work');
	}
	
}
?>