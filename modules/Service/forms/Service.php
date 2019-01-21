<?php
class ServiceForm extends Form{
  private  $banner;
  function ServiceForm(){
    Form::Form('ServiceForm');
    $row = DB::select(PREFIX_TABLE . 'about_us', 'id = 5');
      $description = System::post_db_parse_html($row['des']);
      $this->banner['title'] = "Services";
      $this->banner['description'] = $description;
      $this->banner['image'] = array();
      $sql = "SELECT * FROM ".PREFIX_TABLE."adv WHERE status = 1 and catid=4  ORDER BY ord Desc ";
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
    $display->add('ourwork_cat', $product_cat);
    $display->add('banner',$this->banner);
    $display->output('Service');
  }
  
}
?>