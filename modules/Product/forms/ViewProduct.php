<?php
class ViewProductForm extends Form{
	function ViewProductForm(){
		Form::Form('ViewProductForm');		
		
		$Newsid = System::getParamInt('Newsid'); 
        $result = DB::query('UPDATE  phpclass_product set view=view+1 where id = '.$Newsid);
        
		$this->item = DB::select(PREFIX_TABLE.'product', 'id = '.$Newsid);
	
		CGlobal::$website_title = $this->item['title'];	
		
        CGlobal::$website_image = ImageUrl::getItemImage('610',false,'product',$this->item['image'],$Newsid,'product');	
       /*$des= Str::sub_number_char(strip_tags(System::post_db_parse_html($this->item['brief'])),300)	;
	   if($des =='')
	   $des= Str::sub_number_char(strip_tags(System::post_db_parse_html($this->item['des'])),300);
	   */
	   if($this->item['keyword']!=''){
	    CGlobal::$configs['web_keyword']=$this->item['keyword'];
		CGlobal::$configs['web_des']=  Str::sub_number_char($this->item['desciption'],180);
}else{
        CGlobal::$configs['web_keyword']=$this->item['title'];
		CGlobal::$configs['web_des']=  $this->item['title'];
}		
	}	
	
	function draw(){
		//$this->beginForm();
        //var_dump($_SERVER)	;
		global $display;		
	//	$catid = System::getParamInt('catid',1);
		$PageTitle =  $this->item['title'];	
		$main = CGlobal::$main;
        if($this->item['status']==2) Url::redirect('product');
		
		
        
        if ($this->item['catid']){
           $catid_info=DB::select(PREFIX_TABLE.'product_cat', " catid ='".$this->item['catid']."'"); 
           $catid_info['href']=Url::build('product', array('catid' => $catid_info['url']));
           if($this->item['parentid']>0)    {
            $cat_parent_info=DB::select(PREFIX_TABLE.'product_cat', " catid ='".$this->item['parentid']."'");
            $cat_parent_info['href']=Url::build('product', array('catid' => $cat_parent_info['url'])); 
            $display->add('cat_parent_info', $cat_parent_info);
           } 
           $display->add('catid_info', $catid_info);  
        }
        $resultdh = array();
		$sql = "SELECT * FROM ".PREFIX_TABLE."image where status=1 and catid=".$this->item['id']." ORDER BY id DESC ";
			$result = DB::query($sql);	
			if($result){
			  
				while($row = mysql_fetch_assoc($result)){			
					$resultdh[]=  $row;				
				}
		}
		$display->add('resultdh',$resultdh);
         $this->item['title'] = System::post_db_parse_html($this->item['title']);
 	    $this->item['price'] =  number_format( $this->item['price']);
		$this->item['brief'] = System::post_db_parse_html($this->item['brief']);
		$this->item['des'] = System::post_db_parse_html($this->item['des']);
		$cur_time = $this->item['time'];
		$this->item['time'] = date('H:i | d/m/Y',$this->item['time']);
        
			
       
		// Tin lien quan
		$limit = "LIMIT 0,".CGlobal::$configs['max_oldnews'];
		$where = "WHERE status <>2 and catid =".$this->item['catid'] ." and id !=  ". $this->item['id'];
		$sql = "SELECT * FROM ".PREFIX_TABLE."product $where ORDER BY time DESC $limit";
		$result = DB::query($sql);	
		$arrNewsest = array();
		if($result){
			while($row = mysql_fetch_assoc($result)){				
				$row['href'] = Url::build($main,array('Newsid'=>$row['id'],'xtname'=>System::safe_title($row['title'])));
				$row['time'] = date('d/m/Y',$row['time']);
                $row['price'] =  number_format($row['price']);
	           $row['brief'] = System::post_db_parse_html($row['brief']);
		       $row['des'] = System::post_db_parse_html($row['des']);
                $row['title'] = System::post_db_parse_html($row['title']);
				$arrNewsest[] = $row;
			}
            $display->add('arrNewsest',$arrNewsest);
		}
        	// Tin noi bat
		$limit = "LIMIT 0,".CGlobal::$configs['max_hotnews'];
		$where = "WHERE  status =3 and id !=  ". $this->item['id'];
		$sql = "SELECT id, title, time,image FROM ".PREFIX_TABLE."product $where ORDER BY time DESC $limit";
		$result = DB::query($sql);	
		$arrNewsHot = array();
		if($result){
			while($row = mysql_fetch_assoc($result)){				
				$row['href'] = Url::build($main,array('Newsid'=>$row['id'],'xtname'=>System::safe_title($row['title'])));
				$row['time'] = date('d/m/Y',$row['time']);
                 $row['title'] = System::post_db_parse_html($row['title']);
				$arrNewsHot[] = $row;
			}
            $display->add('arrNewsHot',$arrNewsHot);
            $display->add('folder','news');
		}
        // Category
         $menuArr = array();
         $where = ' Where status <> 2';
        $sql = "SELECT * FROM " . PREFIX_TABLE . "product_cat $where ORDER BY ord ";
        $result = DB::query($sql);
        if ($result)
        {
            while ($row = mysql_fetch_assoc($result))
            {
                
                $menuArr[] = array('title' => $row['title'], 'href' => Url::build('product',
                        array('catid' => $row['url'])));
                $row['title'] = System::post_db_parse_html($row['title']);         
            }
        }             
		$display->add('Categoris',$menuArr);
        
        
        
        // Tin lien quan
        if($this->item['relative_id'] !=''){
		$limit = "LIMIT 0,".CGlobal::$configs['max_oldnews'];
		$where = "WHERE status <> 2 and id in (".$this->item['relative_id'] ." ) ";
		$sql = "SELECT id, title, time,image FROM ".PREFIX_TABLE."news $where ORDER BY time DESC $limit";
		$result = DB::query($sql);	
		$arrRelative = array();
		if($result){
			while($row = mysql_fetch_assoc($result)){				
				$row['href'] = Url::build('news',array('Newsid'=>$row['id'],'xtname'=>System::safe_title($row['title'])));
				$row['time'] = date('d/m/Y',$row['time']);
                 $row['title'] = System::post_db_parse_html($row['title']);
				$arrRelative[] = $row;
			}
            $display->add('arrRelative',$arrRelative);
		}
        }
       
		$row_encontent = DB::select(PREFIX_TABLE . 'about_us', 'id = 14');
        $end_content = System::post_db_parse_html($row_encontent['des']);
        
        $display->add('end_content', $end_content);
        $ratingCount=$this->item['id'] *3 - 12;
        $worstRating=0;
        $bestRating=5;
        if($this->item['id'] % 2==1)
        $ratingValue=$bestRating - 1;
        else
        $ratingValue=$bestRating -0.5;
        $display->add('ratingCount',$ratingCount);
        $display->add('worstRating',$worstRating);
        $display->add('bestRating',$bestRating);
        $display->add('ratingValue',$ratingValue);
        
         $display->add('home_url',WEB_ROOT);          		
		$display->add('PageTitle',$PageTitle);
		$display->add('item',$this->item);	
        $display->add('url_current',$this->curPageURL());		
				
		$display->output('ViewProduct');	
	
		//$this->endForm();
	}
    function curPageURL() {
 $pageURL = 'http';
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
	
}
?>