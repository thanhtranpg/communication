

<?php
/**
 * @author 	Tran Quang Thanh
 * 			Mail: tqt_tqt2001@yahoo.com
 * 			Mobile: 01656 254 342
 * 			03/02/2010
 */
class Time{
  
   function __construct() {
	}
	// chuyen ngay dang m/d/y sang dang int
   static function StringToDate($str=''){
			$date = explode("/", $str);	
			  if(sizeof($date)>=3)
				   $date = mktime(0, 0, 0, $date[0], $date[1], $date[2]);
				   else
				   $date=0;
				   
			return $date;	   
   }
   // chuyen ngay dang d/m/y sang dang int
   static function StringToDateVN($str=''){
			$date = explode("/", $str);	
			  if(sizeof($date)>=3)
				   $date = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
				   else
				   $date=0;
				   
			return $date;	   
   }
   //Ham lay thời gian hom nay dang int
    static function CurrentDate (){
			$date=date("m/d/Y");
			return Time::StringToDate($date);
   }
    //Ham chuyen int sang date dang m/d/y
   static function DateToString ($time){			
			return (date("m/d/Y",$time));
   }
   //Ham chuyen int sang date dang d/m/y
   static function DateToStringVN ($time){			
			return (date("d/m/Y",$time));
   }
}
?>