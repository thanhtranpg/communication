<?php

class HeaderForm extends Form
{
    function __construct()
    {
        Form::Form('HeaderForm');
        CGlobal::$website_title = CGlobal::$configs['web_name'];
        CGlobal::$link_cart = Url::build('cart');

    }

    function draw()
    {
        global $display;
        $main = CGlobal::$main;
        $display->add('url_root', WEB_ROOT);
        $catid = System::getParam('catid');
        $menuArr = array();
        $menuArr[1] = array('title' => 'About us', 'href' => Url::build('about_us'));
        $menuArr[2] = array('title' => 'Services', 'href' => Url::build('service'));
        $menuArr[3] = array('title' => 'Our works', 'href' => Url::build('our_work'));
        $menuArr[4] = array('title' => 'Careers', 'href' => Url::build('career'));
        $menuArr[5] = array('title' => 'Contact us', 'href' => Url::build('contact'));
        $menuArr[6] = array('title' => 'Events', 'href' => Url::build('event'));

        switch ($main)
        {
            case 'about_us':
              $menuArr[1]['class'] = 'active';
              break;
            case 'service':
              $menuArr[2]['class'] = 'active';
              break;
            case 'our-work':
              $menuArr[3]['class'] = 'active';
              break;
            case 'career':
              $menuArr[4]['class'] = 'active';
              break;
            case 'contact':
              $menuArr[5]['class'] = 'active';
              break;
            case 'event':
              $menuArr[6]['class'] = 'active';
              break;
        }
        $sql = "SELECT * FROM ".PREFIX_TABLE."adv WHERE status = 1 and catid=1  ORDER BY ord Desc limit 1";
        $arr = DB::query($sql);   
        $logo = array();
        if (!empty($arr))
        {
          while ($row = mysql_fetch_assoc($arr))
           $display->add('logo',$row);
        }
        if($main =='event'){
          $head_title = 'Events';
        }else{
          $head_title = CGlobal::$website_title;
        }
        $display->add('main', $main);
        $display->add('head_title',$head_title );
        $display->add('menuArr', $menuArr);
       	$display->add('home_url',WEB_ROOT);
        $display->add('facebooklink', CGlobal::$configs['facebooklink']);
        $display->add('youtubelink', CGlobal::$configs['youtubelink']);
        $display->add('about_link',Url::build('about_us'));
        $display->add('service_link',Url::build('service'));
        
        $display->output("Header");

    }
}

?>