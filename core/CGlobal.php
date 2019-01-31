<?php
class CGlobal{
	static $version	= 2.0;
	
	static $js_ver	=1.0;
	static $css_ver	=1.0;	
	
	static $main = '';	
	static $configs	=array();
	static $curCategory		=	0;
	static $query_debug		= 	"";
	static $query_time;
	static $conn_debug 		= 	"";
	static $error_handle 	= 	"";
	static $ftp_image_connect_id = false;
	static $link_cart 		= 	"";
	static $my_server 		= 	array ();
	static $request_uri;
	static $referer_url;
	static $query_string	=	'';
	static $keywords;
	static $meta_desc;
	static $website_title;
	static $robotContent = 'INDEX, FOLLOW';
	static $gBContent ="index,follow,archive";	
	static $pg_noIndex = array ('error');
	static $is_adminpage = false;
    static $website_image="images/logo.jpg";					
	static $adv_zone = array(
							1 => array('title'=>'Logo', 'w'=>'197','h'=>'80'),
                            2 => array('title'=>'SOLUTIONS & TRUST in Home', 'w'=>'1920','h'=>'1080'),
                            3 => array('title'=>'About us', 'w'=>'1920','h'=>'1080'),
                            4 => array('title'=>'Services', 'w'=>'1920','h'=>'1080'),
                            5 => array('title'=>'Carrers', 'w'=>'1920','h'=>'1080'),
                            6 => array('title'=>'Contact us', 'w'=>'1920','h'=>'1080'),
                            7 => array('title'=>'Our Works', 'w'=>'1920','h'=>'1080'),
                            8 => array('title'=>'Contact Us in Home', 'w'=>'1920','h'=>'1080'),
                            9 => array('title'=>'SOLUTIONS & TRUST in Home', 'w'=>'1920','h'=>'1080'),
						);	
						
			
	
}
?>