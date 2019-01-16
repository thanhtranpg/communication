<?php
/*
+--------------------------------------------------------------------------
|   enbac.com
|   =============================================
|   by enbac Team
|   =============================================
|   Web: http://www.enbac.com
|   Started date : 03/2008
|   Rewrite Class for enbac.com
+---------------------------------------------------------------------------
*/
if (preg_match ( "/".basename ( __FILE__ )."/", $_SERVER ['PHP_SELF'] )) {
	die ("<h1>Incorrect access</h1>You cannot access this file directly.");
}

class REWRITE_URL {
	function doReplace(&$string){
	$url_in = array(
		 "'\?page=home&'", //home
		 "'\?page=home'", //home
		 
		//profile page
		"'\?page=profile&user_name=([a-zA-Z0-9_-]+)&cmd=([a-zA-Z0-9_-]+)&id=([0-9]+)&ebname=([a-zA-Z0-9_-]+)'", //profile with cmd, id, ebname
		"'\?page=profile&user_name=([a-zA-Z0-9_-]+)&cmd=([a-zA-Z0-9_-]+)&coment_id=([0-9_]+)'", 				//profile with cmd, comment_id
		"'\?page=profile&user_name=([a-zA-Z0-9_-]+)&cmd=([a-zA-Z0-9_-]+)&ebname=([a-zA-Z0-9_-]+)'", 			//profile with cmd, ebname
		"'\?page=profile&user_name=([a-zA-Z0-9_-]+)&cmd=([a-zA-Z0-9_-]+)&page_no=([0-9]+)'", 					//profile with cmd, page_no
		"'\?page=profile&user_name=([a-zA-Z0-9_-]+)&cmd=([a-zA-Z0-9_-]+)'", 									//profile with cmd
		"'\?page=profile&user_name=([a-zA-Z0-9_-]+)'", //profile
		
		//product page
		"'\?page=product&cmd=([a-zA-Z0-9_-]+)&id=([0-9]+)&news_id=([0-9]+)&ebname=([a-zA-Z0-9_-]+)'", //product with cmd, id, news_id
		"'\?page=product&cmd=([a-zA-Z0-9_-]+)&id=([0-9]+)&item_id=([0-9]+)&ebname=([a-zA-Z0-9_-]+)'", //product with cmd, id, item_id
		"'\?page=product&cmd=([a-zA-Z0-9_-]+)&id=([0-9]+)&c_id=([0-9]+)&ebname=([a-zA-Z0-9_-]+)'", //product with cmd, id, item_id
		"'\?page=product&cmd=([a-zA-Z0-9_-]+)&id=([0-9]+)&ebname=([a-zA-Z0-9_-]+)&mobile_type_id=([0-9]+)'", //product with cmd, id, mobile_type_id
		"'\?page=product&cmd=([a-zA-Z0-9_-]+)&id=([0-9]+)&ebname=([a-zA-Z0-9_-]+)'", //product with cmd, id
		"'\?page=product&id=([0-9]+)&ebname=([a-zA-Z0-9_-]+)'", //product with id
		
		//news, review, promotion page
		"'\?page=([a-zA-Z0-9_-]+)&user_name=([a-zA-Z0-9_-]+)&news_id=([0-9]+)&ebname=([a-zA-Z0-9_-]+)'", // news with user_name,news_id, ebname
		"'\?page=([a-zA-Z0-9_-]+)&news_id=([0-9]+)&ebname=([a-zA-Z0-9_-]+)'", 							// news with news_id, ebname
		"'\?page=([a-zA-Z0-9_-]+)&user_name=([a-zA-Z0-9_-]+)&page_no=([0-9]+)'", 							// news with user_name, page_no
		"'\?page=([a-zA-Z0-9_-]+)&user_name=([a-zA-Z0-9_-]+)'", 							// news with user_name
		
		//list_detail
		"'\?page=list_detail&category_id=([0-9]+)&ebname=([a-zA-Z0-9_-]+)&page_no([0-9]+)'",
		"'\?page=list_detail&category_id=([0-9]+)&ebname=([a-zA-Z0-9_-]+)'",
		"'\?page=list_detail&'",
		"'\?page=list_detail'",
	 	 
	 	 //Else Enbac pages
	 	 "'\?page=([a-zA-Z0-9_-]*)&'",	
	 	 "'\?page=([a-zA-Z0-9_-]*)'",	
		);
		
		$url_out = array(
		 "./?",//home 
		 "./",//home
		 
		//profile page
		 "\\1/\\2/\\3/\\4.html", 	//profile with cmd, id, ebname
		 "\\1/\\2/\\3.html", 		//profile with cmd, comment_id
		 "\\1/\\2/\\3.html", 		//profile with cmd, ebname
		 "\\1/\\2/page-\\3.html", 		//profile with cmd, page_no
		 "\\1/\\2.html", 		//profile with cmd
		 "\\1",
		 
		//product page
		"p\\2/\\1/n\\3/\\4.html", //product with cmd, id, news_id
		"p\\2/\\1/i\\3/\\4.html", //product with cmd, id, item_id
		"p\\2/\\1/c\\3/\\4.html", //product with cmd, id, c_id
		"p\\2/\\1/mt\\4/\\3.html", //product with cmd, id, mobile_type_id
		"p\\2/\\1/\\3.html", //product with cmd, id
		"p\\1/\\2.html", //product with id
		 
		 
		//news, review, promotion page
		"\\1/\\2/\\3/\\4.html", 							// news with user_name, news_id, ebname
		"\\1/\\2/\\3.html", 							// news with news_id, ebname
		"\\1/\\2/page-\\3.html", 							// news with user_name, page_no
		"\\1/\\2.html", 							// news with user_name
		
		 //List detail
		 "Mua-ban/\\1/\\2/page-\\3.html",
		 "Mua-ban/\\1/\\2.html",
		 "Mua-ban.html?",
		 "Mua-ban.html",
		 
		 //Else Enbac pages	 
		 "\\1.html?",
		 "\\1.html",
		);
		        
	    $url = preg_replace($url_in, $url_out, $string);
	    return $url;
	}
		
	
}
//End class
?>