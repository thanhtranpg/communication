<?php
class View_our_workForm extends Form{
	private  $banner = 1;
	function View_our_workForm(){
		Form::Form('View_our_workForm');	
    $catid = System::getParamInt('catid');
		$sql = "SELECT * FROM ".PREFIX_TABLE."ourwork_cat WHERE status = 1 and catid = $catid  ORDER BY ord Desc limit 1";
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
    $catid = System::getParamInt('catid');
		$where = ' Where status = 1';
    $where .= ' and catid = '.$catid;
    $page_no = (System::getParamInt('page_no') == 0) ? 1 : System::getParamInt('page_no');

    $ourworks = array();
    $sql_count = "SELECT count(id) as total_row FROM ".PREFIX_TABLE."ourwork $where ";
    $total = DB::fetch($sql_count, 'total_row', 0);
    $pagingData = '';
        if ($total)
        {
            $limit = '';
            require_once ROOT_PATH . 'core/Paging.php';
            $item_per_page = 6;
            Paging::page($pagingData, $limit, $total, $item_per_page, 5, 'page_no');
            $sql = "SELECT * FROM ".PREFIX_TABLE."ourwork $where  ORDER BY id desc $limit";
            $arr = DB::fetch_all($sql);   
            $our_work_content = "";
            $ourwork_corver = [];
            if (!empty($arr))
            {
              foreach ($arr as $item){
                $ourworks[] = $item;
              }
            }
        }
    $display->add('pagingData', $pagingData);
    $display->add('ourworks', $ourworks);
		$display->add('banner',$this->banner);
    $display->add('ourwork_corver',$ourwork_corver);
		$display->output('View_our_work');
	}
	
}
?>