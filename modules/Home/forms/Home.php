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
        		if ($result_ourwork) {
        			while ($row_ourwork = mysql_fetch_assoc($result_ourwork)){
        				$row['ourworks'][] = array( $row_ourwork['title'],$row_ourwork['image'] );
        			}
        		}
            	$product_cat[]=$row;
            }
           
          }
        //   echo "<pre>";
        //   print_r($product_cat);die;

          $images = array();
          $images = ["https://images.pexels.com/photos/236047/pexels-photo-236047.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500", "https://www.w3schools.com/w3css/img_lights.jpg", "https://images.pexels.com/photos/257360/pexels-photo-257360.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"];

        $display->add('ourwork_cat', $product_cat);
        $display->add('youtube_id_background', CGlobal::$configs['youtube_id']);
        $display->add('endSecond', CGlobal::$configs['endSecond']);
        $display->add('youtube_id_play', CGlobal::$configs['youtube_id_play']);
        $display->add('home_title', CGlobal::$configs['home_title']);
        $display->add('home_description', CGlobal::$configs['home_description']);
        $display->add('images', $images);
        
		$display->output("Home");
	}
	
}

?>