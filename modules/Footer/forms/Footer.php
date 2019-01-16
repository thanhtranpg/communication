<?php

class FooterForm extends Form
{
    function __construct()
    {
        Form::Form('FooterForm');
    }

    function draw()
    {
        global $display;
        $main = CGlobal::$main;
        // hien thi anh
        $row = DB::select(PREFIX_TABLE . 'about_us', 'id = 1');
        $address = System::post_db_parse_html($row['des']);

        
       
        $row_copyright = DB::select(PREFIX_TABLE . 'about_us', 'id = 2');
        $copyright = System::post_db_parse_html($row_copyright['des']);

        $display->add('copyright', $copyright);
        $display->add('address', $address);
		
        $display->add('hotline', CGlobal::$configs['hotline']);
        $display->add('email', CGlobal::$configs['email_contact']); 
        $display->add('facebooklink', CGlobal::$configs['facebooklink']);
        $display->add('youtubelink', CGlobal::$configs['youtubelink']);
        
        $display->output("Footer");
        StaticCache::endCache();

    }

}

?>