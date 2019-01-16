<?php

class ProductForm extends Form
{
    function ProductForm()
    {
        Form::Form('ProductForm');  
        $catid = System::getParam('catid');   
        
         if ($catid){
           $catid_info=DB::select(PREFIX_TABLE.'product_cat', " url ='".$catid."'"); 
        CGlobal::$website_title =$catid_info['title'];
        CGlobal::$configs['web_keyword'] =$catid_info['key'];
        CGlobal::$configs['web_des'] = $catid_info['des'];
    }  
        else{
        CGlobal::$website_title = 'Sản phẩm công ty được PQA, sản phẩm thuốc nam PQA, thuốc đông y';
        CGlobal::$configs['web_keyword'] ='sản phẩm thuốc đông y, chữa bệnh bằng đông y';
        CGlobal::$configs['web_des'] = CGlobal::$configs['web_name'];
    }
        }

    function draw()
    {
        //$this->beginForm();

        global $display;
        $PageTitle = CGlobal::$configs['web_name'];
        $in='';
        $keyword = System::getParam('keyword');
        $catid = System::getParam('catid');
        $parentid = System::getParamInt('parentid');
        
      
        if ($catid){
           $catid_info=DB::select(PREFIX_TABLE.'product_cat', " url ='".$catid."'"); 
           $catid_info['href']=Url::build('product', array('catid' => $catid_info['url']));
           if($catid_info['parentid']>0)    {
            $cat_parent_info=DB::select(PREFIX_TABLE.'product_cat', " catid ='".$catid_info['parentid']."'");
            $cat_parent_info['href']=Url::build('product', array('catid' => $cat_parent_info['url'])); 
            $display->add('cat_parent_info', $cat_parent_info);
           } 
             
        }else{
             $catid_info['status']=2;
             $catid_info['catid']=0;
             $catid_info['title']='Sản phẩm thuốc nam PQA' ;  
        }          
        $display->add('catid_info', $catid_info); 
            
            
            
        $search = System::getParam('search');
        
       
        if($catid_info['catid'] > 0){
        $where =" where status <> 2 and catid = ".$catid_info['catid'];
        if($parentid ) $where= " where catid = ".$parentid;
        
       
        $sub_menu=array();
         $where_Cat = ' Where status <> 0 and parentid ='.$catid_info['catid'];
        $sql = "SELECT * FROM " . PREFIX_TABLE . "product_cat $where_Cat ORDER BY ord ";
        $result = DB::query($sql); 
        if ($result)
        {
            while ($row = mysql_fetch_assoc($result))
            {
                
                
                        if ($row['catid'] == $parentid)
                          $class = 'active';
                          else 
                          $class = '';
                       $in .= $row['catid'].',';
                
                $sub_menu[] = array('title' => $row['title'],'class'=>$class, 'href' => Url::build('product', array('catid' => $row['url'])));
                        
                }
                $display->add('sub_menu', $sub_menu); 
               
       }
       if($in !='' and !$parentid){
        $in .='0';
        $where .= ' or catid in ('.$in.')';
       }
         
        }
        else 
        $where =" where status <> 2";
        
        
        
        if($keyword!=''){
            $PageTitle = 'Tìm kiếm';
            if(!empty($keyword)){
					$where .= (empty($where)) ? " WHERE " : " AND ";
					$where .= " title LIKE '%$keyword%' or brief LIKE '%$keyword%'";
				}
        }else if(!$catid_info){
            $where='';
        }
         
        $main = CGlobal::$main;
        
        $page_no = (System::getParamInt('page_no') == 0) ? 1 : System::getParamInt('page_no');
        $cachefile = "ListNews_page_" . $page_no;

        if (StaticCache::notExistCache($cachefile, CACHE_TIME))
        {
            StaticCache::startCache();

            $sql = " SELECT COUNT(*) AS total_row FROM " . PREFIX_TABLE . "product $where";

            $total = DB::fetch($sql, 'total_row', 0);
            $arrItem = array();
            $pagingData = '';
            if ($total)
            {
               
                $limit = '';
                if($catid_info['status']==1){
                $item_per_page = CGlobal::$configs['max_news']+ CGlobal::$configs['max_oldnews'];
                }else{
                     $item_per_page = CGlobal::$configs['max_news'];
                }
                require_once ROOT_PATH . 'core/Paging.php';
                Paging::page($pagingData, $limit, $total, $item_per_page, 5, 'page_no');
                $sql = "SELECT id,headline,price, title, brief, time, image,view,link,catid FROM " . PREFIX_TABLE . "product $where ORDER BY  ord,time DESC $limit";
                $result = DB::query($sql);
                if ($result)
                {
                    while ($row = mysql_fetch_assoc($result))
                    {
                        $row['brief'] = System::post_db_parse_html($row['brief']);
                        
                    $row['price'] = number_format($row['price']);
                        $row['time'] = date('d/m/Y', $row['time']);
                        $row['href'] = Url::build($main, array('Newsid' => $row['id'], 'xtname' =>
                                System::safe_title($row['title'])));
                        $row['title'] = System::post_db_parse_html($row['title']);      
                        $arrItem[] = $row;
                    }
                }
            }
            $display->add('PageTitle', $PageTitle);

            $display->add('catid', $catid);
            $display->add('arrItem', $arrItem);
            $display->add('pagingData', $pagingData);
            
            
         /*
          
                // Tin noi bat
		$limit = "LIMIT 0,".CGlobal::$configs['max_hotnews'];
		$where = "WHERE  status =3";
		$sql = "SELECT id, title, time,image FROM ".PREFIX_TABLE."news $where ORDER BY time DESC $limit";
		$result = DB::query($sql);	
		$arrNewsHot = array();
		if($result){
			while($row = mysql_fetch_assoc($result)){				
				$row['href'] = Url::build($main,array('Newsid'=>$row['id'],'xtname'=>System::safe_title($row['title'])));
				$row['time'] = date('d/m/Y',$row['time']);
				$arrNewsHot[] = $row;
			}
            $display->add('arrNewsHot',$arrNewsHot);
		}
        // Category
         $menuArr = array();
         $where = ' Where status <> 2';
        $sql = "SELECT * FROM " . PREFIX_TABLE . "news_cat $where ORDER BY ord ";
        $result = DB::query($sql);
        if ($result)
        {
            while ($row = mysql_fetch_assoc($result))
            {
                
                $menuArr[] = array('title' => $row['title'], 'href' => Url::build('news',
                        array('catid' => $row['url'])));
            }
        }             
		$display->add('Categoris',$menuArr);
       */
        
		    
               
                $display->add('home_url',WEB_ROOT);
                $display->add('max_news',CGlobal::$configs['max_news']);
                
                 $display->output('Product');
           

            StaticCache::endCache();
        }
        //$this->endForm();
    }

}

?>