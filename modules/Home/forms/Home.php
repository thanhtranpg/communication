<?php
class HomeForm extends Form{
	function HomeForm(){
		Form::Form('HomeForm');		
		CGlobal::$website_title = CGlobal::$configs['web_name'];
		//$this->link_css('style/styles.css');	
		
	}	
	
	function draw(){
	    global $display;
		$main = CGlobal::$main; 

		$sql = "SELECT * FROM ".PREFIX_TABLE."adv WHERE status = 1 and catid=2  ORDER BY ord Desc limit 1";
        $arr = DB::query($sql);   

        if (!empty($arr))
        {
          while ($row = mysql_fetch_assoc($arr)) 
           $display->add('banner',$row);
        }

        
        $where = ' Where status =1 ';
        $sql = "SELECT * FROM " . PREFIX_TABLE . "ourwork_cat $where ORDER BY ord desc ";
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
        		if ($result_ourwork) {
        			while ($row_ourwork = mysql_fetch_assoc($result_ourwork)){
        				$row['ourworks'][] = array( $row_ourwork['title'],$row_ourwork['image'] );
        			}
        		}
            	$product_cat[]=$row;
            }
           
          }
        $display->add('ourwork_cat', $product_cat);
        $display->add('youtube_id_background', CGlobal::$configs['youtube_id']);
        $display->add('youtube_id_play', CGlobal::$configs['youtube_id_play']);
        $display->add('home_title', CGlobal::$configs['home_title']);
        $display->add('home_description', CGlobal::$configs['home_description']);
        
		$display->output("Home");
	}
	
}

?>