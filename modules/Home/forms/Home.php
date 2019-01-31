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

        $sql_contact = "SELECT * FROM ".PREFIX_TABLE."adv WHERE status = 1 and catid=8  ORDER BY ord Desc limit 1";
        $arr_contact = DB::query($sql_contact);   

        if (!empty($arr_contact))
        {
          while ($row_conact = mysql_fetch_assoc($arr_contact)) 
           $display->add('row_conact',$row_conact);
        }

        $sql_solution = "SELECT * FROM ".PREFIX_TABLE."adv WHERE status = 1 and catid=8  ORDER BY ord Desc limit 1";
        $arr_solution = DB::query($sql_solution);   

        if (!empty($arr_solution))
        {
          while ($row_solution = mysql_fetch_assoc($arr_solution)) 
           $display->add('row_solution',$row_solution);
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
                $sql_ourwork = "SELECT * FROM " . PREFIX_TABLE . "ourwork_slide Where status =1 and catid = ".$row['catid']." ORDER BY ord asc ";
        		$result_ourwork = DB::query($sql_ourwork);
        		if ($result_ourwork) {
        			while ($row_ourwork = mysql_fetch_assoc($result_ourwork)){
        				$row['ourworks'][] = $row_ourwork;
        			}
        		}
            	$product_cat[]=$row;
            }
           
          }
           //echo "<pre>";
           //print_r($product_cat);die;
        $row_social = DB::select(PREFIX_TABLE . 'about_us', 'id = 9');
        $socaial = System::post_db_parse_html($row_social['des']);
        $display->add('socaial', $socaial);
        $display->add('ourwork_cat', $product_cat);
        $display->add('youtube_id_background', CGlobal::$configs['youtube_id']);
        $display->add('endSecond', CGlobal::$configs['endSecond']);
        $display->add('youtube_id_play', CGlobal::$configs['youtube_id_play']);
        $display->add('home_title', CGlobal::$configs['home_title']);
        $display->add('home_description', CGlobal::$configs['home_description']);

		$display->output("Home");
	}
	
}

?>