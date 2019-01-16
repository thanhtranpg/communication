<?php
/**
 * @author 	Tran Quang Thanh
 * 			Mail: tqt_tqt2001@yahoo.com
 * 			Mobile: 01656 254 342
 * 			03/02/2010
 */
class Str{
  
      function __construct() {
	}
	
	    static function  sub_number_char($str,$number_char){
	     $str=trim($str);
		 if(strlen($str) <= $number_char ) return $str;
		 $so=$number_char -3;	
	     if($str[$so] == ' ') return substr($str,0,$so).' ...';
		 while (($str[$so-1] != ' ')&& strlen($str) > $so){ 		 
		 ++$so;		
		 }
		 return substr($str,0,$so).' ...';
	   }
	   
	   
	    
}
?>