<?php
require_once '../../core/Module.php';
require_once '../../core/Form.php';
require_once '../../core/Debug.php';
require_once '../../core/config.php';
require_once '../../core/Init.php';
require_once '../../core/Url.php';
require_once '../../crawl/simple_html_dom.php';

$url = System::getParam('url');
$catid = System::getParam('catid');
$html = @file_get_html($url);
if( ! empty($html) ){
 	$title = $html->find('h1[class=title_detail]', '0')->innertext; 
 	$contents = filter_content(load_dom($html->find('div[class=col530]', '0')->innertext)); 
 	$bref = trim(strip_tags($contents['bref']));
 	$des = trim($contents['des']);
 	$title = trim(strip_tags($title));
 if( ! empty($bref) && ! empty($des) && ! empty($title) ){
 	$arr['keyword'] = $title;
	$arr['desciption'] = $bref;
	$arr['title'] = $title;
	$arr['brief'] = $bref;
	$arr['des'] = $des;
	$arr['catid'] = $catid;
	if($arr['catid']){
			$row = DB::fetch("SELECT parentid FROM ".PREFIX_TABLE."news_cat WHERE catid = ".$arr['catid']);
			$arr['parentid'] = $row['parentid'];
	}
		
	$arr['uid'] = $_SESSION['adm_user']['uid'];
	$arr['author'] = $_SESSION['adm_user']['user'];
	$arr['time'] = TIME_NOW;
 	$news_id = DB::insert(PREFIX_TABLE."news",$arr);
 	$link_new = Url::build('news', array('Newsid' => $news_id, 'xtname' =>
                                System::safe_title($title)));
 	echo '<i>'.$url . '</i> <b style="color:blue"> => Thành công ! <a  target ="_blank" href="/'.$link_new.'">Xem Tin</a></b>';
 }else echo '<i>'.$url . '</i> <b style="color:red"> => Không lấy được dữ liệu</b>';
}else {
	echo '<i>'.$url . '</i> <b style="color:red"> => Không hợp lệ</b>';
}


function filter_content($post_detail)
	{
        // remove center
    foreach ($post_detail->find('div[class=post-meta]') as $item){
        $item->outertext = '';
    }
    $post_detail->save();

    foreach ($post_detail->find('a') as $item){
        $item->href = 'http://thuocdongypqa.vn/';
    }

    $post_detail->save();

      $bref = $post_detail->find('div[class=sapo_detail]',0);
      $des=  $post_detail->find('div[id=abdf]',0) ;
	  $bref = str_replace('Suckhoedoisong.vn', 'Thuocdongypqa.vn', $bref);	
	  $bref = str_replace('suckhoedoisong.vn', 'thuocdongypqa.vn', $bref);

	  //$des = str_replace('Suckhoedoisong.vn', 'Thuocdongypqa.vn', $des);	
	  //$des = str_replace('suckhoedoisong.vn', 'thuocdongypqa.vn', $des);
       return array('bref' => $bref, 'des'=> $des);

	}